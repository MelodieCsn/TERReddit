
import praw
import pandas as pd
import json

reddit = praw.Reddit ( client_id = 'tMRO7I9OYVnG7A' , client_secret = 'Ghudpyy79xN1dUv9-lIdRaiTswE' , user_agent = 'dassScraping' )
posts = []
ml_subreddit = reddit.subreddit('EarthPorn')
for post in ml_subreddit.hot(limit=2):
    posts.append([post.title, post.score, post.id, str(post.subreddit), str(post.url).strip(' \\'), int(post.num_comments), str(post.selftext).strip(' \\'), int(post.created)])
posts = pd.DataFrame(posts,columns=['title', 'score', 'id', 'subreddit', 'url', 'num_comments', 'body', 'created'])
print(posts.to_json("fic.json", orient='index'))


