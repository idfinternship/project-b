from bs4 import BeautifulSoup
from selenium import webdriver
import os
def GetPageNumber(url):
    driver = webdriver.Chrome("/usr/bin/chromedriver")
    driver.get(url)
    soup = BeautifulSoup(driver.page_source, 'html.parser')
    driver.quit()
    pageNumber = soup.findAll(class_='pagination-item link')
    Number = []
    for i in range(0,len(pageNumber)):
        try:
            temp = pageNumber[i].find('span').contents[0]
            int(temp)
            Number.append(temp)
        except:
            continue
    Number.sort()
    return Number[-1]

import sys

first_arg = sys.argv[1]
def main(word1=first_arg):
    link=word1
    number = GetPageNumber(link)
    print(number)

if __name__ == "__main__":
    main()
