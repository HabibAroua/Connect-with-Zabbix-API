import urllib.request, json
import urllib.parse
import re
import sys
sys.path.append('element.py')
from element import Element

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
        
def deleteFile(fileName):
    try:
        os.remove("ChangedFile.csv")
        print("File Removed!")
    except Exception as e : 
        print(str(e))

with urllib.request.urlopen("http://localhost/zabbix/json/getAllSlaByService.php") as url:
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]

for i in range(0,len(data)):
    e=Element(data[i]['host_name'],data[i]['list'])
    tab.append(e)

createNewFile('result.py')

for i in range(0 , len(tab)):
    #print (tab[i].getHost_name())
    #print (tab[i].getSla())
    raw = tab[i].convertString_To_Float(tab[i].getSla())
    print ("%s:%f"@{tab[i].getHost_name(),tab[i].calcul_prediction(raw)})