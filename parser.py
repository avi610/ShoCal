from urllib2 import urlopen
import os
from xml.dom import minidom


tvrage = urlopen('http://services.tvrage.com/feeds/full_show_info.php?sid=27817')
tvxml = minidom.parseString(tvrage.read())
names = tvxml.getElementsByTagName('seasonnum')
#for name in names:
for x in names:
	print x.toxml()
	print 