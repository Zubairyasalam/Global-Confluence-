import requests
from PIL import Image, ImageEnhance
from io import BytesIO
import os
import urllib.parse

places = {
    "Arignar Anna Zoological Park": "arignar_anna_zoological_park.jpg",
    "Cholamandal Artists' Village": "cholamandal_artists_village.jpg",
    "Theosophical Society Adyar": "theosophical_society.jpg",
    "Semmozhi Poonga": "semmozhi_poonga.jpg",
    "Valluvar Kottam": "valluvar_kottam.jpg",
    "MGR Memorial Chennai": "mgr_memorial.jpg",
    "Anna Memorial": "anna_memorial.jpg",
    "Kalakshetra": "kalakshetra_foundation.jpg",
    "Chetpet Eco Park": "chetpet_eco_park.jpg",
    "Kishkinta theme park": "kishkinta_theme_park.jpg"
}

public_images_dir = r"c:\Users\thars\Downloads\biomed-app\biomed-app\public\images"
headers = {
    'User-Agent': 'CoolBot/1.0 (contact@example.com)'
}

for query, filename in places.items():
    print(f"Fetching {query}...")
    
    try:
        search_url = f"https://en.wikipedia.org/w/api.php?action=query&list=search&srsearch={urllib.parse.quote(query)}&utf8=&format=json"
        res = requests.get(search_url, headers=headers)
        data = res.json()
        
        if not data.get('query', {}).get('search'):
            print(f"  Not found on Wiki: {query}")
            continue
        
        title = data['query']['search'][0]['title']
        
        page_url = f"https://en.wikipedia.org/w/api.php?action=query&titles={urllib.parse.quote(title)}&prop=pageimages&pithumbsize=800&format=json"
        page_res = requests.get(page_url, headers=headers).json()
        pages = page_res['query']['pages']
        page = next(iter(pages.values()))
        
        if 'thumbnail' not in page:
            print(f"  No image on Wiki for {title}")
            continue
            
        img_url = page['thumbnail']['source']
        print(f"  Found image: {img_url}")
        
        img_res = requests.get(img_url, headers=headers)
        img = Image.open(BytesIO(img_res.content))
        
        if img.mode != 'RGB':
            img = img.convert('RGB')
            
        # Brighten by 15% as requested by user
        enhancer = ImageEnhance.Brightness(img)
        img = enhancer.enhance(1.15)
        
        save_path = os.path.join(public_images_dir, filename)
        img.save(save_path, "JPEG", quality=90)
        print(f"  Saved {filename}")
    except Exception as e:
        print(f"  Error processing {query}: {e}")
