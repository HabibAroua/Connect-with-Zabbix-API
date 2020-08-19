import urllib.request, json
import urllib.parse
import re
import sys
sys.path.append('element.py')
from element import Element
sys.path.append('file.py')
from file import File

with urllib.request.urlopen("http://localhost/zabbix/json/getAllSlaByService.php") as url:
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]

for i in range(0,len(data)):
    e=Element(data[i]['host_name'],data[i]['list'])
    tab.append(e)
f = File("result.csv")
f.createNewFile()

for i in range(0 , len(tab)):
    #print (tab[i].getHost_name())
    #print (tab[i].getSla())
    raw = tab[i].convertString_To_Float(tab[i].getSla())
    s = "%s;%f"%(tab[i].getHost_name(),round(tab[i].calcul_prediction(raw),4))
    print(s)
    f.addNewLineInFile(s)