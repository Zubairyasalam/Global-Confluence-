@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $pitchSettings = \App\Models\SiteSetting::where('group', 'innovation_pitch')->pluck('value', 'key')->toArray();
    $bannerTitle = $pitchSettings['pitch_banner_title'] ?? 'INNOVATION PITCH';
    $sectionTitle = $pitchSettings['pitch_section_title'] ?? 'One Health Innovation Pitch Challenge';
    $mainContent = $pitchSettings['pitch_main_content'] ?? 'The Innovation Pitch invites startups, innovators, student entrepreneurs, and interdisciplinary research teams to present novel technologies, prototypes, biomedical devices, diagnostic platforms, and digital solutions tackling complex One Health challenges.';
    $specTeam = $pitchSettings['pitch_spec_team'] ?? '1 to 4 Members per Team';
    $specTime = $pitchSettings['pitch_spec_time'] ?? '5 mins Pitch + 3 mins Jury Q&A';
    $specOpp = $pitchSettings['pitch_spec_opp'] ?? 'Incubation Grants & Mentor Connect';
    $guidelines = $pitchSettings['pitch_guidelines_content'] ?? null;
@endphp

<!-- Page Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 65px 20px; text-align: center; color: #fff; position: relative;">
    <div class="page-banner-content">
        <h1 style="text-transform: uppercase; font-size: 2.4rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">
            {{ $bannerTitle }}
        </h1>
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
        margin-bottom: 30px;
    }
    .announcement-box {
        background: #f0fdf4;
        border-left: 4px solid #10b981;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 35px;
        font-size: 1.05rem;
        line-height: 1.8;
        color: #334155;
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
        padding: 22px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .spec-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 168, 150, 0.1);
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
    .section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #0f172a;
        margin-top: 35px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .guideline-list {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }
    .guideline-list li {
        position: relative;
        padding-left: 32px;
        margin-bottom: 14px;
        font-size: 1rem;
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
</style>

<div class="event-page-container">
    <div class="event-page-card">
        <h2 style="font-size: 1.9rem; font-weight: 800; color: #0f172a; margin-bottom: 20px; border-bottom: 3px solid #00A896; padding-bottom: 12px; display: inline-block;">
            {{ $sectionTitle }}
        </h2>

        <!-- Overview Box -->
        <div class="announcement-box">
            <h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-lightbulb" style="color: #10b981;"></i> Pitch Challenge Overview
            </h3>
            <p style="margin: 0;">
                {{ $mainContent }}
            </p>
        </div>

        <!-- Quick Specs Cards -->
        <div class="spec-grid">
            <div class="spec-card">
                <h4><i class="fa-solid fa-users" style="color: #00A896;"></i> Team Composition</h4>
                <p>{{ $specTeam }}</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-stopwatch" style="color: #00A896;"></i> Pitch Time Limit</h4>
                <p>{{ $specTime }}</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-trophy" style="color: #00A896;"></i> Incentives & Awards</h4>
                <p>{{ $specOpp }}</p>
            </div>
        </div>

        <!-- Evaluation Criteria & Guidelines -->
        <div class="section-title">
            <i class="fa-solid fa-clipboard-check" style="color: #00A896;"></i> Evaluation Criteria & Submission Details
        </div>

        @if($guidelines)
            <div style="background: #f8fafc; border-radius: 12px; padding: 25px; border: 1px solid #e2e8f0; line-height: 1.8; color: #334155; font-size: 1rem; white-space: pre-line;">
                {!! nl2br(e($guidelines)) !!}
            </div>
        @else
            <ul class="guideline-list">
                <li><i class="fa-solid fa-circle-check"></i> <strong>Problem Statement & Impact:</strong> Significance of the healthcare, veterinary, or environmental challenge addressed.</li>
                <li><i class="fa-solid fa-circle-check"></i> <strong>Technological Novelty:</strong> Originality of the innovation, prototype readiness, and intellectual property potential.</li>
                <li><i class="fa-solid fa-circle-check"></i> <strong>Commercial Viability:</strong> Market feasibility, scalable business model, regulatory pathway, and financial sustainability.</li>
                <li><i class="fa-solid fa-circle-check"></i> <strong>Pitch Deck Specifications:</strong> Maximum 10 presentation slides covering problem, solution, traction, team, and funding requirements.</li>
                <li><i class="fa-solid fa-circle-check"></i> <strong>Jury Interaction:</strong> Live 3-minute Q&A with venture capitalists, translational researchers, and industry leaders.</li>
            </ul>
        @endif

    </div>
</div>

@include('sections.footer')

@endsection
