class Element:
    def __init__(self, host_name , sla):
        self.host_name = host_name
        self.sla = sla
        
    def getName(self):
        return self.host_name
    
    def setName(self,host_name):
        self.host_name = host_name
        
    def getAge(self):
        return self.sla
    
    def setAge(self , sla):
        self.sla = sla