t1 Current Temperatuer 
t2 Threshold Temperature
t3 High temperature alarm
t4 low temperature alarm 

h1 Current humidity 
h2 Threshold humidity 
h3 High humidity alarm
h4 low humidity alarm 

f fan status 
l light status 
d door status
b belt status

ss system status 
sc system connection 

to request to show.php
GET /pro/show.php?d=1  HTTP/1.1

 to insert data 
GET /pro/insert.php?u=admin&p=admin&d=1&m=1&t1=33&t2=22&t3=1&t4=0&h1=23&h2=30&h3=1&h4=0&f=1&l=1&d=1&ss=1&sc=1

u      Username     required
p      Password      required
dev  Device           required
m    Machine        required

all other values in the request are optional

 