@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $oralSettings = \App\Models\SiteSetting::where('group', 'oral_presentation')->pluck('value', 'key')->toArray();
@endphp

<!-- Page Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 65px 20px; text-align: center; color: #fff; position: relative;">
    <div class="page-banner-content">
        <h1 style="text-transform: uppercase; font-size: 2.4rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">
            {{ $oralSettings['oral_banner_title'] ?? 'ORAL PRESENTATION' }}
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
    .formatting-card {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        padding: 25px;
        margin: 25px 0;
    }
    .formatting-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 15px;
        margin-top: 15px;
    }
    .fmt-item {
        background: #ffffff;
        padding: 12px 16px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        font-size: 0.92rem;
    }
    .fmt-item strong {
        color: #0f172a;
        display: block;
        font-size: 0.82rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
</style>

<div class="event-page-container">
    <div class="event-page-card">
        <h2 style="font-size: 1.9rem; font-weight: 800; color: #0f172a; margin-bottom: 20px; border-bottom: 3px solid #00A896; padding-bottom: 12px; display: inline-block;">
            {{ $oralSettings['oral_section_title'] ?? 'Abstract Submission & Oral Presentation Guidelines' }}
        </h2>

        <!-- Abstract Submission Announcement -->
        <div class="announcement-box">
            <h3 style="font-size: 1.25rem; font-weight: 700; color: #0f172a; margin-bottom: 10px; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-bullhorn" style="color: #10b981;"></i> Abstract Submission Call
            </h3>
            <p style="margin: 0;">
                {{ $oralSettings['oral_announcement'] ?? 'We are delighted to announce the "International Conference on..." and invite abstract submissions from scientists, academicians, industry professionals, research scholars, and students working in the broader theme of One Health. This global gathering strives to provide a platform for dissemination of innovative research, and exchange of ideas and scientific discussions. Participants are encouraged to share their work through oral or poster presentations.' }}
            </p>
        </div>

        <!-- Submission Guidelines -->
        <div class="section-title">
            <i class="fa-solid fa-file-word" style="color: #00A896;"></i> Submission Guidelines
        </div>

        <ul class="guideline-list">
            <li><i class="fa-solid fa-circle-check"></i> Submit the abstract in MS-Word format. The abstract should be <strong>250–300 words</strong> in length.</li>
            <li><i class="fa-solid fa-circle-check"></i> Author names with institutional affiliations are to be provided immediately below the title.</li>
            <li><i class="fa-solid fa-circle-check"></i> Provide the email ID of the corresponding author.</li>
            <li><i class="fa-solid fa-circle-check"></i> Presenting author is to be marked with <strong>#</strong> and corresponding author with <strong>*</strong></li>
            <li><i class="fa-solid fa-circle-check"></i> Include <strong>5 to 6 keywords</strong> at the end of the abstract.</li>
            <li><i class="fa-solid fa-circle-check"></i> Upload the Abstract using the designated Google Form submission portal.</li>
            <li><i class="fa-solid fa-circle-check"></i> Abstracts will be considered only after receipt of registration fee.</li>
        </ul>

        <!-- Formatting Card -->
        <div class="formatting-card">
            <h4 style="margin: 0 0 10px; font-weight: 700; color: #0f172a; font-size: 1.05rem;">
                <i class="fa-solid fa-sliders" style="color: #00A896; margin-right: 6px;"></i> Document Formatting Specifications
            </h4>
            <div class="formatting-grid">
                <div class="fmt-item">
                    <strong>Title Format</strong>
                    Times New Roman, 14 pt, Bold, Centered
                </div>
                <div class="fmt-item">
                    <strong>Authors & Affiliations</strong>
                    Times New Roman, 12 pt, Italic, Centered
                </div>
                <div class="fmt-item">
                    <strong>Body Text</strong>
                    Times New Roman, 12 pt, Justified
                </div>
                <div class="fmt-item">
                    <strong>Line Spacing</strong>
                    1.5 Line Spacing
                </div>
            </div>
        </div>

        <!-- Oral Presentation Guidelines -->
        <div class="section-title">
            <i class="fa-solid fa-microphone" style="color: #00A896;"></i> Oral Presentation Guidelines
        </div>

        <!-- Quick Specs Cards -->
        <div class="spec-grid">
            <div class="spec-card">
                <h4><i class="fa-solid fa-clock" style="color: #00A896;"></i> Time & Presentation Slot</h4>
                <p><strong>10 minutes presentation + 5 minutes Q&A</strong>.<br>Arrive 15 mins early to load slides with tech team.</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-file-powerpoint" style="color: #00A896;"></i> Slide Format & Length</h4>
                <p>PowerPoint or PDF (16:9 ratio). Max <strong>10–12 slides</strong> for a 10-minute talk (1 slide/min).</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-font" style="color: #00A896;"></i> Slide Design</h4>
                <p>Minimum <strong>24 pt font</strong>. One key message per slide. Use high-contrast colors & clear charts.</p>
            </div>
        </div>

        <!-- Delivery & Conduct Rules -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 25px; margin-top: 25px;">
            <div style="background: #f8fafc; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0;">
                <h4 style="color: #0f172a; font-weight: 700; margin-bottom: 12px; font-size: 1.1rem; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-comments" style="color: #00A896;"></i> Presentation Delivery
                </h4>
                <ul class="guideline-list" style="margin: 0;">
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Do not read directly from slides or a script.</li>
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Speak clearly at a steady pace and rehearse beforehand.</li>
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Session chairs will signal at 2 mins remaining; presentations exceeding time limits will be stopped.</li>
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> No promotional material unrelated to the topic.</li>
                </ul>
            </div>

            <div style="background: #f8fafc; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0;">
                <h4 style="color: #0f172a; font-weight: 700; margin-bottom: 12px; font-size: 1.1rem; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-earth-americas" style="color: #00A896;"></i> Language & Conduct
                </h4>
                <ul class="guideline-list" style="margin: 0;">
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Presentations must be delivered in English.</li>
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Include title, author name, affiliation & conflict-of-interest disclosure on slides 1 & 2.</li>
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Add a final "Key Takeaways" slide with contact details.</li>
                    <li><i class="fa-solid fa-check" style="font-size: 0.9rem;"></i> Be respectful in Q&A and acknowledge funding sources & co-authors.</li>
                </ul>
            </div>
        </div>

    </div>
</div>

@include('sections.footer')

@endsection
