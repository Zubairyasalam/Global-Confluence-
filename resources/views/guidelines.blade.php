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
                <i class="fa-solid fa-star"></i> {{ $settings['abstract_tag'] ?? 'PRIMARY GUIDELINES' }}
            </div>
            
            <h2 class="gl-title">{{ $settings['abstract_title'] ?? 'Abstract Submission' }}</h2>

            <div class="gl-grid-abstract">
                @for($i = 1; $i <= 6; $i++)
                    @if(!empty($settings['abstract_item_' . $i]))
                    <div class="gl-list-item">
                        <i class="fa-solid fa-circle-check gl-icon-check"></i>
                        <div class="gl-item-text">
                            {!! $settings['abstract_item_' . $i] !!}
                        </div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>

        <!-- Oral & Poster Grid -->
        <div class="gl-split-grid">
            
            <!-- Oral Presentation -->
            <div class="gl-card">
                <h2 class="gl-title">{{ $settings['oral_title'] ?? 'Oral Presentation' }}</h2>
                <div class="gl-list-vertical">
                    @for($i = 1; $i <= 4; $i++)
                        @if(!empty($settings['oral_item_' . $i]))
                        <div class="gl-list-item">
                            <i class="fa-solid fa-circle-check gl-icon-check"></i>
                            <div class="gl-item-text">
                                {!! $settings['oral_item_' . $i] !!}
                            </div>
                        </div>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- Poster Presentation -->
            <div class="gl-card">
                <h2 class="gl-title">{{ $settings['poster_title'] ?? 'Poster Presentation' }}</h2>
                <div class="gl-list-vertical">
                    @for($i = 1; $i <= 4; $i++)
                        @if(!empty($settings['poster_item_' . $i]))
                        <div class="gl-list-item">
                            <i class="fa-solid fa-circle-check gl-icon-check"></i>
                            <div class="gl-item-text">
                                {!! $settings['poster_item_' . $i] !!}
                            </div>
                        </div>
                        @endif
                    @endfor
                </div>

                <div class="gl-dim-box">
                    <div class="gl-dim-label">
                        <i class="fa-solid fa-ruler-combined" style="color: #009688;"></i> {{ $settings['poster_dim_label'] ?? 'POSTER DIMENSIONS' }}
                    </div>
                    <p class="gl-dim-value">{{ $settings['poster_dim_val'] ?? '90 cm (Width) × 120 cm (Height)' }}</p>
                </div>
            </div>

        </div>

        <!-- Publications Section -->
        <div class="gl-card" id="publications" style="margin-top: 30px; border-top: 4px solid #009688;">
            <div class="gl-badge">
                <i class="fa-solid fa-book-open"></i> {{ $settings['publication_badge'] ?? 'SCIENTIFIC PUBLICATIONS' }}
            </div>
            <h2 class="gl-title" style="margin-bottom: 16px;">{{ $settings['publication_title'] ?? 'Conference Proceedings & Publication Opportunities' }}</h2>
            <p style="color: #64748b; font-size: 0.95rem; line-height: 1.6; margin-bottom: 24px;">
                {{ $settings['publication_desc'] ?? 'All peer-reviewed and accepted abstracts and selected full-length research papers presented at the Global One Health Confluence will be published in indexed conference proceedings and partnered reputed journals.' }}
            </p>
            <div class="gl-grid-abstract" style="margin-bottom: 0;">
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Indexed Proceedings:</strong> All accepted abstracts will be compiled in the official Conference Abstract Book with ISBN.
                    </div>
                </div>
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Peer-Reviewed Journals:</strong> Outstanding papers will be recommended for fast-track publication in Scopus / WoS indexed partner journals.
                    </div>
                </div>
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Best Paper Awards:</strong> Exceptional presentations across each track will receive certificates of merit and special feature recognition.
                    </div>
                </div>
                <div class="gl-list-item">
                    <i class="fa-solid fa-circle-check gl-icon-check"></i>
                    <div class="gl-item-text">
                        <strong>Plagiarism Policy:</strong> Submissions must adhere to ethical standards with similarity index below 15% excluding references.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('sections.footer')

@endsection