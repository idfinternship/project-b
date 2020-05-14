import mysql.connector
import json
import re
def main():
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      passwd="password",
      database="travelog"
    )
    mycursor = mydb.cursor() 
    mycursor.execute("TRUNCATE TABLE country_has_listing")
    mycursor.execute("TRUNCATE TABLE individual")
    mycursor.execute("DELETE FROM listing")
    mycursor.execute("ALTER TABLE listing AUTO_INCREMENT = 1")
    mydb.commit()

if __name__ == "__main__":
    main()