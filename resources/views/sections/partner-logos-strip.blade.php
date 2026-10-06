<!-- Partner & Accreditation Logos Strip (Below Hero) -->
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
<section class="partner-logos-strip-section" style="background: #ffffff; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0; box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04); position: relative; z-index: 10; padding: 18px 0;">
    <div class="container" style="max-width: 1350px; margin: 0 auto; padding: 0 20px;">
        @if(!empty($stripTitle))
            <div style="text-align: center; margin-bottom: 12px;">
                <span style="font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: #e6f7f5; padding: 4px 14px; border-radius: 50px; display: inline-block;">
                    {{ $stripTitle }}
                </span>
            </div>
        @endif

        <div class="partner-logos-grid" style="display: flex; align-items: center; justify-content: center; gap: 0; flex-wrap: wrap;">
            @foreach($partnerLogos as $index => $logo)
                <div class="partner-logo-item" style="flex: 1 1 180px; min-width: 160px; max-width: 240px; height: 90px; display: flex; align-items: center; justify-content: center; padding: 12px 20px; position: relative;">
                    @if($index > 0)
                        <div class="partner-logo-divider" style="position: absolute; left: 0; top: 20%; height: 60%; width: 1px; background: #e2e8f0;"></div>
                    @endif
                    <a href="{{ $logo->link_url ?: '#' }}" {{ $logo->link_url && $logo->link_url !== '#' && $logo->link_url !== '/' ? 'target="_blank"' : '' }} title="{{ $logo->name }}" style="display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; text-decoration: none; transition: transform 0.25s ease, filter 0.25s ease;">
                        <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->name }}" class="partner-logo-img" style="max-height: 65px; max-width: 100%; width: auto; height: auto; object-fit: contain; transition: transform 0.25s ease, filter 0.25s ease;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .partner-logo-item a:hover .partner-logo-img {
        transform: scale(1.08);
        filter: drop-shadow(0 6px 12px rgba(0, 0, 0, 0.12));
    }
    @media (max-width: 768px) {
        .partner-logos-grid {
            gap: 15px !important;
        }
        .partner-logo-divider {
            display: none !important;
        }
        .partner-logo-item {
            flex: 1 1 130px !important;
            min-width: 120px !important;
            height: 75px !important;
            padding: 8px 12px !important;
            background: #f8fafc;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }
        .partner-logo-img {
            max-height: 50px !important;
        }
    }
</style>
@endif
