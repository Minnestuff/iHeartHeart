fname = "data.txt"
target = open('data.txt', 'w')
count = 0
with open(fname) as f:
    count = count + 1
    content = f.readlines()
#FIX target.write(count+","+content))

target.close()
print "Done"
