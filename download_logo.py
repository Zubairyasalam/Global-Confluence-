import urllib.request
import re
import os

url = 'https://en.wikipedia.org/wiki/National_Institute_of_Siddha'
req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
try:
    html = urllib.request.urlopen(req).read().decode('utf-8')
    match = re.search(r'<img[^>]+src="([^"]+)"[^>]*alt="National Institute of Siddha logo[^"]*"', html, re.I)
    if not match:
        match = re.search(r'<img[^>]+src="([^"]+logo[^"]*)"', html, re.I)
    if match:
        img_url = match.group(1)
        if img_url.startswith('//'):
            img_url = 'https:' + img_url
        print("Found URL:", img_url)
        urllib.request.urlretrieve(img_url, 'public/images/nis_logo.png')
        print("Downloaded to public/images/nis_logo.png")
    else:
        print("Logo not found on Wikipedia page.")
except Exception as e:
    print("Error:", e)
