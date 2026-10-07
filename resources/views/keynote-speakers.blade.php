@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_keynote_speakers_title')->value('value') ?? 'KEYNOTE SPEAKERS';
    $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_keynote_speakers_image')->value('value');
    $sectionHeading = \App\Models\SiteSetting::where('group', 'speakers')->where('key', 'keynote_section_heading')->value('value') ?? 'KEYNOTE SPEAKERS';
    $sectionSubtitle = \App\Models\SiteSetting::where('group', 'speakers')->where('key', 'keynote_section_subtitle')->value('value') ?? 'The Minds Behind the Momentum';
@endphp

<!-- Page Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0a192f 0%, #0f172a 50%, #112240 100%); padding: 65px 20px 60px; text-align: center; color: #fff; position: relative;">
    <div class="page-banner-content" style="max-width: 900px; margin: 0 auto; position: relative; z-index: 5;">
        <h1 style="text-transform: uppercase; font-size: 2.3rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff !important; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">
            {{ $bannerTitle }}
        </h1>
    </div>
</div>

<style>
    .keynote-page-container {
        padding: 60px 20px 90px;
        max-width: 1100px;
        margin: 0 auto;
        font-family: 'Poppins', 'Inter', system-ui, sans-serif;
    }

    .keynote-header-block {
        text-align: center;
        margin-bottom: 45px;
    }

    .keynote-header-title {
        font-size: clamp(2rem, 3.5vw, 2.5rem);
        font-weight: 900;
        color: #0a192f;
        margin: 0 0 10px 0;
        text-transform: uppercase;
        letter-spacing: -0.5px;
    }

    .keynote-header-title span {
        color: #00A896;
    }

    .keynote-header-bar {
        width: 60px;
        height: 3.5px;
        background: #00A896;
        margin: 0 auto 12px auto;
        border-radius: 2px;
    }

    .keynote-header-subtitle {
        font-size: 1.05rem;
        color: #64748b;
        margin: 0;
        font-weight: 500;
    }

    .keynote-speakers-flex {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 60px;
        flex-wrap: wrap;
        margin-top: 40px;
    }

    .keynote-speaker-card {
        text-align: center;
        max-width: 440px;
        flex: 1 1 360px;
        transition: transform 0.3s ease;
    }

    .keynote-speaker-card:hover {
        transform: translateY(-4px);
    }

    .keynote-avatar-wrapper {
        width: 290px;
        height: 290px;
        margin: 0 auto 22px auto;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(15, 23, 42, 0.14);
        border: 4px solid #ffffff;
        background: #f1f5f9;
    }

    .keynote-avatar-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        display: block;
    }

    .keynote-speaker-name {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0a192f;
        margin: 0 0 8px 0;
        letter-spacing: -0.3px;
    }

    .keynote-speaker-role {
        font-size: 1.02rem;
        color: #475569;
        font-weight: 400;
        margin: 0 0 6px 0;
        line-height: 1.5;
    }

    .keynote-speaker-org {
        font-size: 1rem;
        color: #1e293b;
        font-weight: 600;
        margin: 0;
        line-height: 1.5;
    }
</style>

<section class="keynote-page-container">
    
    <!-- Title Block matching Screenshot Design -->
    <div class="keynote-header-block">
        <h2 class="keynote-header-title">
            @if(str_contains(strtoupper($sectionHeading), 'SPEAKERS'))
                {!! preg_replace('/(SPEAKERS)/i', '<span>$1</span>', e($sectionHeading)) !!}
            @else
                KEYNOTE <span>SPEAKERS</span>
            @endif
        </h2>
        <div class="keynote-header-bar"></div>
        <p class="keynote-header-subtitle">{{ $sectionSubtitle }}</p>
    </div>

    <!-- Keynote Speakers Grid matching Screenshot Design -->
    <div class="keynote-speakers-flex">
        @forelse($speakers as $speaker)
            <div class="keynote-speaker-card">
                <div class="keynote-avatar-wrapper">
                    <img src="{{ asset($speaker->image_path ?? 'images/avatar.png') }}" alt="{{ $speaker->name }}" loading="lazy">
                </div>
                
                <h3 class="keynote-speaker-name">
                    {{ $speaker->name }}
                </h3>
                
                @if($speaker->title)
                    <p class="keynote-speaker-role">
                        {!! nl2br(e($speaker->title)) !!}
                    </p>
                @endif
                
                @if(($speaker->university && $speaker->university !== '-') || ($speaker->country && $speaker->country !== '-'))
                    <p class="keynote-speaker-org">
                        @if($speaker->university && $speaker->university !== '-')
                            {{ $speaker->university }},
                        @endif
                        @if($speaker->country && $speaker->country !== '-')
                            <br>{{ $speaker->country }}
                        @endif
                    </p>
                @endif
            </div>
        @empty
            <div style="text-align: center; color: #64748b; font-style: italic; width: 100%; padding: 40px;">
                Keynote speakers will be announced soon.
            </div>
        @endforelse
    </div>

</section>

@include('sections.footer')

@endsection
