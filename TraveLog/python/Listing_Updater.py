import mysql.connector
import json
import re

def checkIfNull(data):
      if(data == "NULL" or data == "Not available"):
            return None
      else:
            return data


mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="password",
  database="travelog2"
)
mycursor = mydb.cursor() 
mycursor.execute("TRUNCATE TABLE country_has_listing")
mycursor.execute("TRUNCATE TABLE individual")
mycursor.execute("DELETE FROM listing")
mycursor.execute("ALTER TABLE listing AUTO_INCREMENT = 1")
mydb.commit()
link = '/home/dalus/Desktop/TraveLog/data/data-15-04-2020-16.json'
with open(link) as json_file:
      data=json.load(json_file)
      for d in data['Data']:
            toPrint1 = (checkIfNull(d['Destination Name']) , checkIfNull(d['Duration']) , checkIfNull(d['Rating']) , checkIfNull(d['Link']))
            mycursor.execute("INSERT INTO listing(destinationName, duration, rating, link) VALUES (%s, %s, %s, %s)", toPrint1)
            lastID=mycursor.lastrowid
            for c in d['Countries']:
                  mycursor.execute("INSERT INTO country_has_listing(listingId,countryId) VALUES (%s,%s)", (lastID,c))
            for i in d['Individual data']:
                  
                  toPrint=(checkIfNull(i['Check In']),checkIfNull(i['CheckOut']),checkIfNull(i['savings']),checkIfNull(i['beforeSavings']),checkIfNull(i['price']),lastID)
                  mycursor.execute("INSERT INTO individual(checkIn,checkOut,savings,beforePrice,price,indivId) VALUES (%s,%s,%s,%s,%s,%s)", toPrint)
      mydb.commit() 


