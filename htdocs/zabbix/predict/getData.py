import urllib.request 
import urllib.parse
import re
import sys
import json

def readFile(fileName):
    try:
        with open(fileName, 'r') as file:
            data = file.read().replace('\n', '')
        return data
    except Exception as e : 
        print(str(e))

def writeFile(fileName,line):
    try:
        with open(fileName,'w') as f:
            f.write(line)
    except Exception as e : 
        print("This file is not found : "+str(e))
        
def addNewLineInFile(fileName,line):
    try:
        hs = open(fileName,"a")
        hs.write(line+"\n")
        hs.close()
    except Exception as e : 
        print(str(e))
        
def createNewFile(fileName):
    try:
        f= open(fileName,"w+")
    except Exception as e : 
        print(str(e))
    
def main():
    try:
        choice = input("Do you want to create new file Y/N ? : ")
        if choice == 'Y' or choice == 'y':
            createNewFile(input("File name : "))
        c='Y'
        while c=='y' or c=='Y' :
            url = input("Enter an URL : ")
            x = urllib.request.urlopen(url)
            s=x.read()
            print(s[1])
            choice='N'
            choice = input ("Do you want to store this content in file ? : Y/N ")
            if choice == 'Y' or choice == 'y' :
                addNewLineInFile(input('File name : '),str(s))
            c = input("Continue ? Y/N : ")
        print ('Show the content of file')
        readFile(input("Show content of file : "))
  
    except Exception as e : 
        print(str(e))
        main()

def clean(fileName):
    content=readFile(fileName)
    x1=content.find("body")
    x2=content.find("</body>")
    print(content[x1:x2])
    writeFile(fileName,content[x1:x2])

def cleanBody(fileName):
    content = readFile(fileName)
    x1=content.find("script")
    x2=content.find("</script>")
    print(content[x1:x2])
    #writeFile(fileName,content[x1:x2])
        

#clean(input("File name : "))
#cleanBody(input("File name : "))
main()
