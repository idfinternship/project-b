#!/bin/sh
directory=`python3 NameSelector.py "Pazintines"`
direct=`echo "$directory"`
FileCreate=`python3 FileCreator.py "$direct"`
script=`./crawlerLauncher.sh "Novaturas_Crawler_Pazintines.py" "$direct" "https://www.novaturas.lt/pazintines-keliones"`

directory2=`python3 NameSelector.py "Keliones"`
direct2=`echo "$directory2"`
FileCreate2=`python3 FileCreator.py "$direct2"`
script2=`./kelionesLauncher.sh "$direct2"`
wait

python3 Listing_Truncate.py
python3 Listing_Updater.py "$direct2"
python3 Listing_Updater.py "$direct"
