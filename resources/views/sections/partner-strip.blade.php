<!-- Partner & Accreditation Logos Strip (Below Hero) -->
@php
    $partnerLogos = collect();
    try {
        if (\Illuminate\Support\Facades\Schema::hasTable('partner_logos')) {
            $partnerLogos = \App\Models\PartnerLogo::where('is_active', true)->orderBy('sort_order')->get();
        }
    } catch (\Throwable $e) {
        $partnerLogos = collect();
    }
@endphp

<div class="partner-logos-bar-section" style="background: #ffffff; border-top: 1px solid #e2e8f0; border-bottom: 2px solid #e2e8f0; box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03); position: relative; z-index: 10; width: 100%; overflow: hidden;">
    <div class="partner-logos-container" style="max-width: 1400px; margin: 0 auto; display: flex; align-items: stretch; justify-content: center; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none;">
        @if($partnerLogos->count() > 0)
            @foreach($partnerLogos as $index => $logo)
                <a href="{{ $logo->link_url ?? '#' }}" 
                   target="{{ (!empty($logo->link_url) && $logo->link_url !== '#' && $logo->link_url !== '/') ? '_blank' : '_self' }}"
                   class="partner-logo-cell"
                   title="{{ $logo->name }}"
                   style="flex: 1 1 0; min-width: 140px; max-width: 240px; height: 90px; padding: 12px 24px; display: flex; align-items: center; justify-content: center; text-decoration: none; border-right: 1px solid #e2e8f0; transition: all 0.25s ease; background: #ffffff;">
                    <img src="{{ asset($logo->logo_path) }}" 
                         alt="{{ $logo->name }}" 
                         class="partner-strip-img"
                         style="max-height: 65px; max-width: 100%; width: auto; height: auto; object-fit: contain; filter: grayscale(15%); transition: all 0.3s ease;">
                </a>
            @endforeach
        @else
            <!-- Fallback Default 5 Partner Logos -->
            <div class="partner-logo-cell" style="flex: 1 1 0; min-width: 140px; max-width: 240px; height: 90px; padding: 12px 24px; display: flex; align-items: center; justify-content: center; border-right: 1px solid #e2e8f0;">
                <img src="{{ asset('images/MMC-LOGO-2.jpg') }}" alt="MCC" class="partner-strip-img" style="max-height: 65px; max-width: 100%; object-fit: contain;">
            </div>
            <div class="partner-logo-cell" style="flex: 1 1 0; min-width: 140px; max-width: 240px; height: 90px; padding: 12px 24px; display: flex; align-items: center; justify-content: center; border-right: 1px solid #e2e8f0;">
                <img src="{{ asset('images/nis-logo-transparent.png') }}" alt="NIS" class="partner-strip-img" style="max-height: 65px; max-width: 100%; object-fit: contain;">
            </div>
            <div class="partner-logo-cell" style="flex: 1 1 0; min-width: 140px; max-width: 240px; height: 90px; padding: 12px 24px; display: flex; align-items: center; justify-content: center; border-right: 1px solid #e2e8f0;">
                <img src="{{ asset('images/msmf_logo2.png') }}" alt="MSMF" class="partner-strip-img" style="max-height: 65px; max-width: 100%; object-fit: contain;">
            </div>
            <div class="partner-logo-cell" style="flex: 1 1 0; min-width: 140px; max-width: 240px; height: 90px; padding: 12px 24px; display: flex; align-items: center; justify-content: center; border-right: 1px solid #e2e8f0;">
                <img src="{{ asset('images/microbiologists_society.png') }}" alt="Microbiologists Society" class="partner-strip-img" style="max-height: 65px; max-width: 100%; object-fit: contain;">
            </div>
            <div class="partner-logo-cell" style="flex: 1 1 0; min-width: 140px; max-width: 240px; height: 90px; padding: 12px 24px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset('images/1791201953_ChatGPT_Image_Oct_5__2026__05_34_56_PM.png') }}" alt="MCC-MRF Innovation Park" class="partner-strip-img" style="max-height: 65px; max-width: 100%; object-fit: contain;">
            </div>
        @endif
    </div>
</div>

<style>
    .partner-logos-container::-webkit-scrollbar {
        display: none;
    }
    .partner-logo-cell:last-child {
        border-right: none !important;
    }
    .partner-logo-cell:hover {
        background: #f8fafc !important;
    }
    .partner-logo-cell:hover .partner-strip-img {
        filter: grayscale(0%) !important;
        transform: scale(1.06);
    }
    @media (max-width: 768px) {
        .partner-logos-container {
            justify-content: flex-start !important;
            padding: 0 10px;
        }
        .partner-logo-cell {
            min-width: 120px !important;
            height: 75px !important;
            padding: 8px 15px !important;
        }
        .partner-strip-img {
            max-height: 50px !important;
        }
    }
</style>
