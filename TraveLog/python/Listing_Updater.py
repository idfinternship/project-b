import sys

def checkIfNull(data):
      if(data == "NULL" or data == "Not available"):
            return None
      else:
            return data

first_arg = sys.argv[1]

def main(word1=first_arg):
      import mysql.connector
      import json
      import re
      mydb = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="password",
        database="travelog"
      )
      mycursor = mydb.cursor() 
      
      
      with open(word1) as json_file:
            data=json.load(json_file)
            for d in data['Data']:
                  toPrint1 = (checkIfNull(d['Destination Name']) , checkIfNull(d['Duration']) , checkIfNull(d['Rating']) , checkIfNull(d['Link']), d['Image'])
                  mycursor.execute("INSERT INTO listing(destinationName, duration, rating, link,imageLink) VALUES (%s, %s, %s, %s,%s)", toPrint1)
                  lastID=mycursor.lastrowid
                  for c in d['Countries']:
                        mycursor.execute("INSERT INTO country_has_listing(listingId,countryId) VALUES (%s,%s)", (lastID,c))
                  for i in d['Individual data']:

                        toPrint=(checkIfNull(i['Check In']),checkIfNull(i['CheckOut']),checkIfNull(i['savings']),checkIfNull(i['beforeSavings']),checkIfNull(i['price']),i['ID'],i['o_data'],lastID)
                        mycursor.execute("INSERT INTO individual(checkIn,checkOut,savings,beforePrice,price,listingID,oDate,indivId) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)", toPrint)
            mydb.commit()

if __name__ == "__main__":
    main()