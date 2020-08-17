import urllib.request, json
import sys
sys.path.append('element.py')
from element import Element


with urllib.request.urlopen("http://localhost/zabbix/json/getAllSlaByService.php") as url:
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]

for i in range(0,len(data)):
    e=Element(data[i]['host_name'],data[i]['list'])
    tab.append(e)


for i in range(0 , len(tab)):
    print (tab[i].getHost_name())
    #print (tab[i].getSla())
    print (tab[i].convertString_To_Float(tab[i].getSla()))