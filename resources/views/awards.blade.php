@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = $settings['banner_awards_title'] ?? $settings['awards_banner_title'] ?? 'CONFERENCE AWARDS';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_awards_image')->value('value');
    @endphp

    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

@include('sections.awards')

@include('sections.footer')

@endsection
