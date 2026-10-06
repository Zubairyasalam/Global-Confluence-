@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $posterSettings = \App\Models\SiteSetting::where('group', 'poster_presentation')->pluck('value', 'key')->toArray();
@endphp

<!-- Page Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 65px 20px; text-align: center; color: #fff; position: relative;">
    <div class="page-banner-content">
        <h1 style="text-transform: uppercase; font-size: 2.4rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">{{ $posterSettings['poster_banner_title'] ?? 'POSTER PRESENTATION' }}</h1>
    </div>
</div>

<style>
    .event-page-container {
        padding: 60px 20px;
        max-width: 1100px;
        margin: 0 auto;
        font-family: 'Poppins', 'Inter', system-ui, sans-serif;
        color: #334155;
    }
    .event-page-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        padding: 45px;
    }
    .spec-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }
    .spec-card {
        background: #f8fafc;
        border-left: 4px solid #00A896;
        border-radius: 12px;
        padding: 20px;
    }
    .spec-card h4 {
        color: #0f172a;
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .spec-card p {
        font-size: 0.95rem;
        color: #475569;
        margin: 0;
        line-height: 1.6;
    }
    .guideline-list {
        list-style: none;
        padding: 0;
        margin: 25px 0;
    }
    .guideline-list li {
        position: relative;
        padding-left: 32px;
        margin-bottom: 16px;
        font-size: 1.02rem;
        line-height: 1.7;
        color: #334155;
    }
    .guideline-list li i {
        position: absolute;
        left: 0;
        top: 4px;
        color: #00A896;
        font-size: 1.1rem;
    }
    .highlight-badge {
        display: inline-block;
        background: #e0f2fe;
        color: #0369a1;
        padding: 4px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 700;
        margin-right: 8px;
    }
</style>

<div class="event-page-container">
    <div class="event-page-card">
        <h2 style="font-size: 1.9rem; font-weight: 800; color: #0f172a; margin-bottom: 15px; border-bottom: 3px solid #00A896; padding-bottom: 12px; display: inline-block;">
            {{ $posterSettings['poster_section_title'] ?? 'Poster Presentation Guidelines & Details' }}
        </h2>

        <p style="font-size: 1.08rem; line-height: 1.8; color: #334155; margin-top: 20px; background: #f0fdf4; padding: 22px 28px; border-radius: 12px; border-left: 4px solid #10b981;">
            {{ $posterSettings['poster_main_content'] ?? 'Posters should be prepared in portrait orientation (A0 size, 841 × 1189 mm, unless the organisers specify otherwise) and displayed for the full poster session, with the presenter standing beside it during the assigned time to discuss the work with attendees. The poster should include the title, authors, affiliations, and a conflict-of-interest disclosure at the top, followed by a clear flow of Background, Methods, Results, Conclusions, and References, using concise text, a readable font (title 80 pt or larger, body text at least 24 pt), and clear graphs, tables, and images instead of long paragraphs. For Track 1 (Medical Practitioners). For Track 6 (Industry). Presenters should bring a printed poster, mount it before the session begins, and be ready to give a 2-3 minute summary to visitors.' }}
        </p>

        <!-- Quick Specs Cards -->
        <div class="spec-grid">
            <div class="spec-card">
                <h4><i class="fa-solid fa-ruler-combined" style="color: #00A896;"></i> {{ $posterSettings['poster_dim_title'] ?? 'Dimensions & Layout' }}</h4>
                <p>{{ $posterSettings['poster_dim_desc'] ?? 'Portrait orientation — A0 Size (841 × 1189 mm) unless specified otherwise.' }}</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-text-height" style="color: #00A896;"></i> {{ $posterSettings['poster_font_title'] ?? 'Font Specifications' }}</h4>
                <p>{{ $posterSettings['poster_font_desc'] ?? 'Title: 80 pt or larger | Body Text: At least 24 pt (Concise & Readable)' }}</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-stopwatch" style="color: #00A896;"></i> {{ $posterSettings['poster_summary_title'] ?? 'Verbal Summary' }}</h4>
                <p>{{ $posterSettings['poster_summary_desc'] ?? 'Presenters should be ready to give a 2–3 minute summary to visitors and judges.' }}</p>
            </div>
        </div>

        @php
            $posterItems = !empty($posterSettings['poster_guidelines_json']) ? json_decode($posterSettings['poster_guidelines_json'], true) : null;
        @endphp

        <h3 style="font-size: 1.35rem; font-weight: 700; color: #0f172a; margin-top: 35px; margin-bottom: 15px;">
            Key Presentation Instructions:
        </h3>

        <ul class="guideline-list">
            @if(!empty($posterItems) && is_array($posterItems))
                @foreach($posterItems as $item)
                    <li><i class="fa-solid fa-circle-check"></i> {!! $item !!}</li>
                @endforeach
            @else
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Top Section:</strong> Include Title, Authors, Affiliations, and Conflict-of-Interest disclosure at the top of the poster.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Content Structure:</strong> Ensure a clear flow of Background, Methods, Results, Conclusions, and References.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Visual Elements:</strong> Use clear graphs, tables, and high-resolution images instead of long paragraphs.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>Applicable Tracks:</strong> Dedicated guidelines for <span class="highlight-badge">Track 1 (Medical Practitioners)</span> and <span class="highlight-badge">Track 6 (Industry)</span>.
                </li>
                <li>
                    <i class="fa-solid fa-circle-check"></i>
                    <strong>On-Site Requirement:</strong> Presenters must bring a printed poster, mount it before the session begins, and remain beside it during the assigned time.
                </li>
            @endif
        </ul>
    </div>
</div>

@include('sections.footer')

@endsection
