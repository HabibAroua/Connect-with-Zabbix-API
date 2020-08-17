import urllib.request, json
import sys
sys.path.append('element.py')
from element import Element


with urllib.request.urlopen("http://localhost/zabbix/json/getAllSlaByService.php") as url:
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]
line = []
for i in range(0,len(data)):
    for j in range(0,len(data[i]['list'])):
            tab.append(float(data[i]['list'][j]))
print(tab)

e=Element("Sana",25)
print(e.getSla())