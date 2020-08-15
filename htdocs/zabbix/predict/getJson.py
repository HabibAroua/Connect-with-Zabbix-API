import urllib.request, json 
with urllib.request.urlopen("http://localhost/zabbix/json/getAllSlaByService.php") as url:
    data = json.loads(url.read().decode())
    print(len(data))
tab =[]
for i in range(0,len(data)):
	tab.append(data[i]['host_name'])
	
print(tab)