import urllib.request 
import urllib.parse
import re
import sys

class File:
	def __init__(self, fileName):
		self.fileName = fileName
		
	def readFile(self):
		try:
			with open(self.fileName, 'r') as file:
				data = file.read().replace('\n', '')
				return data
		except Exception as e : 
		    print(str(e))

	def writeFile(self,fileName,line):
		try:
			with open(fileName,'w') as f:
				f.write(line)
		except Exception as e : 
			print("This file is not found : "+str(e))
			
	def addNewLineInFile(self,line):
		try:
			hs = open(self.fileName,"a")
			hs.write(line+"\n")
			hs.close()
		except Exception as e : 
			print(str(e))
			
	def createNewFile(self):
		try:
			f= open(self.fileName,"w+")
		except Exception as e : 
			print(str(e))
			
	def deleteFile(self,fileName):
		try:
			os.remove("ChangedFile.csv")
			print("File Removed!")
		except Exception as e : 
			print(str(e))
