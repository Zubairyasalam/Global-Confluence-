@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_schedule_title')->value('value') ?? 'PROGRAMME SCHEDULE';
    $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_schedule_image')->value('value');
@endphp

<!-- Page Banner -->
<div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
    <div class="page-banner-content">
        <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
    </div>
</div>

@include('sections.schedule')

@include('sections.footer')

@endsection
