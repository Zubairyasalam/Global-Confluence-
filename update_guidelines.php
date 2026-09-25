<?php

$file = 'c:\scrach\biomed-app\resources\views\guidelines.blade.php';

$html = <<<'HTML'
@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_guidelines_title')->value('value') ?? 'GUIDELINES';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_guidelines_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

<style>
    .guidelines-page-bg {
        background: #f8fafc;
        padding: 60px 20px;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .guidelines-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .gl-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        margin-bottom: 30px;
        border: 1px solid #e2e8f0;
    }

    /* Top Abstract Card */
    .gl-card-primary {
        border-bottom: 4px solid #009688;
    }

    .gl-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #e6f7f5;
        color: #009688;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 20px;
    }

    .gl-title {
        font-size: 1.6rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 30px 0;
    }

    .gl-grid-abstract {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px 40px;
        margin-bottom: 40px;
    }

    .gl-list-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .gl-icon-check {
        color: #009688;
        font-size: 1.1rem;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .gl-item-text {
        font-size: 0.9rem;
        color: #475569;
        line-height: 1.6;
    }

    .gl-item-text strong {
        color: #1e293b;
        font-weight: 700;
    }

    .gl-btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #009688;
        color: #ffffff;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        transition: background 0.2s, transform 0.2s;
    }

    .gl-btn-submit:hover {
        background: #00796b;
        transform: translateY(-2px);
        color: #ffffff;
    }

    .gl-btn-wrapper {
        text-align: center;
    }

    /* Bottom 2 Cards Grid */
    .gl-split-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }

    @media (max-width: 850px) {
        .gl-split-grid {
            grid-template-columns: 1fr;
        }
    }

    .gl-list-vertical {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .gl-dim-box {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        margin-top: 30px;
    }

    .gl-dim-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.75rem;
        font-weight: 800;
        color: #0f172a;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 6px;
    }

    .gl-dim-value {
        font-size: 0.95rem;
        color: #475569;
        font-weight: 500;
        margin: 0;
    }

</style>

<div class="guidelines-page-bg">
    <div class="guidelines-container">

        <!-- Abstract Submission -->
        <div class="gl-card gl-card-primary">
            <div class="gl-badge">
                <i class="fa-solid fa-star"></i> PRIMARY GUIDELINES
            </div>
            
            <h2 class="gl-title">Abstract Submission</h2>

            <div class="gl-grid-abstract">
                <!-- Item 1 -->
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        Abstracts should be original and highly relevant to the conference themes.
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Word Limit:</strong> Strictly 250-300 words
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Format Structure:</strong> Title, Authors, Affiliation, Background, Objectives, Methods, Results, Conclusion, Keywords
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>File Type:</strong> Submit exclusively in MS Word format (.doc or .docx)
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Registration:</strong> Presenting author must register for the conference.
                    </div>
                </div>
                <!-- Item 6 -->
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Review Process:</strong> All abstracts will undergo a rigorous peer review.
                    </div>
                </div>
            </div>

            <div class="gl-btn-wrapper">
                <a href="{{ route('submit-paper') }}" class="gl-btn-submit">
                    Submit Your Abstract <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Oral & Poster Grid -->
        <div class="gl-split-grid">
            
            <!-- Oral Presentation -->
            <div class="gl-card">
                <h2 class="gl-title">Oral Presentation</h2>
                <div class="gl-list-vertical">
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Format:</strong> PowerPoint Presentation (PPT) format only
                        </div>
                    </div>
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Total Time:</strong> 7 Minutes maximum
                        </div>
                    </div>
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Presentation Window:</strong> 5 Minutes
                        </div>
                    </div>
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Q & A Session:</strong> 2 Minutes allocated for audience questions
                        </div>
                    </div>
                </div>
            </div>

            <!-- Poster Presentation -->
            <div class="gl-card">
                <h2 class="gl-title">Poster Presentation</h2>
                <div class="gl-list-vertical">
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Language:</strong> Posters should be presented in English.
                        </div>
                    </div>
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Design:</strong> Content must be clear, concise and visually appealing.
                        </div>
                    </div>
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Required Elements:</strong> Title, Authors, Affiliation, Introduction, Methods, Results, Conclusion.
                        </div>
                    </div>
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            <strong>Attendance:</strong> Presenters must be present during the poster session.
                        </div>
                    </div>
                </div>

                <div class="gl-dim-box">
                    <div class="gl-dim-label">
                        <i class="fa-solid fa-ruler-combined" style="color: #009688;"></i> POSTER DIMENSIONS
                    </div>
                    <p class="gl-dim-value">90 cm (Width) &times; 120 cm (Height)</p>
                </div>
            </div>

        </div>

    </div>
</div>

@include('sections.footer')

@endsection
HTML;

file_put_contents($file, $html);
echo "Successfully updated guidelines.blade.php\n";
