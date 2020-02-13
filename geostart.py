# avant de lancer :
#pip install bottle
#pip install unidecode

import urllib.request, json, unidecode
#import treetaggerwrapper ,pprint


#1) build a TreeTagger wrapper:
#tagger = treetaggerwrapper.TreeTagger(TAGLANG='en')
#2) tag your text.
#tags = tagger.tag_text("'Questions' I shot this on New Years Eve up in the Canterbury High Country, New Zealand [1365 x 2048] [OC]")
#3) use the tags list... (list of string output from TreeTagger).
#pprint.pprint(tags)




lieu = input("lieu à chercher : ")
lieu = lieu.replace(" ", "+")       #remplace les espaces par des +
lieu = lieu.replace("'", "+")       #remplace les apostrophes par des plus
lieu = unidecode.unidecode(lieu)    #pour retirer les accents !attention tester les cédilles

api = "http://api.geonames.org/searchJSON?q="+lieu+"&maxRows=1&username=projet_TER_reddit"
print(api)

with urllib.request.urlopen(api) as url:
    data = json.loads(url.read().decode())
print(data)

#TODO if pas de result ou erreur chercher sur wikipedia ?

long = data['geonames'][0]['lng']
lat  = data['geonames'][0]['lat']


print("longitude = ",long)
print("latitude = ",lat)