from numpy import array
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import LSTM
from tensorflow.keras.layers import Dense
import subprocess
import webbrowser
import sys

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
    
    def split_sequence(sequence, n_steps):
        X, y = list(), list()
        for i in range(len(sequence)):
        	# find the end of this pattern
        	end_ix = i + n_steps
        	# check if we are beyond the sequence
        	if end_ix > len(sequence)-1:
        		break
        	# gather input and output parts of the pattern
        	seq_x, seq_y = sequence[i:end_ix], sequence[end_ix]
        	X.append(seq_x)
        	y.append(seq_y)
        return array(X), array(y)