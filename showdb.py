import sqlite3

conn = sqlite3.connect('tvdb.db')
c = conn.cursor()

for row in c.execute('SELECT * FROM shows ORDER BY name'):
	print row