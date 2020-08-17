class Element:
    
    def __init__(self, host_name , sla):
        self.host_name = host_name
        self.sla = sla
        
    def getHost_name(self):
        return self.host_name
    
    def setHost_name(self,host_name):
        self.host_name = host_name
        
    def getSla(self):
        return self.sla
    
    def setSla(self , sla):
        self.sla = sla
        
    #Add new method to convert string to float
    def convertString_To_Float(self , sla):
        tab = []
        for i in range(0,len(self.sla)):
            tab.append(float(sla[i]))
        return tab