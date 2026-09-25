@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_topics_title')->value('value') ?? 'TOPICS';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_topics_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1>{{ $bannerTitle }}</h1>
        </div>
    </div>

<!-- Content Section -->
<div style="padding: 60px 0;">
    @include('sections.topics', ['hideTitle' => true])
</div>

@include('sections.footer')

@endsection
