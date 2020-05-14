import os
from datetime import datetime, date
import sys
first_arg = sys.argv[1]
def greetings(word1=first_arg):
    fileDir = os.path.dirname(os.path.abspath(__file__))   # Directory of the Module
    parentDir = os.path.dirname(fileDir)                   # Directory of the Module directory
    newPath = os.path.join(parentDir, 'data')              # Get the directory for Data
    now = datetime.now()
    stringName = "/"+word1+"-"+ now.strftime("%d-%m-%Y-%H")+".json"
    FullPath=newPath+stringName
    os.remove(FullPath) if os.path.exists(FullPath) else None
    open(FullPath, 'a').close()
    print(FullPath)

if __name__ == "__main__":
    greetings()

