class File:
	def __init__(self, fileName):
		self.fileName = fileName
		
	def readFile(fileName):
		try:
			with open(fileName, 'r') as file:
				data = file.read().replace('\n', '')
				return data
		except Exception as e : 
		    print(str(e))

	def writeFile(fileName,line):
		try:
			with open(fileName,'w') as f:
				f.write(line)
		except Exception as e : 
			print("This file is not found : "+str(e))
			
	def addNewLineInFile(fileName,line):
		try:
			hs = open(fileName,"a")
			hs.write(line+"\n")
			hs.close()
		except Exception as e : 
			print(str(e))
			
	def createNewFile(fileName):
		try:
			f= open(fileName,"w+")
		except Exception as e : 
			print(str(e))
			
	def deleteFile(fileName):
		try:
			os.remove("ChangedFile.csv")
			print("File Removed!")
		except Exception as e : 
			print(str(e))
