@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $bannerTitle = $settings['banner_publications_title'] ?? ($settings['banner_guidelines_title'] ?? 'PUBLICATIONS');
    $pubTag = $settings['pub_tag'] ?? 'SCIENTIFIC PUBLICATIONS';
    $pubTitle = $settings['pub_title'] ?? 'Scientific Publications';
    $pubNote = $settings['pub_note'] ?? 'Journal list will be updated soon';
    $pubAnnounceTitle = $settings['pub_announce_title'] ?? 'ANNOUNCEMENT';

    $hasCustomPubItems = false;
    $customPubItems = [];
    for ($i = 1; $i <= 20; $i++) {
        if (!empty($settings['pub_item_' . $i])) {
            $customPubItems[] = $settings['pub_item_' . $i];
            $hasCustomPubItems = true;
        }
    }

    $defaultPubItems = [
        'All the Presentation will be published as a conference proceedings in ISBN indexed book',
        'Quality presentation will be peer reviewed and considered for further publication in selected Scopus/ WoS indexed journals'
    ];

    $displayItems = $hasCustomPubItems ? $customPubItems : $defaultPubItems;
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
    .publications-page-wrap {
        background: #f8fafc;
        padding: 50px 20px 80px;
        min-height: 450px;
        font-family: 'Poppins', 'Inter', system-ui, sans-serif;
    }

    .publications-container {
        max-width: 950px;
        margin: 0 auto;
    }

    .pub-main-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        border-top: 4px solid #00A896;
        border-bottom: 4px solid #00A896;
        padding: 45px 40px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pub-main-card:hover {
        box-shadow: 0 15px 40px rgba(0, 168, 150, 0.1);
    }

    .pub-badge-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #e6f7f5;
        color: #00A896;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 18px;
    }

    .pub-card-title {
        font-size: 1.7rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 26px 0;
        letter-spacing: -0.3px;
    }

    .pub-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin-bottom: 30px;
    }

    .pub-item {
        display: flex;
        align-items: flex-start;
        gap: 14px;
    }

    .pub-check-icon {
        color: #00A896;
        font-size: 1.3rem;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .pub-item-text {
        font-size: 1.02rem;
        color: #334155;
        line-height: 1.65;
        font-weight: 500;
    }

    /* Announcement Box matching screenshot */
    .pub-announcement-box {
        background: #f0fdfa;
        border: 1.5px dashed #00A896;
        border-radius: 12px;
        padding: 16px 22px;
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 10px;
    }

    .pub-bell-circle {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: #00A896;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 1.15rem;
        box-shadow: 0 4px 10px rgba(0, 168, 150, 0.25);
    }

    .pub-announce-heading {
        margin: 0 0 2px 0;
        color: #00A896;
        font-weight: 800;
        font-size: 0.88rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .pub-announce-text {
        margin: 0;
        color: #334155;
        font-size: 0.95rem;
        font-weight: 500;
    }
</style>

<div class="publications-page-wrap">
    <div class="publications-container">

        <!-- Scientific Publications Card -->
        <div class="pub-main-card">
            
            @if(!empty($pubTag))
                <div class="pub-badge-tag">
                    <i class="fa-solid fa-book-open"></i> {{ $pubTag }}
                </div>
            @endif

            <h2 class="pub-card-title">
                {{ $pubTitle }}
            </h2>

            <!-- Bullet Points List -->
            <div class="pub-list">
                @foreach($displayItems as $item)
                    <div class="pub-item">
                        <i class="fa-solid fa-circle-check pub-check-icon"></i>
                        <div class="pub-item-text">
                            {!! $item !!}
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Announcement Notice Box -->
            @if(!empty($pubNote))
                <div class="pub-announcement-box">
                    <div class="pub-bell-circle">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <div>
                        <h5 class="pub-announce-heading">{{ $pubAnnounceTitle }}</h5>
                        <p class="pub-announce-text">{{ $pubNote }}</p>
                    </div>
                </div>
            @endif

        </div>

    </div>
</div>

@include('sections.footer')

@endsection