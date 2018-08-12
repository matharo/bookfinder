#Install pandas and xlrd

import pandas as pd

xlsx = pd.ExcelFile('AllCallNumbers.xlsx')
firstSheet = 0
callnums = pd.read_excel(xlsx,firstSheet)

#gets all columns
cols = callnums.columns.get_values()

#gets entire column except title, makes sure all text upper
rangeStart = callnums['RangeStart'].str.upper()
rangeEnd = callnums['RangeEnd'].str.upper()


#Split the RangeStart based on white spaces, renames the columns
sepRangeStart = pd.DataFrame(rangeStart.str.split().tolist())
for i in range(0,len(sepRangeStart)):
    sepRangeStart = sepRangeStart.rename(columns={i:'RangeStart' + str(i+1)})


#Split the RangeEnd based on white spaces, renames the columns
sepRangeEnd = pd.DataFrame(rangeEnd.str.split().tolist())
for i in range(0,len(sepRangeEnd)):
    sepRangeEnd = sepRangeEnd.rename(columns={i:'RangeEnd' + str(i+1)})

#Adds the new columns into the main excel file
splitRanges = sepRangeStart.join(sepRangeEnd)
callnums = callnums.join(splitRanges)
print(callnums)


###Apply function to column
##callnums['RangeStart'].apply(split_rows)



###Create a new excel file
##outPath = "/newCallNumSheet.xlsx"
##writer = pd.ExcelWriter(outPath,engine = 'xlsxwriter')
##callnums.to_excel(writer,sheet_name='SplitCallNums')
##writer.save()
