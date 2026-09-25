@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_sponsors_title')->value('value') ?? 'BECOME A SPONSOR';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_sponsors_image')->value('value');
        $sponsorsIntro = \App\Models\SiteSetting::where('group', 'sponsors')->where('key', 'sponsors_intro')->value('value');
        $sponsorsBenefitsRaw = \App\Models\SiteSetting::where('group', 'sponsors')->where('key', 'sponsors_benefits')->value('value');
        $sponsorsBenefits = $sponsorsBenefitsRaw ? array_filter(array_map('trim', explode("\n", $sponsorsBenefitsRaw))) : [];
        $tiers = \App\Models\SponsorPackage::where('type', 'tier')->orderBy('sort_order')->get();
        $additional = \App\Models\SponsorPackage::where('type', 'additional')->orderBy('sort_order')->get();
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

<style>
    .sponsors-container {
        padding: 60px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .sponsors-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 50px;
        align-items: flex-start;
    }

    @media (max-width: 900px) {
        .sponsors-grid {
            grid-template-columns: 1fr;
        }
    }

    .sponsors-left {
        font-family: Arial, sans-serif;
        color: #444;
        line-height: 1.6;
    }

    .sponsors-left p {
        margin-bottom: 25px;
        text-align: justify;
    }

    .benefits-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 15px;
    }

    .benefits-list {
        list-style: none;
        padding: 0;
        margin-bottom: 40px;
    }

    .benefits-list li {
        margin-bottom: 8px;
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 0.95rem;
    }

    .benefits-list span.check {
        color: #222;
        font-weight: bold;
        font-size: 1rem;
    }

    .registration-form-container {
        background: transparent;
    }
    
    .registration-form-title {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 700;
        color: #222;
        margin-bottom: 25px;
    }

    .s-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .s-form-grid {
            grid-template-columns: 1fr;
        }
        .pricing-tier {
            flex-direction: column;
            align-items: flex-start !important;
            gap: 10px;
            padding: 20px 0;
            position: relative;
        }
        .tier-ribbon-container {
            margin-bottom: 10px;
        }
        .tier-price {
            align-self: flex-start;
            padding-right: 0;
            margin-top: 5px;
        }
        .additional-grid {
            grid-template-columns: 1fr;
            gap: 5px;
        }
        .additional-grid span:nth-child(even) {
            text-align: left;
            margin-bottom: 15px;
        }
    }

    .s-form-input {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 0.9rem;
        outline: none;
    }
    
    .s-form-input:focus {
        border-color: var(--teal-accent);
    }

    .terms-check {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.8rem;
        color: #666;
        text-align: center;
        justify-content: center;
        margin: 20px 0;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .btn-reset {
        background: #dc3545;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
    }

    .btn-pay {
        background: var(--teal-accent);
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: 600;
    }

    .pricing-board {
        background: #111827; /* Dark slate */
        border-radius: 4px;
        padding: 20px;
        color: #fff;
        display: flex;
        flex-direction: column;
    }

    .pricing-tier {
        display: flex;
        align-items: center;
        gap: 20px;
        min-height: 90px;
        border-bottom: 1px solid rgba(255,255,255,0.1);
        padding: 20px 0;
        margin-left: 10px;
    }
    
    .pricing-tier:last-child {
        border-bottom: none;
    }

    .tier-ribbon-container {
        position: relative;
        margin-left: -35px; /* Pull ribbon left out of the container */
        width: 140px;
        height: 55px;
        flex-shrink: 0;
        z-index: 1;
    }
    
    .tier-ribbon-container::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 0;
        height: 0;
        border-top: 8px solid rgba(0,0,0,0.6);
        border-left: 8px solid transparent;
        z-index: -1;
    }

    .tier-ribbon {
        width: 100%;
        height: 100%;
        clip-path: polygon(0 0, 85% 0, 100% 50%, 85% 100%, 0 100%);
        display: flex;
        align-items: center;
        padding-left: 20px;
        font-weight: 600;
        font-size: 1.1rem;
        color: #fff;
    }

    .tier-details {
        flex-grow: 1;
        font-size: 0.75rem;
        line-height: 1.6;
        color: #d1d5db;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    
    .tier-details div {
        margin-bottom: 3px;
    }

    .tier-price {
        font-size: 1.4rem;
        font-weight: bold;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        min-width: 90px;
        padding-right: 10px;
    }

    /* Ribbon Colors matching image */
    .bg-platinum { background: #358f4a; }
    .bg-gold { background: #1397c7; }
    .bg-silver { background: #d4a017; }
    .bg-bronze { background: #c67c22; }
    .bg-exhibitor { background: #4b2e83; }

    .additional-grid {
        display: grid;
        grid-template-columns: 1fr auto;
        column-gap: 15px;
        row-gap: 6px;
        font-size: 0.75rem;
        width: 100%;
        color: #d1d5db;
    }
    .additional-grid span:nth-child(even) {
        font-weight: bold;
        color: #fff;
        text-align: right;
    }
</style>

<section class="sponsors-container">
    <div style="text-align: center; margin-bottom: 50px;">
        <h2 style="font-size: 2.2rem; font-weight: 600; color: #333; margin-bottom: 15px;">Why Partners With Us As A Sponsor Or Exhibitor?</h2>
        <div style="width: 150px; height: 2px; background: #0000FF; margin: 0 auto;"></div>
    </div>

    <div class="sponsors-grid">
        <!-- Left Column: Content & Form -->
        <div class="sponsors-left">
            <p>
                {!! nl2br(e($sponsorsIntro)) !!}
            </p>

            <h3 class="benefits-title">Key Benefits Of Sponsoring Or Exhibiting:</h3>
            <ul class="benefits-list">
                @foreach($sponsorsBenefits as $benefit)
                    <li><span class="check">&#10003;</span> {{ $benefit }}</li>
                @endforeach
            </ul>

            <div class="registration-form-container">
                <h3 class="registration-form-title">Sponsorship Registration</h3>
                <form>
                    <div class="s-form-grid">
                        <select class="s-form-input">
                            <option>Select Title</option>
                            <option>Dr.</option>
                            <option>Prof.</option>
                            <option>Mr.</option>
                            <option>Ms.</option>
                        </select>
                        <input type="text" class="s-form-input" placeholder="Enter your name">
                        
                        <input type="text" class="s-form-input" placeholder="Organization/Institution">
                        <input type="email" class="s-form-input" placeholder="Enter your email">
                        
                        <input type="text" class="s-form-input" placeholder="Enter your phone number">
                        <input type="text" class="s-form-input" placeholder="Enter your city name">
                        
                        <input type="text" class="s-form-input" placeholder="Enter your Country">
                        <input type="text" class="s-form-input" placeholder="Enter your Postal Code">
                        
                        <select class="s-form-input">
                            <option>Select Sponsorship Type</option>
                            <option>Platinum</option>
                            <option>Gold</option>
                            <option>Silver</option>
                            <option>Bronze</option>
                            <option>Exhibitor</option>
                        </select>
                        <div style="background: #f8f9fa; border: 1px solid #ddd; border-radius: 4px;"></div>
                    </div>
                    
                    <div style="margin-bottom: 20px;">
                        <input type="file" style="font-size: 0.9rem;">
                    </div>

                    <div class="terms-check">
                        <input type="checkbox" id="agree-terms">
                        <label for="agree-terms">By clicking "pay", you agree to the Privacy Policy, Terms & Conditions and Cancellation Policy</label>
                    </div>

                    <div class="btn-group">
                        <button type="reset" class="btn-reset">Reset</button>
                        <button type="submit" class="btn-pay">Proceed to Pay</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column: Pricing Board -->
        <div class="pricing-board">
            
            @foreach($tiers as $tier)
            <div class="pricing-tier">
                <div class="tier-ribbon-container">
                    <div class="tier-ribbon {{ $tier->ribbon_color }}">{{ strtoupper($tier->name) }}</div>
                </div>
                <div class="tier-details">
                    @if($tier->features)
                        @foreach($tier->features as $feature)
                            <div>{{ $feature }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="tier-price">{{ $tier->price }}</div>
            </div>
            @endforeach

            <div class="pricing-tier" style="border-bottom: none;">
                <div class="tier-ribbon-container">
                    <div class="tier-ribbon bg-exhibitor" style="font-size: 0.9rem; flex-direction: column; justify-content: center; align-items: flex-start; line-height: 1.2; padding-left: 15px;">ADDITIONAL<br>OPPORTUNITIES</div>
                </div>
                <div class="tier-details" style="flex-grow: 1;">
                    <div class="additional-grid">
                        @foreach($additional as $opp)
                            <span>{{ $opp->name }}</span><span>{{ $opp->price }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@include('sections.footer')

@endsection
