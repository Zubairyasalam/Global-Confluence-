@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Hero Section -->
<div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 120px 0 80px 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.85);"></div>
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <h1 style="color: #ffffff; font-size: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0;">MCC MEMORIAL</h1>
    </div>
</div>

<section style="background-color: #ffffff; padding: 80px 0; min-height: 80vh; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div style="display: flex; justify-content: center; margin-bottom: 50px; text-align: center;">
            <p style="color: #64748b; font-size: 1.1rem; max-width: 100%; margin: 0 auto; line-height: 1.6; font-weight: 500;">
                Experience a visual journey through the heritage, corridors, and legacy of the Madras Christian College.
            </p>
        </div>

        <style>
            .photo-gallery {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                grid-auto-rows: 250px;
                gap: 20px;
            }
            .gallery-item {
                border-radius: 16px;
                overflow: hidden;
                cursor: pointer;
                position: relative;
            }

            .gallery-item img {
                width: 100%;
                height: 100%;
                display: block;
                transition: transform 0.4s ease;
                object-fit: cover;
            }
            .gallery-item:hover img {
                transform: scale(1.05);
            }
            @media (max-width: 900px) {
                .photo-gallery { 
                    grid-template-columns: repeat(2, 1fr); 
                    grid-auto-rows: 200px;
                }
                p[style*="text-align: right"] { text-align: left !important; }
            }
            @media (max-width: 600px) {
                .photo-gallery { 
                    grid-template-columns: 1fr; 
                    grid-auto-rows: 250px;
                }
                .gallery-item { grid-row: span 1 !important; grid-column: span 1 !important; }
            }
        </style>

        <div class="photo-gallery">
            @php
                $images = [];
                $files = glob(public_path('images/mcc_memorial_*.*'));
                foreach ($files as $file) {
                    $images[] = asset('images/' . basename($file));
                }
                
                // Ensure proper numeric sorting so mcc_memorial_2 comes before mcc_memorial_10
                usort($images, function($a, $b) {
                    preg_match('/mcc_memorial_(\d+)/', $a, $matchA);
                    preg_match('/mcc_memorial_(\d+)/', $b, $matchB);
                    $numA = (int)($matchA[1] ?? 0);
                    $numB = (int)($matchB[1] ?? 0);
                    return $numA <=> $numB;
                });
            @endphp
            @foreach($images as $img)
                <div class="gallery-item">
                    <img src="{{ $img }}" alt="MCC Memorial Image">
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Lightbox Modal -->
<div id="lightbox" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.95); z-index: 9999; justify-content: center; align-items: center; padding: 20px;">
    <span class="close-lightbox" style="position: absolute; top: 20px; right: 30px; color: #fff; font-size: 40px; font-weight: 300; cursor: pointer; transition: color 0.2s;">&times;</span>
    <img id="lightbox-img" src="" style="max-width: 95%; max-height: 90vh; border-radius: 16px; object-fit: contain; transform: scale(0.8); opacity: 0; transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const galleryItems = document.querySelectorAll('.gallery-item img');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeBtn = document.querySelector('.close-lightbox');

    galleryItems.forEach(img => {
        img.addEventListener('click', () => {
            lightboxImg.src = img.src;
            lightbox.style.display = 'flex';
            // Small delay to allow display block to apply before animating opacity/transform
            setTimeout(() => {
                lightboxImg.style.transform = 'scale(1)';
                lightboxImg.style.opacity = '1';
            }, 50);
        });
    });

    const closeLightbox = () => {
        lightboxImg.style.transform = 'scale(0.8)';
        lightboxImg.style.opacity = '0';
        setTimeout(() => {
            lightbox.style.display = 'none';
        }, 300);
    };

    closeBtn.addEventListener('click', closeLightbox);
    
    // Close on background click
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
            closeLightbox();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && lightbox.style.display === 'flex') {
            closeLightbox();
        }
    });
});
</script>

@include('sections.footer')
@endsection
