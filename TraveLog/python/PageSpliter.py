#import os
import sys

first_arg = sys.argv[1]
def main(word1=first_arg):
    total=int(word1)
    divider=6
    divided=total/divider
    divisor=total%divider
    if(total<divider):
        for i in range(1,total+1):
            print(i)
        for i in range(total+1,divider+1):
            print(0)
    else:
        print(1)
        for i in range(1,7):
            print(i*int(divided))
        if(int(divided*divider)!=total):
            print (int(divided)*divider+divisor)
if __name__ == "__main__":
    main()