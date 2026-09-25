from PIL import Image, ImageDraw

img = Image.open('public/images/gold-medal.png')
img = img.convert("RGBA")

w, h = img.size

# Floodfill from corners to replace white with transparent
ImageDraw.floodfill(img, (0, 0), (255, 255, 255, 0), thresh=50)
ImageDraw.floodfill(img, (w-1, 0), (255, 255, 255, 0), thresh=50)
ImageDraw.floodfill(img, (0, h-1), (255, 255, 255, 0), thresh=50)
ImageDraw.floodfill(img, (w-1, h-1), (255, 255, 255, 0), thresh=50)

img.save('public/images/gold-medal.png')
print("Background removed successfully.")
