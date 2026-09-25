@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_distinguished_speakers_title')->value('value') ?? 'DISTINGUISHED SPEAKERS';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_distinguished_speakers_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

<style>
    .distinguished-page-container {
        padding: 70px 20px;
        max-width: 1140px;
        margin: 0 auto;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .distinguished-header-block {
        text-align: center;
        margin-bottom: 50px;
    }

    .distinguished-header-title {
        font-size: clamp(2rem, 4vw, 2.7rem);
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 12px 0;
        text-transform: uppercase;
        letter-spacing: -0.5px;
    }

    .distinguished-header-title span {
        color: #009688;
    }

    .distinguished-header-bar {
        width: 70px;
        height: 4px;
        background: #84cc16;
        margin: 0 auto 16px auto;
        border-radius: 2px;
    }

    .distinguished-header-subtitle {
        font-size: 1.1rem;
        color: #64748b;
        margin: 0;
        font-weight: 500;
    }

    .distinguished-speaker-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        gap: 30px;
        justify-content: center;
    }

    @media (max-width: 650px) {
        .distinguished-speaker-grid {
            grid-template-columns: 1fr;
        }
    }

    .speaker-card-plenary-style {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        padding: 30px;
        display: flex;
        gap: 25px;
        align-items: flex-start;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .speaker-card-plenary-style:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
        border-color: #cbd5e1;
    }

    @media (max-width: 580px) {
        .speaker-card-plenary-style {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
    }

    .speaker-photo-frame {
        width: 140px;
        height: 140px;
        flex-shrink: 0;
        border-radius: 14px;
        overflow: hidden;
        background: #f1f5f9;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        border: 1px solid #e2e8f0;
    }

    .speaker-photo-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .speaker-details-frame {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .speaker-name-title {
        font-size: 1.35rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 6px 0;
        line-height: 1.3;
    }

    .speaker-role-text {
        font-size: 0.92rem;
        color: #475569;
        font-weight: 600;
        line-height: 1.4;
        margin-bottom: 4px;
    }

    .speaker-affiliation-text {
        font-size: 0.86rem;
        color: #64748b;
        line-height: 1.4;
        margin-bottom: 12px;
    }

    .speaker-dotted-divider {
        border-top: 1px dotted #cbd5e1;
        margin: 12px 0 14px 0;
    }

    .speaker-field-block {
        margin-bottom: 10px;
    }

    .speaker-field-label {
        font-size: 0.75rem;
        font-weight: 800;
        color: #009688;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        display: block;
        margin-bottom: 2px;
    }

    .speaker-field-value {
        font-size: 0.88rem;
        color: #1e293b;
        font-weight: 600;
        margin: 0;
    }

    .btn-view-profile {
        margin-top: 14px;
        align-self: flex-start;
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        color: #009688;
        padding: 7px 18px;
        border-radius: 6px;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-view-profile:hover {
        background: #009688;
        color: #ffffff;
        border-color: #009688;
    }
</style>

<section class="distinguished-page-container">
    
    <!-- Title Block matching Image 1 Design -->
    <div class="distinguished-header-block">
        <h2 class="distinguished-header-title">
            Distinguished <span>Speakers</span>
        </h2>
        <div class="distinguished-header-bar"></div>
        <p class="distinguished-header-subtitle">Global Thought Leaders & Research Pioneers</p>
    </div>

    <!-- Speaker Grid matching new design -->
    <div class="distinguished-speaker-grid-new" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; align-items: start; margin-top: 50px;">
        
        @foreach($speakers as $speaker)
        <div style="text-align: center; flex: 0 1 320px; max-width: 320px;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset($speaker->image_path ?? 'images/avatar.png') }}" alt="{{ $speaker->name }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">{!! nl2br(e($speaker->name)) !!}</h3>
            @if($speaker->title)
            <p style="font-size: 1rem; color: #334155; margin: 0 0 5px 0; line-height: 1.5;">{!! nl2br(e($speaker->title)) !!}</p>
            @endif
            @if(($speaker->university && $speaker->university !== '-') || ($speaker->country && $speaker->country !== '-'))
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">
                {{ $speaker->university && $speaker->university !== '-' ? $speaker->university : '' }}{{ ($speaker->university && $speaker->university !== '-') && ($speaker->country && $speaker->country !== '-') ? ',' : '' }}
                {{ $speaker->country && $speaker->country !== '-' ? $speaker->country : '' }}
            </p>
            @endif
        </div>
        @endforeach

        @if($speakers->isEmpty())
        <div style="text-align: center; color: #64748b; font-style: italic; width: 100%;">
            Distinguished speakers will be announced soon.
        </div>
        @endif
    </div>
</section>

@include('sections.footer')

@endsection
