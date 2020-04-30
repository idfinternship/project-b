#!/bin/sh
directory=`python3 NameSelector.py`
direct=`echo "$directory"`
script=`./crawlerLauncher.sh "Novaturas_Crawler_Pazintines.py" "$direct" "https://www.novaturas.lt/pazintines-keliones"`
echo "$script"
isOver=`echo "$script" | grep 'Baigta' -c`
if [ $isOver -ge 1 ]
then
python3 Listing_Updater.py "$direct"
fi