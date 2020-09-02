import urllib.request, json
import urllib.parse
import re
import sys
sys.path.append('element.py')
from element import Element
sys.path.append('file.py')
from file import File
import subprocess
import webbrowser

fileName = ''
the_url= ''
lastUrl = ''
if ((len(sys.argv)>2) or (len(sys.argv) == 1)):
    print ('You should enter 1 argument not more')
    exit()
elif (str(sys.argv[1]).lower() == "next_days".lower()):
    print ("Next days")
    fileName = 'result.csv'
    the_url = 'http://localhost/zabbix/json/getAllSlaByService.php'
    lastUrl = 'http://127.0.0.1/zabbix/predict/'
    
    
elif (str(sys.argv[1]).lower() == "next_years".lower()):
    print("Next years")
    fileName = "resultYears.csv"
    the_url = 'http://localhost/zabbix/json/getAllSlaByServiceByYears.php'
    lastUrl = 'http://127.0.0.1/zabbix/predict/showByYears.php'
else:
    print("You should enter <<next_days>> or <<next_years>>")
    exit()
    
f = File(fileName)
f.createNewFile()

with urllib.request.urlopen(the_url) as url: 
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]

for i in range(0,len(data)):
    e=Element(data[i]['host_name'],data[i]['list'])
    tab.append(e)

for i in range(0 , len(tab)):
    #print (tab[i].getHost_name())
    #print (tab[i].getSla())
    raw = tab[i].convertString_To_Float(tab[i].getSla())
    s = "%s;%f"%(tab[i].getHost_name(),round(tab[i].calcul_prediction(raw),4))
    print(s)
    f.addNewLineInFile(s)
    
#Open a browser
url = lastUrl
if sys.platform == 'darwin':    # in case of OS X
    subprocess.Popen(['open', url])
    print("Open a browser")
else:
    webbrowser.open_new_tab(url)