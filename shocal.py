from urllib2 import urlopen
from xml.dom import minidom
import sqlite3

import xml.parsers.expat


conn = sqlite3.connect('tvdb.db')
c = conn.cursor()
#c.execute('''CREATE TABLE tvinfo (showid INT PRIMARY KEY, name TEXT, totalseasons INT, started TEXT, classification TEXT , network TEXT, airtime TEXT, airday TEXT, image TEXT)''')


#38769
for x in range(1, 38769):
	try:
		tvrage = urlopen('http://services.tvrage.com/feeds/full_show_info.php?sid=' + str(x))
		tvxml = minidom.parseString(tvrage.read())
	except (xml.parsers.expat.ExpatError, RuntimeError):
		continue



	
	names = tvxml.getElementsByTagName('status')
	for name in names:
		a = name.firstChild.nodeValue	
		stat = tvxml.getElementsByTagName('network')
		for statt in stat:	
			 network = statt.firstChild.nodeValue
		stat2 = tvxml.getElementsByTagName('showid')
		for statt2 in stat2:	
			 sid = statt2.firstChild.nodeValue
		print a
		print sid
		if (a == "Returning Series" or a == "New Series") and (network == "NBC"
			or network == "CBS" or network == "ABC" or network == "FOX"
			or network == "HBO" or network == "HSN" or network == "TNT"
			or network == "Nickelodeon" or network == "Showtime" or network == "USA"
			or network == "MTV" or network == "CNN" or network == "TBS" or network == "Lifetime"
			or network == "Discovery" or network == "The WB" or network == "Disney"
			or network == "A&E" or network == "Cinemax" or network == "Univision"
			or network == "TLC"):
			names = tvxml.getElementsByTagName('showid')
			for name in names:
				print name.toxml()
				showid = name.firstChild.nodeValue

			names = tvxml.getElementsByTagName('name')
			for name in names:
				print name.toxml()
				showname = name.firstChild.nodeValue

			try:
				names = tvxml.getElementsByTagName('totalseasons')
				for name in names:
					print name.toxml()
					totalseasons = name.firstChild.nodeValue
			except (AttributeError, NameError):
				totalseasons = None

			try:
				names = tvxml.getElementsByTagName('started')
				for name in names:
					print name.toxml()
					started = name.firstChild.nodeValue
			except (AttributeError, NameError):
				started = None

			try:
				names = tvxml.getElementsByTagName('image')
				for name in names:
					print name.toxml()
					image = name.firstChild.nodeValue
			except (AttributeError, NameError):
				image = None

			try:
				names = tvxml.getElementsByTagName('network')
				for name in names:
					print name.toxml()
					network = name.firstChild.nodeValue
			except (AttributeError, NameError):
				network = None

			try:
				names = tvxml.getElementsByTagName('airtime')
				for name in names:
					print name.toxml()
					airtime = name.firstChild.nodeValue
			except (AttributeError, NameError):
				airtime = None

			try:
				names = tvxml.getElementsByTagName('airday')
				for name in names:
					print name.toxml()
					airday = name.firstChild.nodeValue
			except (AttributeError, NameError):
				airday = None

			try:
				names = tvxml.getElementsByTagName('classification')
				for name in names:
					print name.toxml()
					genre= name.firstChild.nodeValue
			except (AttributeError, NameError):
				genre = None

			try:
				names = tvxml.getElementsByTagName('runtime')
				for name in names:
					print name.toxml()
					runtime= name.firstChild.nodeValue
			except (AttributeError, NameError):
				runtime = None

			try:
				c.execute('INSERT INTO shows VALUES (?,?,?,?,?,?,?,?,?,? )', (showid, showname, totalseasons, started, genre, network, airtime, airday, image, runtime))
				conn.commit()
			except (sqlite3.IntegrityError, NameError):
				continue
			else:
				continue
			#c.execute('''CREATE TABLE tvinfo (showid INT PRIMARY KEY, name TEXT, totalseasons INT, started TEXT, genre TEXT , network TEXT, airtime TEXT, airday TEXT, image TEXT)''')

			
			"""
			names = tvxml.getElementsByTagName('episode')
			for name in names:
				print name.toxml()
			"""
conn.close()

"""
for name in names:
	for x in range(0, len(name.childNodes)):
		print name.childNodes[x].toxml()
"""



    	


