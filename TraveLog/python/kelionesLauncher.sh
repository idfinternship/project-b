#!/bin/bash
cust_func(){
_array=( "$3" )
pewpew=($(echo $_array | tr " " "\n"))
for ((i = "$1" ; i < "$2" ; i++));
do
NumOfPages=`python3 NumberOfPages.py "${pewpew[$i]}"`
python3 Novaturas_Crawler_Keliones.py "$NumOfPages" "$4" "${pewpew[$i]}"
done
}


directory=`python3 Novaturas_Crawler_Keliones_Selector.py`
Name="$1"
my_array=($(echo $directory | tr " " "\n"))
split=`python3 PageSpliter.py "${#my_array[@]}"`
split_array=($(echo $split | tr "\n" "\n"))
python3 Test.py "$Name"
cust_func "0" "${split_array[1]}" "$(echo ${my_array[@]})" "$Name" &
cust_func "${split_array[1]}" "${split_array[2]}" "$(echo ${my_array[@]})" "$Name" &
cust_func "${split_array[2]}" "${split_array[3]}" "$(echo ${my_array[@]})" "$Name" &
cust_func "${split_array[3]}" "${split_array[4]}" "$(echo ${my_array[@]})" "$Name" &
cust_func "${split_array[4]}" "${split_array[5]}" "$(echo ${my_array[@]})" "$Name" &
cust_func "${split_array[5]}" "$(( ${split_array[6]} + 1 ))" "$(echo ${my_array[@]})" "$Name" &

wait
echo "Done"