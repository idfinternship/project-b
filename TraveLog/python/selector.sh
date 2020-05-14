#!/bin/sh
directory=`python3 NameSelector.py`
direct=`echo "$directory"`
script=`./crawlerLauncher.sh "Novaturas_Crawler_Pazintines.py" "$direct" "https://www.novaturas.lt/pazintines-keliones"`

directory2=`python3 NameSelector.py "Keliones"`
direct2=`echo "$directory2"`
script2=`./test.sh "$direct2"`
isOver=`echo "$script2" | grep 'Baigta' -c`
if [ $isOver -ge 1 ]
then
python3 Listing_Truncate.py
python3 Listing_Updater.py "$direct2"
fi
