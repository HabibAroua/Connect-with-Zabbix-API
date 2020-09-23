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
    
    def split_sequence(self,sequence, n_steps):
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
    
    def calcul_prediction(self,raw_seq):
        # define input sequence
        # choose a number of time steps
        n_steps = 3
        # split into samples
        X, y = self.split_sequence(raw_seq, n_steps)
        # reshape from [samples, timesteps] into [samples, timesteps, features]
        n_features = 1
        X = X.reshape((X.shape[0], X.shape[1], n_features))
        # define model
        model = Sequential()
        model.add(LSTM(50, activation='relu', input_shape=(n_steps, n_features)))
        model.add(Dense(1))
        model.compile(optimizer='adam', loss='mse')
        # fit model
        model.fit(X, y, epochs=100, verbose=0)
        # demonstrate prediction
        x_input = array([min(raw_seq),(max(raw_seq)+(min(raw_seq))/2),max(raw_seq)])
        x_input = x_input.reshape((1, n_steps, n_features))
        yhat = model.predict(x_input, verbose=0)
        return yhat[0][0]