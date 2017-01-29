import requests
from random import randint
r = requests.post("http://bugs.python.org", data={'number': randint(60,100), 'type': 'issue', 'action': 'show'})
#print(r.status_code, r.reason)
#print(r.text[:300] + '...')
