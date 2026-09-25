@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Hero Section -->
<div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 120px 0 80px 0; position: relative;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.85);"></div>
    <div class="container" style="position: relative; z-index: 1; text-align: center;">
        <h1 style="color: #ffffff; font-size: 3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin: 0;">VISIT</h1>
    </div>
</div>

<!-- Places of Interest Section -->
<section style="padding: 80px 0; background-color: #f8fafc; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="color: #0f172a; font-size: clamp(2rem, 5vw, 2.8rem); font-weight: 800; margin-bottom: 20px;">Places of Interest in Chennai</h2>
            <p style="color: #475569; font-size: 1.1rem; line-height: 1.8; max-width: 800px; margin: 0 auto;">
                Chennai, the vibrant capital of Tamil Nadu, offers a rich blend of cultural heritage, history, art and coastal beauty. Conference delegates may explore these iconic destinations:
            </p>
        </div>

        <!-- Grid of Places -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
            
            <!-- Item 1 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/marina_beach.jpg') }}" alt="Marina Beach" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Marina Beach</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">One of India’s longest urban beaches and an iconic landmark of Chennai.</p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/kapaleeshwarar_temple.jpg') }}" alt="Kapaleeshwarar Temple" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Kapaleeshwarar Temple, Mylapore</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A historic temple showcasing traditional Dravidian architecture.</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/santhome_basilica.jpg') }}" alt="Santhome Basilica" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Santhome Basilica</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A significant Christian heritage site built over the traditional tomb of St. Thomas the Apostle.</p>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/fort_st_george.jpg') }}" alt="Fort St. George" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Fort St. George</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A historic colonial landmark and an important part of Chennai’s history.</p>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/government_museum.jpg') }}" alt="Government Museum" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Government Museum, Egmore</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">Home to an extensive collection of archaeology, art and bronze sculptures.</p>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/elliots_beach.jpg') }}" alt="Elliot's Beach" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Elliot’s Beach, Besant Nagar</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A popular destination for a relaxing evening by the sea.</p>
                </div>
            </div>

            <!-- Item 7 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/guindy_national_park.jpg') }}" alt="Guindy National Park" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Guindy National Park</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A unique urban national park known for its native flora and fauna.</p>
                </div>
            </div>

            <!-- Item 8 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/chennai_rail_museum.jpg') }}" alt="Chennai Rail Museum" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Chennai Rail Museum</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">Showcasing India’s railway heritage through vintage locomotives and exhibits.</p>
                </div>
            </div>

            <!-- Item 9 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/dakshinachitra.jpg') }}" alt="DakshinaChitra" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">DakshinaChitra</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A cultural museum showcasing the traditional architecture, crafts and lifestyles of South India.</p>
                </div>
            </div>

            <!-- Item 10 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/birla_planetarium.jpg') }}" alt="Birla Planetarium" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Birla Planetarium</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A popular destination for astronomy and science enthusiasts.</p>
                </div>
            </div>
            <!-- Item 11 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/arignar_anna_zoological_park.jpg') }}" alt="Arignar Anna Zoological Park (Vandalur)" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Arignar Anna Zoological Park (Vandalur)</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">One of India’s largest zoological parks, home to diverse wildlife and natural habitats.</p>
                </div>
            </div>

            <!-- Item 12 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/cholamandal_artists_village.jpg') }}" alt="Cholamandal Artists’ Village" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Cholamandal Artists’ Village</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A renowned artists’ community showcasing contemporary Indian art, sculptures and creative works.</p>
                </div>
            </div>

            <!-- Item 13 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/theosophical_society.jpg') }}" alt="Theosophical Society, Adyar" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Theosophical Society, Adyar</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A peaceful heritage space known for its lush greenery, gardens and serene surroundings.</p>
                </div>
            </div>

            <!-- Item 14 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/semmozhi_poonga.jpg') }}" alt="Semmozhi Poonga" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Semmozhi Poonga</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">Chennai’s popular botanical garden featuring a wide variety of plants and beautifully landscaped gardens.</p>
                </div>
            </div>

            <!-- Item 15 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/valluvar_kottam.jpg') }}" alt="Valluvar Kottam" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Valluvar Kottam</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A prominent cultural landmark dedicated to the celebrated Tamil poet and philosopher Thiruvalluvar.</p>
                </div>
            </div>

            <!-- Item 16 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/mgr_memorial.jpg') }}" alt="MGR Memorial" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">MGR Memorial</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A notable memorial on the Marina waterfront dedicated to former Tamil Nadu Chief Minister M.G. Ramachandran.</p>
                </div>
            </div>

            <!-- Item 17 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/anna_memorial.jpg') }}" alt="Anna Memorial" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Anna Memorial</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A significant landmark along the Marina waterfront dedicated to former Chief Minister C.N. Annadurai.</p>
                </div>
            </div>

            <!-- Item 18 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/kalakshetra_foundation.jpg') }}" alt="Kalakshetra Foundation" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Kalakshetra Foundation</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A renowned cultural institution promoting Indian classical dance, music, arts and traditional crafts.</p>
                </div>
            </div>

            <!-- Item 19 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/chetpet_eco_park.jpg') }}" alt="Chetpet Eco Park" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Chetpet Eco Park</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">An urban recreational destination offering greenery, walking areas, boating and a peaceful environment.</p>
                </div>
            </div>

            <!-- Item 20 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/kishkinta_theme_park.jpg') }}" alt="Kishkinta Theme Park" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Kishkinta Theme Park</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A popular family entertainment destination featuring exciting rides, attractions and recreational activities.</p>
                </div>
            </div>
            <!-- Item 21 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/snow_kingdom.jpg') }}" alt="Snow Kingdom, Chennai" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Snow Kingdom, Chennai</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A unique indoor snow experience where visitors can enjoy snow activities and take fun photographs with friends.</p>
                </div>
            </div>

            <!-- Item 22 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/vgp_universal_kingdom.jpg') }}" alt="VGP Universal Kingdom" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">VGP Universal Kingdom</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">An exciting amusement park where friends can enjoy thrilling rides, games and fun activities.</p>
                </div>
            </div>

            <!-- Item 23 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/kart_attack.jpg') }}" alt="Kart Attack" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">Kart Attack</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">Enjoy an exciting go-karting experience and friendly races with your friends.</p>
                </div>
            </div>

            <!-- Item 24 -->
            <div class="visit-card" style="background: #fff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; display: flex; flex-direction: column;">
                <img src="{{ asset('images/mgm_dizzee_world.jpg') }}" alt="MGM Dizzee World" style="width: 100%; height: 220px; object-fit: cover;">
                <div style="padding: 25px; flex-grow: 1;">
                    <h3 style="color: #009688; font-size: 1.3rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">MGM Dizzee World</h3>
                    <p style="color: #475569; font-size: 0.95rem; line-height: 1.6; margin: 0;">A fun-filled destination offering exciting rides, water attractions and entertainment activities.</p>
                </div>
            </div>
            
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
