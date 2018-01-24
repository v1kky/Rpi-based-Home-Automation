#!/usr/bin/python
from time import sleep
import MySQLdb
import RPi.GPIO as GPIO
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.OUT)

#motor=1

#i=0
#while i<10:
#	if i != y:
#		print "success2"
#	i=i+1
#if motor==1:GPIO.output(17, GPIO.LOW)
#else:GPIO.output(17, GPIO.HIGH)
db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                   user="root",         # your username
                    passwd="staff123",  # your password
                     db="relaypi")        # name of the data base

cur = db.cursor()
cur.execute("SELECT * FROM records where id=1")
for row in cur.fetchall():
		#	print row[2]
	motor=row[2]
db.close()
if motor==1:GPIO.output(17, GPIO.LOW)
else:GPIO.output(17, GPIO.HIGH)
sleep(15)
db = MySQLdb.connect(host="localhost",    # your host, usually localhost
                   user="root",         # your username
                    passwd="staff123",  # your password
                     db="relaypi")        # name of the data base

cur = db.cursor()
cur.execute("SELECT * FROM records where id=1")
for row in cur.fetchall():
		#	print row[2]
	motor=row[2]
db.close()
if motor==1:GPIO.output(17, GPIO.LOW)
else:GPIO.output(17, GPIO.HIGH)
sleep(10)
