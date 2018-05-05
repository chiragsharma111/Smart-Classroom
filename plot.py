import sys
import json
import matplotlib.pyplot as plt

a = sys.argv[1]
print a
a = json.loads(a)
x = list()
y = list()
for i in a:
	x.append(int(i['X']))
	y.append(int(i['Y']))
print x
print y
plt.plot(x, y, 'ro')
plt.savefig('public/entity.png')
