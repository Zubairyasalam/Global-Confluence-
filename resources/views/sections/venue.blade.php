<!-- Venue & Highlights Section -->
<section class="venue-section">
    <div style="text-align: center; margin-bottom: 40px; display: flex; flex-direction: column; align-items: center; padding: 0 15px;">
        <h2 style="font-size: clamp(2.2rem, 5vw, 2.8rem); font-weight: 800; color: #0f172a; margin: 0 0 15px 0;">
            {!! $settings['venue_high_title'] ?? 'Venue & <span style="color: #009688;">Highlights</span>' !!}
        </h2>
        <div style="width: 200px; height: 5px; background: #84cc16; border-radius: 3px; margin-bottom: 10px;"></div>
    </div>

    {{-- Desktop Grid (3-column) --}}
    <div class="venue-grid venue-grid-desktop">
        <!-- Tall Column (Left) -->
        @php $img1 = $settings['venue_high_img1'] ?? 'images/mcc_main.jpg'; @endphp
        <img src="{{ str_starts_with($img1, 'http') ? $img1 : asset($img1) }}" alt="Venue Image 1" style="object-fit: cover;">

        <!-- Stacked Column (Middle) -->
        <div class="venue-stack">
            @php $img2 = $settings['venue_high_img2'] ?? 'images/mcc4.jpg'; @endphp
            <img src="{{ str_starts_with($img2, 'http') ? $img2 : asset($img2) }}" alt="Venue Image 2" style="object-fit: cover;">

            @php $img3 = $settings['venue_high_img3'] ?? 'images/mcc_images.jpg'; @endphp
            <img src="{{ str_starts_with($img3, 'http') ? $img3 : asset($img3) }}" alt="Venue Image 3" style="object-fit: cover;">
        </div>

        <!-- Map Column (Right) -->
        <div class="venue-map" style="position: relative; border-radius: 8px; overflow: hidden; min-height: 300px;">
            @php $mapUrl = $settings['venue_high_map'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.756314815256!2d80.12157431482143!3d12.92336669088665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f1719b49b39%3A0xcb1b5907406a0a03!2sMadras%20Christian%20College!5e0!3m2!1sen!2sin!4v1717409254320!5m2!1sen!2sin'; @endphp
            <iframe src="{{ $mapUrl }}" width="100%" height="100%" style="border:0; position: absolute; top: 0; left: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            @php $trackingUrl = $settings['venue_high_live_tracking'] ?? 'https://maps.google.com/?q=Madras+Christian+College'; @endphp
            @if($trackingUrl)
            <a href="{{ $trackingUrl }}" target="_blank" style="position: absolute; top: 15px; left: 15px; background: white; color: #1a73e8; padding: 8px 12px; font-weight: 500; font-size: 0.85rem; text-decoration: none; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 6px; z-index: 10;">
                Location / Live Tracking <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.75rem;"></i>
            </a>
            @endif
        </div>
    </div>

    {{-- Mobile Layout (2 images + map stacked) --}}
    <div class="venue-mobile">
        <!-- 2 Images Side by Side -->
        <div class="venue-mobile-images">
            @php $img1 = $settings['venue_high_img1'] ?? 'images/mcc_main.jpg'; @endphp
            <img src="{{ str_starts_with($img1, 'http') ? $img1 : asset($img1) }}" alt="Venue Image 1">

            @php $img2 = $settings['venue_high_img2'] ?? 'images/mcc4.jpg'; @endphp
            <img src="{{ str_starts_with($img2, 'http') ? $img2 : asset($img2) }}" alt="Venue Image 2">
        </div>

        <!-- Full Width Map -->
        <div style="position: relative; border-radius: 10px; overflow: hidden; height: 220px; margin-top: 12px;">
            @php $mapUrl = $settings['venue_high_map'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.756314815256!2d80.12157431482143!3d12.92336669088665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f1719b49b39%3A0xcb1b5907406a0a03!2sMadras%20Christian%20College!5e0!3m2!1sen!2sin!4v1717409254320!5m2!1sen!2sin'; @endphp
            <iframe src="{{ $mapUrl }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            @php $trackingUrl = $settings['venue_high_live_tracking'] ?? 'https://maps.google.com/?q=Madras+Christian+College'; @endphp
            @if($trackingUrl)
            <a href="{{ $trackingUrl }}" target="_blank" style="position: absolute; top: 12px; left: 12px; background: white; color: #1a73e8; padding: 7px 10px; font-weight: 500; font-size: 0.8rem; text-decoration: none; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 5px; z-index: 10;">
                Location / Live Tracking <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.7rem;"></i>
            </a>
            @endif
        </div>
    </div>
</section>
