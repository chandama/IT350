#!/usr/bin/env python

import MySQLdb

# connect to the database
db = MySQLdb.connect("localhost","root","itr0cks!","bluehalo")

# setup a cursor object using cursor() method
cursor = db.cursor()

# run an sql question
cursor.execute("SELECT VERSION()")

# grab one result
data = cursor.fetchone()


# close the mysql database connection
db.close()
