#!/bin/sh
TotalPage=`python NumberOfPages.py "$3"`
TPages=`echo "$TotalPage"`
SplitP=`python PageSpliter.py "$TPages"`
page1=`echo "$SplitP"| head -2 `
page2=`echo "$SplitP"| head -3 | tail -2`
page3=`echo "$SplitP"| head -4 | tail -2`
page4=`echo "$SplitP"| head -5 | tail -2`
page5=`echo "$SplitP"| head -6 | tail -2`
page6=`echo "$SplitP"| head -7 | tail -2`
if [ `echo "$SplitP"| head -2| grep -c '0'` != '0' ]
then
page1=`printf "1\n2\n"`
fi
if [ `echo "$SplitP"| head -3 | tail -2| grep -c '0'` != '0' ]
then
page2=`printf "1\n1\n"`
fi
if [ `echo "$SplitP"| head -4 | tail -2| grep -c '0'` != '0' ]
then
page3=`printf "1\n1\n"`
fi
if [ `echo "$SplitP"| head -5 | tail -2| grep -c '0'` != '0' ]
then
page4=`printf "1\n1\n"`
fi
if [ `echo "$SplitP"| head -6 | tail -2| grep -c '0'` != '0' ]
then
page5=`printf "1\n1\n"`
fi
if [ `echo "$SplitP"| head -7 | tail -2| grep -c '0'` != '0' ]
then
page6=`printf "1\n1\n"`
fi

python3 "$1" "$page1" "$2" "FIRST" &
python3 "$1" "$page2" "$2" "N" &
python3 "$1" "$page3" "$2" "N" &
python3 "$1" "$page4" "$2" "N" &
python3 "$1" "$page5" "$2" "N" &
python3 "$1" "$page6" "$2" "LAST"&

wait
echo "Baigta"