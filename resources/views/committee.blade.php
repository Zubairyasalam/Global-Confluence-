@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_committee_title')->value('value') ?? 'COMMITTEE';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_committee_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1 style="text-transform: uppercase;">{{ $bannerTitle }}</h1>
        </div>
    </div>

<style>
    .committee-page-wrap {
        padding: 70px 20px;
        max-width: 1200px;
        margin: 0 auto;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .cm-section-title {
        text-align: center;
        margin-bottom: 25px;
    }

    .cm-section-title h2 {
        font-size: clamp(2rem, 4vw, 2.5rem);
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 12px 0;
        text-transform: uppercase;
        letter-spacing: -0.5px;
    }

    .cm-section-title .cm-line {
        width: 70px;
        height: 4px;
        background: #84cc16;
        margin: 0 auto 16px auto;
        border-radius: 2px;
    }

    .cm-grid-main {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .cm-grid-3 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .cm-grid-4 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 22px;
        margin-bottom: 50px;
    }

    .cm-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 35px 25px;
        border: 1px solid rgba(0, 150, 136, 0.1);
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03), inset 0 2px 0 0 #009688;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        position: relative;
        overflow: hidden;
    }

    .cm-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: radial-gradient(circle at top right, rgba(0,150,136,0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .cm-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08), inset 0 3px 0 0 #1de9b6;
        border-color: rgba(0, 150, 136, 0.3);
    }

    /* Professional UI Theme Pill Badge */
    .cm-role-pill-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.75rem;
        font-weight: 800;
        color: #009688;
        background: rgba(0, 150, 136, 0.08);
        padding: 6px 20px;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 24px;
        border: 1px solid rgba(0, 150, 136, 0.15);
        transition: all 0.3s ease;
    }

    .cm-card:hover .cm-role-pill-badge {
        background: #009688;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 150, 136, 0.25);
    }

    .cm-role-pill-badge.teal {
        background: #009688;
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 150, 136, 0.25);
    }

    .cm-name {
        font-size: 1.35rem;
        color: #0f172a;
        font-weight: 900;
        margin: 0 0 6px 0;
        line-height: 1.3;
        letter-spacing: -0.3px;
        transition: color 0.3s ease;
    }

    .cm-card:hover .cm-name {
        color: #009688;
    }

    .cm-desc {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.6;
        margin: 0;
        font-weight: 500;
    }

    .cm-multi-group {
        display: flex;
        flex-direction: column;
        width: 100%;
        position: relative;
    }

    .cm-multi-person {
        padding: 20px 0;
        position: relative;
    }

    .cm-multi-person::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 10%;
        width: 80%;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(0,150,136,0.2), transparent);
    }

    .cm-multi-person:first-child {
        padding-top: 0;
    }

    .cm-multi-person:last-child {
        padding-bottom: 0;
    }

    .cm-multi-person:last-child::after {
        display: none;
    }

    /* Single Person Card for Grids */
    .cm-person-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 25px 20px;
        border: 1px solid rgba(0, 150, 136, 0.1);
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03), inset 0 2px 0 0 transparent;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .cm-person-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: radial-gradient(circle at top right, rgba(0,150,136,0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .cm-person-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08), inset 0 3px 0 0 #1de9b6;
        border-color: rgba(0, 150, 136, 0.2);
    }

    .cm-person-card .cm-name {
        font-size: 1.15rem;
        color: #0f172a;
        font-weight: 800;
        margin: 0 0 4px 0;
        line-height: 1.3;
        transition: color 0.3s ease;
    }

    .cm-person-card:hover .cm-name {
        color: #009688;
    }

    .cm-person-card .cm-desc {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.5;
        margin: 0;
    }

    .college-banner {
        background: linear-gradient(135deg, #0f172a 0%, #009688 100%);
        border-radius: 20px;
        padding: 45px 30px;
        text-align: center;
        color: #ffffff;
        max-width: 900px;
        margin: 40px auto 0 auto;
        box-shadow: 0 15px 35px rgba(0, 150, 136, 0.2);
    }

    .college-banner h3 {
        color: #ffffff;
        font-size: 2rem;
        font-weight: 800;
        margin: 0 0 12px 0;
    }

    .college-banner p {
        font-size: 1.1rem;
        margin: 0 0 22px 0;
        opacity: 0.9;
    }

    .college-banner a {
        display: inline-block;
        background: #ffffff;
        color: #0f172a;
        padding: 10px 30px;
        border-radius: 30px;
        font-weight: 800;
        text-decoration: none;
        transition: all 0.2s ease;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        font-size: 0.88rem;
    }

    .college-banner a:hover {
        background: #84cc16;
        color: #ffffff;
        transform: translateY(-2px);
    }
</style>

<div class="committee-page-wrap">
    
    <!-- Leadership Header -->
    <div class="cm-section-title">
        <h2>Leadership</h2>
        <div class="cm-line"></div>
    </div>
    
    <!-- Chief Patron Grid -->
    @if(isset($leadership['chief_patron']))
    <div style="text-align: center; margin: 0 0 15px 0;">
        <span class="cm-role-pill-badge teal" style="margin-bottom: 0;">CHIEF PATRON</span>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; margin-bottom: 35px;">
        @foreach($leadership['chief_patron'] as $member)
        <div class="cm-person-card" style="width: 100%; max-width: 320px;">
            <h4 class="cm-name">{{ $member->name }}</h4>
            <p class="cm-desc">{!! nl2br(e($member->designation)) !!}</p>
        </div>
        @endforeach
    </div>
    @endif
    
    <!-- Patrons Grid -->
    @if(isset($leadership['patrons']))
    <div style="text-align: center; margin: 0 0 15px 0;">
        <span class="cm-role-pill-badge teal" style="margin-bottom: 0;">PATRON</span>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; margin-bottom: 35px;">
        @foreach($leadership['patrons'] as $member)
        <div class="cm-person-card" style="width: 100%; max-width: 320px;">
            <h4 class="cm-name" style="font-size: 1.15rem;">{{ $member->name }}</h4>
            <p class="cm-desc" style="font-size: 0.9rem;">{!! nl2br(e($member->designation)) !!}</p>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Convenors Grid -->
    @if(isset($leadership['convenor']))
    <div style="text-align: center; margin: 0 0 15px 0;">
        <span class="cm-role-pill-badge" style="margin-bottom: 0;">CONVENORS</span>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; margin-bottom: 35px;">
        @foreach($leadership['convenor'] as $member)
        <div class="cm-person-card" style="width: 100%; max-width: 320px;">
            <h4 class="cm-name" style="font-size: 1.15rem;">{{ $member->name }}</h4>
            <p class="cm-desc" style="font-size: 0.9rem;">{!! nl2br(e($member->designation)) !!}</p>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Co-Convenors Grid -->
    @if(isset($leadership['co_convenors']))
    <div style="text-align: center; margin: 0 0 15px 0;">
        <span class="cm-role-pill-badge" style="margin-bottom: 0;">CO-CONVENORS</span>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; margin-bottom: 35px;">
        @foreach($leadership['co_convenors'] as $member)
        <div class="cm-person-card" style="width: 100%; max-width: 320px;">
            <h4 class="cm-name" style="font-size: 1.15rem;">{{ $member->name }}</h4>
            <p class="cm-desc" style="font-size: 0.9rem;">{!! nl2br(e($member->designation)) !!}</p>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Organizing Secretaries Grid -->
    @if(isset($leadership['organizing_secretaries']))
    <div style="text-align: center; margin: 0 0 15px 0;">
        <span class="cm-role-pill-badge teal" style="margin-bottom: 0;">ORGANIZING SECRETARIES</span>
    </div>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; margin-bottom: 45px;">
        @foreach($leadership['organizing_secretaries'] as $member)
        <div class="cm-person-card" style="width: 100%; max-width: 320px;">
            <h4 class="cm-name" style="font-size: 1.15rem;">{{ $member->name }}</h4>
            <p class="cm-desc" style="font-size: 0.9rem;">{!! nl2br(e($member->designation)) !!}</p>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Organizing Committee Section Grid -->
    @if(count($organizing) > 0)
    <div class="cm-section-title">
        <h2>Organizing Committee</h2>
        <div class="cm-line"></div>
    </div>
    
    <div class="cm-grid-4">
        @foreach($organizing as $member)
        <div class="cm-person-card">
            <h4 class="cm-name">{{ $member->name }}</h4>
            <p class="cm-desc">{!! nl2br(e($member->designation)) !!}</p>
        </div>
        @endforeach
    </div>
    @endif

    <!-- Advisory Board Section -->
    <div class="cm-section-title">
        <h2>Advisory Board</h2>
        <div class="cm-line"></div>
        <p style="max-width: 800px; margin: 18px auto 0 auto; color: #64748b; font-size: 1.05rem; line-height: 1.6;">
            {{ $settings['advisory_text'] ?? 'The conference will be supported by an esteemed Advisory Board comprising experts from academia, research institutions, healthcare, industry and allied fields.' }}
        </p>
    </div>
    
    @if(count($advisory) > 0)
    
        @php
            $intlAdvisory = $advisory->where('subcategory', 'international');
            $natlAdvisory = $advisory->where('subcategory', 'national');
            $otherAdvisory = $advisory->whereNotIn('subcategory', ['international', 'national']);
        @endphp

        @if($intlAdvisory->count() > 0)
        <div style="text-align: center; margin: 40px 0 15px 0;">
            <span class="cm-role-pill-badge" style="margin-bottom: 0;">INTERNATIONAL ADVISORY COMMITTEE</span>
        </div>
        <div class="cm-grid-3">
            @foreach($intlAdvisory as $member)
            <div class="cm-person-card">
                <h4 class="cm-name">{{ $member->name }}</h4>
                <p class="cm-desc">{!! nl2br(e($member->designation)) !!}</p>
            </div>
            @endforeach
        </div>
        @endif

        @if($natlAdvisory->count() > 0)
        <div style="text-align: center; margin: 40px 0 15px 0;">
            <span class="cm-role-pill-badge" style="margin-bottom: 0;">NATIONAL ADVISORY COMMITTEE</span>
        </div>
        <div class="cm-grid-3">
            @foreach($natlAdvisory as $member)
            <div class="cm-person-card">
                <h4 class="cm-name">{{ $member->name }}</h4>
                <p class="cm-desc">{!! nl2br(e($member->designation)) !!}</p>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($otherAdvisory->count() > 0)
        <div class="cm-grid-3">
            @foreach($otherAdvisory as $member)
            <div class="cm-person-card">
                <h4 class="cm-name">{{ $member->name }}</h4>
                <p class="cm-desc">{!! nl2br(e($member->designation)) !!}</p>
            </div>
            @endforeach
        </div>
        @endif

    @else
    <div style="text-align: center; background: #f8fafc; border: 1px dashed #cbd5e1; padding: 40px; border-radius: 16px; max-width: 800px; margin: 0 auto 60px auto;">
        <h4 style="margin: 0 0 8px 0; color: #0f172a; font-weight: 700; font-size: 1.2rem;">Advisory Board Members</h4>
        <p style="margin: 0; color: #64748b; font-size: 0.95rem;">{{ $settings['advisory_fallback'] ?? '(Names and details to be announced soon.)' }}</p>
    </div>
    @endif

    <!-- Venue / College Info -->
    <div class="college-banner">
        <h3>{{ $settings['banner_title'] ?? 'Madras Christian College' }}</h3>
        <p>{{ $settings['banner_desc'] ?? 'Tambaram East, Chennai 600 059, Tamil Nadu, India' }}</p>
        <a href="{{ $settings['banner_link'] ?? 'https://mcc.edu.in' }}" target="_blank">Visit Website</a>
    </div>

</div>

@include('sections.footer')

@endsection
