import re

normalstr = "PS 3507.R 55.Z5"
osizestr = "O'SIZEND 553 .P5 A4 1995"
refstr = "REFPN 147 .M 65"

#range start
#AAA 0000.00 .A0000 A0000 0000 V. 0000


#each part of the call number, separated by letters and numbers
#includes decimals
substrings = [3,7,2,5,1,4,4,4]
osize = "O'SIZE"
osizelen = len(osize)
ref = "REF"
reflen = len(ref)
vol = "V."
vollen = len(vol)



#Separates osize and ref
#Returns a list with 2 items
def sep_osizeref(string):
    sep = []
    if osize in string:
        sep.append(osize)
        sep.append(string[osizelen:])
    elif ref in string:
        sep.append(ref)
        sep.append(string[ref:])
    return sep

def letters(string,padding,length):
    if length == 1:
        return string
    elif length == 3:
        strlen = len(string)
        while strlen != length:
            string = string + padding
            strlen = len(string)
    return string

def numbers(numstr,padding,length):
    if length == 6:
        strlen = len(numstr)
        if "." in numstr:
            numstr.split(".")

            s1 = len(numstr[1])
            while s1 != 2:
                numstr = numstr + padding
    return numstr

def isfloat(value):
    try:
        float(value)
        return True
    except ValueError:
        return False


def sep_nums(string):
    if (not isfloat(string)):
        sep = re.split('(\d+)',string)
        return sep
    else:
        sep = []

##def trans_RangeStart():
    #for i in RangeStart:
##        #Splits whenever see a number
##        splits = re.split('(\d+)',osizestr)
##        #Removes all white spaces
##        splits = [i.strip(' ') for i in splits]
##        #Removes '' from list
##        splits = [item for item in splits if item]
##        print(splits)
##
##        if osize in splits[0]:
##            newlist = splits[0].split(osize,1)
##            splits.insert(1,newlist[1])
##            splits[0] = osize
##            print(splits)
##        elif ref in splits[0]:
##            newlist = splits[0].split(ref,1)
##            splits.insert(1,newlist[1])
##            splits[0] = ref
##            print(splits)
##
##trans_RangeStart()



def trans_RangeEnd():
    #for i in RangeEnd:
        splits = osizestr.split()
        print(splits)
        sep = sep_osizeref(splits[0])
        if (sep != []):
            splits[0] = sep[0]
            splits.insert(1,sep[1])
        else:
            splits.insert(1,splits[0])
            splits[0] = ""
        #Splits 0, 1

        sep = sep_nums(splits[2])
        if (sep != []):
            splits.remove(splits[2])
            j = 0
            for i in range(0,len(sep)):
                if sep[i] != '':
                    splits.insert(2+j,sep[i])
                    j = j+1
        #Splits 2

        

        print(splits)
        
trans_RangeEnd()
