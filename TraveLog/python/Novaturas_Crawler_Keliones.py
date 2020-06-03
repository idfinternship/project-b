from bs4 import BeautifulSoup
from selenium import webdriver
from geopy.geocoders import Nominatim
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from datetime import datetime, date
import requests
import json
import re
import os

class TravelData(object):
    def __init__(self,destinationName,duration,linkToWebsite,rating,countries,IndivTravelData,Image):
        self.destinationName = destinationName
        self.duration = duration
        self.linkToWebsite = linkToWebsite
        self.rating = rating
        self.countries = countries
        self.IndivTravelData = IndivTravelData
        self.Image = Image


class IndivTravelData(object):
    def __init__(self,seats,checkIn,checkOut,savings,beforeSavings,price,identification,o_data):
        self.seats = seats
        self.checkIn = checkIn
        self.checkOut = checkOut
        self.savings = savings
        self.beforeSavings = beforeSavings
        self.price = price
        self.id = identification
        self.o_data = o_data




def GetIndvData(url):
    soup = BeautifulSoup(url, 'html.parser')
    content = soup.find_all(class_='list-row-wrapper direction list-hotel')
    cont = []
    for i in range(1,len(content)):
        try:
            Seat = content[i].find('span',class_='seats minimum-left').contents[0].contents[0]
        except:
            Seat = content[i].find('span',class_='seats').contents[0].contents[0]
        if(Seat == '0'):
            continue
        CheckIn = content[i].find('span',class_='checkin').contents[0]
        CheckOut = content[i].find('span',class_='checkout').contents[0]
        newCheckIn=CheckIn.replace(' ','-')
        newCheckOut=CheckIn.split(' ')[0]+"-"+CheckOut.replace(' ','-')
        Indentification = content[i].find('form').contents[0].attrs['value']
        O_Data=content[i].find('form').contents[1].attrs['value']
        try:
            Savings = re.sub(',','.',content[i].find(class_='u-label no-break').find(class_='price').contents[0].split(' ')[0])
            BeforePrice = re.sub(',','.',content[i].find(class_='price line-through').contents[0].split(' ')[0])
        except:
            Savings = "NULL"
            BeforePrice = "NULL"
        try:
            Price = re.sub(',','.',content[i].find(class_='price').contents[0].split(' ')[0])
        except:
            continue
        toAdd = IndivTravelData(Seat,newCheckIn,newCheckOut,Savings,BeforePrice,Price,Indentification,O_Data)
        cont.append(toAdd)
    return cont


def GetCountries(text):
    temp_cnt=re.split(',',text)
    end_cnt=temp_cnt[0]
    Countries=[]
    geo=Nominatim().geocode(end_cnt,addressdetails=True,language='en')
    isoCode=geo.raw['address']['country_code']
    toReturn=isoCode.upper()
    Countries.append(toReturn)
    return Countries


import sys

first_arg = sys.argv[1]
secon_arg = sys.argv[2]
third_arg = sys.argv[3]
def main(word1=first_arg,word2=secon_arg,word3=third_arg):
    pageURL=word3
    temp_string=re.split("[?]",pageURL)
    end_string=temp_string[0]+"?"+"page="
    l=int(word1)
    contentList=[]

    for i in range(1,l):
        driver= webdriver.Chrome('/usr/bin/chromedriver')
        url = end_string+str(i)
        driver.get(url)
        soup = BeautifulSoup(driver.page_source, 'html.parser')
        driver.quit()
        content = soup.find_all(class_='card hotel-card sizing-on-tablet sizing-on-desktop')
        for i in range(0,len(content)):
            Link = content[i].find(class_='btn btn-round btn-red btn-interactive').attrs['href']
            PlaceToGo = content[i].find(class_='title').find('span').contents[0]
            Image = content[i].find('img').attrs['src']
            temp_Duration = content[i].find(class_='mixed-price-block').contents[0].contents[0]
            new_Duration=re.split(' ',temp_Duration)
            Duration=new_Duration[0]

            try:
                Rating = content[i].find(class_='rating-value').contents[0]
            except:
                Rating = 'NULL'

            Country= content[i].find(class_='meta').contents[0].contents[0]
            Countries = []

            driver1= webdriver.Chrome('/usr/bin/chromedriver')
            driver1.get(Link)
            timeout = 2
            try:
                element_present = EC.presence_of_element_located((By.ID, 'main'))
                WebDriverWait(driver1, timeout).until(element_present)
            except TimeoutException:
                print("Loading")

            try:
                IndvData = GetIndvData(driver1.page_source)
                Countries=GetCountries(Country)

            except:
                continue

            driver1.quit()
            if(len(IndvData)==0):
                continue

            toAdd = TravelData(PlaceToGo,Duration,Link,Rating,Countries,IndvData,Image)
            contentList.append(toAdd)

    contentInfo = [{"Destination Name": v.destinationName, "Duration": v.duration,
                     "Rating": v.rating, "Link" : v.linkToWebsite,"Image":v.Image, "Countries": [d for d in v.countries],
                     "Individual data": [{"Check In": a.checkIn,"CheckOut":a.checkOut,"savings":a.savings,"beforeSavings":a.beforeSavings,"price":a.price,"ID":a.id,"o_data":a.o_data}
                      for a in v.IndivTravelData]}
                    for v in contentList
                    ]
    with open(word2) as f:
        data = json.load(f) 
        # appending data to emp_details  
        for i in range(0,len(contentInfo)):
            data['Data'].append(contentInfo[i])
    with open(word2,'w') as f: 
        json.dump(data, f, ensure_ascii=False, indent=4) 
    

if __name__ == "__main__":
    main()