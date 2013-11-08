from urllib2 import urlopen
from xml.dom import minidom
import sqlite3

import xml.parsers.expat


conn = sqlite3.connect('tvdb.db')
c = conn.cursor()
c.execute('''CREATE TABLE shows (showid INT PRIMARY KEY, name TEXT, totalseasons INT, started TEXT, classification TEXT , network TEXT, airtime TEXT, airday TEXT, image TEXT, runtime TEXT)''')
conn.commit()
conn.close()