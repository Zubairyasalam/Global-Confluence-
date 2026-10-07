@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $bannerTitle = $settings['tracks_banner_title'] ?? 'SCIENTIFIC TRACKS & THRUST AREAS';
    $bannerSubtitle = $settings['tracks_banner_subtitle'] ?? 'Research and innovation at the confluence of human, animal, and environmental health. Discover the multidisciplinary tracks and focus areas shaping this conference.';
@endphp

<!-- Page Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0a192f 0%, #0f172a 50%, #112240 100%); padding: 65px 20px 60px; text-align: center; color: #fff; position: relative;">
    <div class="page-banner-content" style="max-width: 900px; margin: 0 auto; position: relative; z-index: 5;">
        <h1 style="text-transform: uppercase; font-size: 2.2rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff !important; margin: 0 0 12px 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">
            {{ $bannerTitle }}
        </h1>
        @if(!empty($bannerSubtitle))
            <p style="color: #cbd5e1; font-size: 1.05rem; margin: 0; line-height: 1.6; font-weight: 400;">
                {{ $bannerSubtitle }}
            </p>
        @endif
    </div>
</div>

<!-- Content Section -->
<div style="padding: 40px 0;">
    @include('sections.thrust-areas')
</div>

@include('sections.footer')

@endsection
