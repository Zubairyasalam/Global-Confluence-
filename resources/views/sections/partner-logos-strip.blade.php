<!-- Partner & Accreditation Logos Strip (Below Hero) - Infinite Moving Marquee -->
@php
    $stripShow = \App\Models\SiteSetting::where('key', 'partner_strip_show')->value('value') ?? '1';
    $stripTitle = \App\Models\SiteSetting::where('key', 'partner_strip_title')->value('value');
    
    $partnerLogos = collect();
    try {
        if (\Illuminate\Support\Facades\Schema::hasTable('partner_logos')) {
            $partnerLogos = \App\Models\PartnerLogo::where('is_active', true)->orderBy('sort_order')->get();
        }
    } catch (\Throwable $e) {
        $partnerLogos = collect();
    }
@endphp

@if($stripShow == '1' && $partnerLogos->count() > 0)
<section class="partner-logos-strip-section">
    @if(!empty($stripTitle))
        <div style="text-align: center; padding-top: 15px; margin-bottom: 5px;">
            <span class="partner-strip-badge">
                {{ $stripTitle }}
            </span>
        </div>
    @endif

    <div class="partner-marquee-wrapper">
        <div class="partner-marquee-track">
            <!-- First Set -->
            @foreach($partnerLogos as $logo)
                <div class="partner-logo-card">
                    <a href="{{ $logo->link_url ?: '#' }}" {{ $logo->link_url && $logo->link_url !== '#' && $logo->link_url !== '/' ? 'target="_blank"' : '' }} title="{{ $logo->name }}">
                        <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->name }}" class="partner-logo-img">
                    </a>
                </div>
            @endforeach

            <!-- Duplicate Set 1 for Infinite Loop -->
            @foreach($partnerLogos as $logo)
                <div class="partner-logo-card">
                    <a href="{{ $logo->link_url ?: '#' }}" {{ $logo->link_url && $logo->link_url !== '#' && $logo->link_url !== '/' ? 'target="_blank"' : '' }} title="{{ $logo->name }}">
                        <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->name }}" class="partner-logo-img">
                    </a>
                </div>
            @endforeach

            <!-- Duplicate Set 2 for Wide Displays -->
            @foreach($partnerLogos as $logo)
                <div class="partner-logo-card">
                    <a href="{{ $logo->link_url ?: '#' }}" {{ $logo->link_url && $logo->link_url !== '#' && $logo->link_url !== '/' ? 'target="_blank"' : '' }} title="{{ $logo->name }}">
                        <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->name }}" class="partner-logo-img">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .partner-logos-strip-section {
        background: #ffffff;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
        box-shadow: 0 6px 24px rgba(15, 23, 42, 0.04);
        position: relative;
        z-index: 10;
        padding: 20px 0;
        overflow: hidden;
    }

    .partner-strip-badge {
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #00A896;
        background: #e6f7f5;
        padding: 5px 16px;
        border-radius: 50px;
        display: inline-block;
    }

    .partner-marquee-wrapper {
        width: 100%;
        overflow: hidden;
        position: relative;
        padding: 5px 0;
        mask-image: linear-gradient(to right, transparent, #000 4%, #000 96%, transparent);
        -webkit-mask-image: linear-gradient(to right, transparent, #000 4%, #000 96%, transparent);
    }

    .partner-marquee-track {
        display: flex;
        align-items: center;
        width: max-content;
        gap: 35px;
        animation: partnerMarqueeAnim 28s linear infinite;
    }

    .partner-marquee-wrapper:hover .partner-marquee-track {
        animation-play-state: paused;
    }

    .partner-logo-card {
        flex: 0 0 auto;
        min-width: 220px;
        max-width: 280px;
        height: 110px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 12px 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .partner-logo-card:hover {
        transform: translateY(-4px) scale(1.04);
        box-shadow: 0 12px 25px rgba(0, 168, 150, 0.15);
        border-color: #99f6e4;
    }

    .partner-logo-card a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }

    .partner-logo-img {
        max-height: 90px;
        max-width: 230px;
        width: auto;
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }

    .partner-logo-card:hover .partner-logo-img {
        transform: scale(1.06);
    }

    @keyframes partnerMarqueeAnim {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-100% / 3));
        }
    }

    @media (max-width: 768px) {
        .partner-logos-strip-section {
            padding: 15px 0;
        }
        .partner-logo-card {
            min-width: 170px;
            max-width: 210px;
            height: 90px;
            padding: 10px 18px;
        }
        .partner-logo-img {
            max-height: 70px;
            max-width: 160px;
        }
        .partner-marquee-track {
            gap: 20px;
            animation-duration: 20s;
        }
    }
</style>
@endif
