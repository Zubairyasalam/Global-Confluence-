@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = 'OUR SPEAKERS';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_plenary_speakers_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase; font-weight: 900; letter-spacing: 1px;">{{ $bannerTitle }}</h1>
            <p style="color: rgba(255,255,255,0.85); font-size: 1.1rem; margin-top: 8px;">Global One Health Confluence 2026</p>
        </div>
    </div>

    <!-- Speakers Content -->
    <div style="padding: 40px 0; background: #ffffff;">
        @include('sections.keynote')
        @include('sections.distinguished')
    </div>

@include('sections.footer')

@endsection
