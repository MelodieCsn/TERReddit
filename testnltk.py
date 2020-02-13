import nltk
import os

import nltk.corpus
from nltk.tokenize import word_tokenize #package qui analyse la syntaxe, très importaaaaaant
from nltk.tokenize import RegexpTokenizer
from nltk.data import load

sent = "Snowshoed up Mt. Shasta this past December. Lots of layers seemed to be the theme for the day! [OC] [1696x2261] More adventures on IG: @kevinapereira"
sent_tokens = word_tokenize(sent) #sent 
for token in sent_tokens:
    print(nltk.pos_tag([token]))
