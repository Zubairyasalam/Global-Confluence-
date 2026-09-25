@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_key_dates_title')->value('value') ?? 'KEY DATES';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_key_dates_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

<style>
    .key-dates-container {
        padding: 60px 20px 80px 20px;
        max-width: 1100px;
        margin: 0 auto;
        font-family: Arial, Helvetica, sans-serif;
        background: #fff;
    }

    .kd-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .kd-header h2 {
        font-size: 2.2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }

    .kd-header p {
        font-size: 1.15rem;
        color: #555;
        margin-top: 20px;
    }

    .kd-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    @media (max-width: 900px) {
        .kd-grid {
            grid-template-columns: 1fr;
        }
    }

    .kd-illustration {
        width: 100%;
        border-radius: 8px;
        overflow: hidden;
    }

    .kd-illustration img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 8px;
    }

    .kd-cards {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .kd-card {
        background: var(--teal-accent, #139a95);
        border-radius: 10px;
        padding: 20px 25px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .kd-card:hover {
        transform: translateY(-3px);
    }

    .kd-icon-circle {
        width: 75px;
        height: 75px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    .kd-icon-circle.yellow-bg {
        background: #fbbd05;
    }

    .kd-icon-circle i {
        font-size: 2rem;
        color: var(--navy-primary, #151c2f);
    }

    .kd-icon-circle.yellow-bg i {
        color: #5d368e; /* Purple-ish bird from image */
    }

    .kd-text {
        color: #fff;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .kd-date {
        font-size: 1.3rem;
        font-weight: 700;
    }

    .kd-label {
        font-size: 0.95rem;
        font-weight: 500;
    }
</style>

<section class="key-dates-container">
    <div class="kd-header">
        <h2>Important Deadlines</h2>
        <div style="width: 100px; height: 2px; background: #0000FF; margin: 0 auto;"></div>
        <p>Key Dates To Mark In Your Calendar</p>
    </div>

    <div class="kd-grid">
        <!-- Left: Illustration -->
        <div class="kd-illustration">
            <!-- Using an Unsplash calendar placeholder since we don't have the custom vector illustration from the screenshot -->
            <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=800&h=600&fit=crop&crop=center" alt="Calendar Schedule">
        </div>

        <!-- Right: Cards -->
        <div class="kd-cards">
            @php
                $icons = ['fa-users', 'fa-file-signature', 'fa-dove', 'fa-bullhorn', 'fa-calendar-check'];
                $colors = ['', '', 'yellow-bg', '', 'yellow-bg'];
            @endphp
            @forelse($deadlines as $index => $deadline)
            <div class="kd-card">
                <div class="kd-icon-circle {{ $colors[$index % count($colors)] }}">
                    <i class="fa-solid {{ $icons[$index % count($icons)] }}"></i>
                </div>
                <div class="kd-text">
                    <div class="kd-date">{{ $deadline->deadline_date ? \Carbon\Carbon::parse($deadline->deadline_date)->format('M d, Y') : 'TBA' }}</div>
                    <div class="kd-label">{{ $deadline->title }}</div>
                </div>
            </div>
            @empty
            <div class="kd-card" style="justify-content: center; background: #eee; box-shadow: none;">
                <div class="kd-text" style="color: #666;">
                    <div class="kd-label">Deadlines to be announced soon.</div>
                </div>
            </div>
            @endforelse        </div>
    </div>
</section>

@include('sections.footer')

@endsection
