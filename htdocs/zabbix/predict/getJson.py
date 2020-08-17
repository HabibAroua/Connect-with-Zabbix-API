import urllib.request, json 
with urllib.request.urlopen("http://localhost/zabbix/json/getAllSlaByService.php") as url:
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]
line = []
for i in range(0,len(data)):
    for j in range(0,len(data[i]['list'])):
            line.append(float(data[i]['list'][j]))
                tab.append ({data[i]['host_name'] , line})
print(tab)