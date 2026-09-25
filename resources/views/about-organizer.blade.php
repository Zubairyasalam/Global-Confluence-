@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_about_organizer_title')->value('value') ?? 'ABOUT ORGANIZER';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_about_organizer_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

<!-- Content Section -->
<section style="padding: 100px 0; text-align: center; background: #fff;">
    <div class="container">
        {!! \App\Models\SiteSetting::where('group', 'about_organizer')->where('key', 'about_organizer_content')->value('value') !!}
    </div>
</section>

@include('sections.footer')

@endsection
