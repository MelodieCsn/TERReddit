from copy import deepcopy
import urllib.request, json, unidecode
import praw
import pandas as pd
import json
import nltk
from nltk.corpus import treebank
import copy
import re
import urllib
from bs4 import BeautifulSoup
import requests
import webbrowser






def isClean(title):
    title=str(title)
    if title.find("x") >= 0:
        k= title.find("x")
        if (k-1) >=0 and title[k-1].isnumeric() or title[k-1]==" ":
            return False
        elif (k+1) < len(title) and (title[k+1].isnumeric() or title[k+1]==" "):
            return False
    elif title.find("X") >= 0:
        k= title.find("X")
        if (k-1) >=0 and (title[k-1].isnumeric() or title[k-1]==" "):
            return False
        elif (k+1) < len(title) and title[k+1].isnumeric() or title[k+1]==" ":
            return False
    return True

def properNoun(lexical):
    liste =""
    for couple in lexical:
        if couple[1]=="NNP":
            liste+=couple[0]+" "
    return liste.strip()
def cleanTitle(title, step):
    if step==1:
        title = str(title)
        title = title.strip()

        motif = re.compile(r"\d{3,}")
        list = motif.findall(title)
        if len(list)>0:
            for out in list:
                title = title.replace(out,"")

        title=title.replace("[OC]","")
        title = title.replace("{OC}", "")
        title = title.replace("{oc}", "")
        title = title.replace(",OC ", "")
        title = title.replace("OC, ", "")
        title = title.replace("(OC)", "")
        title = title.replace("(oc), ", "")
        title = title.replace("oc,", "")
        title = title.replace(",oc ", "")
        title = title.replace("IG", "")
        title = title.replace(":", "")
        title = title.replace("[oc]", "")
        title = title.replace("(", "")
        title = title.replace(")", "")
        title = title.replace("[", "")
        title = title.replace("]", "")
        title=title.replace(" OC ","")
        title = title.replace(" oc ", "")
        title = title.strip()
        if (title.find("@") >= 0):
            indice = title.find("@")
            k = indice + 1
            while (k != " " and k < len(title)):
                k = k + 1
            title = title[:indice - k] + title[k:]
            title = title.strip()


        title = title.strip()

        print("After clean :",title)
        return title
    if step==2:
        indice = title.find("x")
        if indice < 0:
            indice = title.find("X")
        if indice >=0:
            chain1 = str(title[:indice-1])
            chain2 = str(title[indice+1:])
            if len(chain1) > 0:
                while chain1[-1].isnumeric() or chain1[-1]==" ":
                    chain1 = chain1[:-1]
            if len(chain2) > 0:
                while chain2[0].isnumeric() or chain2[0]==" ":
                    chain2 = chain2[1:]
            title = chain1+" "+chain2
            while not title[-1].isalpha():
                title = title[:-1]
            title = title.strip()
            print("After clean :", title)
            return title


def geoNamesSearch(lieu):

    lieu = lieu.replace(" ", "+")       #remplace les espaces par des +
    lieu = lieu.replace("'", "+")       #remplace les apostrophes par des plus
    lieu = unidecode.unidecode(lieu)    #pour retirer les accents !attention tester les cédilles

    api = "http://api.geonames.org/searchJSON?q="+lieu+"&maxRows=1&username=projet_TER_reddit"
    #print(api)

    with urllib.request.urlopen(api) as url:
        data = json.loads(url.read().decode())
    #print(data)
    if data['totalResultsCount'] == 0:
        return -1

    #TODO if pas de result ou erreur chercher sur wikipedia ?

    long = data['geonames'][0]['lng']
    lat  = data['geonames'][0]['lat']

    #print("latitude = ",lat)
    #print("longitude = ",long)

    list=[]

    list.append(lieu)
    list.append(long)
    list.append(lat)
    return list



def collectionFromReddit():
    reddit = praw.Reddit ( client_id = 'tMRO7I9OYVnG7A' , client_secret = 'Ghudpyy79xN1dUv9-lIdRaiTswE' , user_agent = 'dassScraping' )
    posts = []
    ml_subreddit = reddit.subreddit('EarthPorn')
    for post in ml_subreddit.hot(limit=35):
        print("Original title :",post.title)
        step =1
        afterClean = deepcopy(post.title)
        afterClean=cleanTitle(afterClean,step)
        print("It's cleaned ?",isClean(afterClean))
        while not isClean(afterClean) and step <=2:
            step = step + 1
            afterClean = cleanTitle(afterClean, step)
            print("It's cleaned ?", isClean(afterClean))
        lexical = nltk.word_tokenize(afterClean)
        lexical = nltk.pos_tag(lexical)
        print("lexical:",lexical)
        print("proper noun:", properNoun(lexical))
        print("geoNames:",geoNamesSearch(properNoun(lexical)))
        print("-------------------------------------")

        posts.append([str(post.title), afterClean, post.score, post.id, str(post.subreddit), ""+str(post.url), int(post.num_comments), str(post.selftext).strip(' \\'), int(post.created)])
    posts = pd.DataFrame(posts,columns=['title', 'afterClean','score', 'id', 'subreddit', 'url', 'num_comments', 'body', 'created'])

collectionFromReddit()


# text = 'hello world'
# text = urllib.parse.quote_plus(text)
# url = 'https://www.bing.com/search?q=' + text
#
# headers = {
#             "user-Agent": 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36'
#         }
#
# page = requests.get(url, headers=headers)
# soup = BeautifulSoup(page.content, 'html.parser')
# print(soup.get_text())


