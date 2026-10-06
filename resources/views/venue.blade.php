@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Hero Section -->
<div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 120px 0 80px 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.85);"></div>
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <h1 style="color: #ffffff; font-size: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0;">
            {{ $settings['visit_hero_title'] ?? 'VISIT' }}
        </h1>
    </div>
</div>

<!-- Places of Interest Section -->
<section style="padding: 80px 0; background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="color: #0f172a; font-size: clamp(2rem, 5vw, 2.8rem); font-weight: 800; margin-bottom: 20px;">
                {{ $settings['visit_section_title'] ?? 'Places of Interest in Chennai' }}
            </h2>
            <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                {{ $settings['visit_section_subtitle'] ?? 'Chennai, the vibrant capital of Tamil Nadu, offers a rich blend of cultural heritage, history, art and coastal beauty. Conference delegates may explore these iconic destinations:' }}
            </p>
        </div>

        @php
            if (empty($places)) {
                $places = [
                    ['title' => 'Marina Beach', 'image' => 'images/marina_beach.jpg', 'desc' => 'One of India’s longest urban beaches and an iconic landmark of Chennai.'],
                    ['title' => 'Kapaleeshwarar Temple, Mylapore', 'image' => 'images/kapaleeshwarar_temple.jpg', 'desc' => 'A historic temple showcasing traditional Dravidian architecture.'],
                    ['title' => 'Santhome Basilica', 'image' => 'images/santhome_basilica.jpg', 'desc' => 'A significant Christian heritage site built over the traditional tomb of St. Thomas the Apostle.'],
                    ['title' => 'Fort St. George', 'image' => 'images/fort_st_george.jpg', 'desc' => 'A historic colonial landmark and an important part of Chennai’s history.'],
                    ['title' => 'Government Museum, Egmore', 'image' => 'images/government_museum.jpg', 'desc' => 'Home to an extensive collection of archaeology, art and bronze sculptures.'],
                    ['title' => 'Elliot’s Beach, Besant Nagar', 'image' => 'images/elliots_beach.jpg', 'desc' => 'A popular destination for a relaxing evening by the sea.'],
                    ['title' => 'Guindy National Park', 'image' => 'images/guindy_national_park.jpg', 'desc' => 'A unique urban national park known for its native flora and fauna.'],
                    ['title' => 'Chennai Rail Museum', 'image' => 'images/chennai_rail_museum.jpg', 'desc' => 'Showcasing India’s railway heritage through vintage locomotives and exhibits.'],
                    ['title' => 'DakshinaChitra', 'image' => 'images/dakshinachitra.jpg', 'desc' => 'A cultural museum showcasing the traditional architecture, crafts and lifestyles of South India.'],
                    ['title' => 'Birla Planetarium', 'image' => 'images/birla_planetarium.jpg', 'desc' => 'A popular destination for astronomy and science enthusiasts.'],
                    ['title' => 'Arignar Anna Zoological Park (Vandalur)', 'image' => 'images/arignar_anna_zoological_park.jpg', 'desc' => 'One of India’s largest zoological parks, home to diverse wildlife and natural habitats.'],
                    ['title' => 'Cholamandal Artists’ Village', 'image' => 'images/cholamandal_artists_village.jpg', 'desc' => 'A renowned artists’ community showcasing contemporary Indian art, sculptures and creative works.'],
                    ['title' => 'Theosophical Society, Adyar', 'image' => 'images/theosophical_society.jpg', 'desc' => 'A peaceful heritage space known for its lush greenery, gardens and serene surroundings.'],
                    ['title' => 'Semmozhi Poonga', 'image' => 'images/semmozhi_poonga.jpg', 'desc' => 'Chennai’s popular botanical garden featuring a wide variety of plants and beautifully landscaped gardens.']
                ];
            }
        @endphp

        <!-- Grid of Places -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
            @foreach($places as $place)
                <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                    <img src="{{ asset($place['image'] ?? 'images/marina_beach.jpg') }}" alt="{{ $place['title'] ?? 'Place' }}" style="width: 100%; height: 220px; object-fit: cover;">
                    <div style="padding: 25px; flex-grow: 1;">
                        <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">{{ $place['title'] ?? '' }}</h3>
                        <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">{{ $place['desc'] ?? '' }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Quote -->
        <div style="margin-top: 70px; padding: 40px; background: #0f172a; border-radius: 16px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <h4 style="color: #009688; font-size: clamp(1.2rem, 3vw, 1.8rem); font-style: italic; font-weight: 600; margin: 0; line-height: 1.5;">
                “Experience Chennai — where tradition, heritage, science and the sea meet.”
            </h4>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.visit-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'none';
                this.style.boxShadow = '0 4px 15px rgba(0,0,0,0.05)';
            });
        });
    });
</script>

@include('sections.footer')
@endsection
