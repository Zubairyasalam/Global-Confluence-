@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

@php
    $pitchSettings = \App\Models\SiteSetting::where('group', 'innovation_pitch')->pluck('value', 'key')->toArray();
    $bannerTitle = $pitchSettings['pitch_banner_title'] ?? 'INNOVATION PITCH';
@endphp

<!-- Page Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0a192f 0%, #0d2744 100%); padding: 65px 20px; text-align: center; color: #fff; position: relative;">
    <div class="page-banner-content">
        <h1 style="text-transform: uppercase; font-size: clamp(2rem, 4vw, 2.6rem); font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">
            {{ $bannerTitle }}
        </h1>
    </div>
</div>

<style>
    .event-page-container {
        padding: 60px 20px;
        max-width: 1100px;
        margin: 0 auto;
        font-family: 'Poppins', 'Inter', system-ui, -apple-system, sans-serif;
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
        background: #f0fdfa;
        border-left: 5px solid #00a896;
        border-radius: 12px;
        padding: 28px 30px;
        margin-bottom: 35px;
        font-size: 1.05rem;
        line-height: 1.8;
        color: #1e293b;
    }
    .spec-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }
    .spec-card {
        background: #f8fafc;
        border-left: 4px solid #00a896;
        border-radius: 12px;
        padding: 22px 20px;
        transition: transform 0.2s, box-shadow 0.2s;
        border: 1px solid #e2e8f0;
        border-left-width: 4px;
    }
    .spec-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 168, 150, 0.1);
        border-left-color: #028090;
    }
    .spec-card h4 {
        color: #0f172a;
        font-size: 1rem;
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
        line-height: 1.5;
        font-weight: 600;
    }
    .section-title {
        font-size: 1.45rem;
        font-weight: 800;
        color: #0f172a;
        margin-top: 40px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 12px;
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
        margin-bottom: 16px;
        font-size: 1rem;
        line-height: 1.7;
        color: #334155;
    }
    .guideline-list li i {
        position: absolute;
        left: 0;
        top: 4px;
        color: #00a896;
        font-size: 1.1rem;
    }
    .template-card {
        background: #f8fafc;
        border: 1.5px solid #cbd5e1;
        border-radius: 14px;
        padding: 30px;
        margin: 25px 0;
    }
    .template-item {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 16px 20px;
        margin-bottom: 14px;
    }
    .template-item strong {
        color: #0f172a;
        display: block;
        font-size: 0.95rem;
        margin-bottom: 4px;
    }
    .template-item p {
        margin: 0;
        color: #64748b;
        font-size: 0.92rem;
        line-height: 1.5;
    }
    .sub-bullets {
        margin-top: 10px;
        padding-left: 20px;
        list-style-type: disc;
        color: #475569;
        font-size: 0.92rem;
        line-height: 1.6;
    }
    .shortlist-badge-banner {
        background: linear-gradient(135deg, rgba(0, 168, 150, 0.12), rgba(2, 128, 144, 0.12));
        border: 1.5px dashed #00a896;
        border-radius: 12px;
        padding: 18px 24px;
        margin: 25px 0 10px 0;
        display: flex;
        align-items: center;
        gap: 14px;
        color: #006b5f;
        font-weight: 700;
        font-size: 1.05rem;
    }
</style>

<div class="event-page-container">
    <div class="event-page-card">
        
        <h2 style="font-size: clamp(1.6rem, 3.5vw, 2.1rem); font-weight: 800; color: #0f172a; margin-bottom: 25px; border-bottom: 3px solid #00a896; padding-bottom: 12px; display: inline-block;">
            Innovator Pitch Guidelines
        </h2>

        <!-- Overview Invitation Announcement Box -->
        <div class="announcement-box">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-top: 0; margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-lightbulb" style="color: #00a896;"></i> Invitation to Student Innovators & Researchers
            </h3>
            <p style="margin: 0; text-align: justify;">
                We are delighted to invite student innovators, researchers and academicians to participate in the <strong>Innovators Pitch</strong> at the <strong>"Global One Health Confluence 2026"</strong>. The pitch provides a platform to showcase innovative ideas, technologies, products, solutions, and translational research addressing challenges within the broader theme of One Health. Participants are encouraged to present solutions that demonstrate novelty, relevance, feasibility, potential impact, and scalability. The Innovators Pitch is designed to facilitate interaction with experts, industry stakeholders and potential collaborators.
            </p>
        </div>

        <!-- Quick Specs Cards Grid -->
        <div class="spec-grid">
            <div class="spec-card">
                <h4><i class="fa-solid fa-users" style="color: #00a896;"></i> Target Audience</h4>
                <p>Students, Innovators, Researchers & Academicians</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-clock" style="color: #00a896;"></i> Pitch Duration</h4>
                <p>5-Min Pitch + 5-Min Panel Q&A</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-file-powerpoint" style="color: #00a896;"></i> Presentation Format</h4>
                <p>PowerPoint / PDF (Max 8–10 Slides)</p>
            </div>
            <div class="spec-card">
                <h4><i class="fa-solid fa-video" style="color: #00a896;"></i> Live Demos / Videos</h4>
                <p>Permitted up to 2 Mins</p>
            </div>
        </div>

        <!-- Pitch Submission Guidelines -->
        <div class="section-title">
            <i class="fa-solid fa-file-lines" style="color: #00a896;"></i> Pitch Submission Guidelines
        </div>

        <p style="color: #475569; font-size: 1rem; line-height: 1.6; margin-bottom: 20px;">
            Innovators must structure their initial pitch proposal submission using the template specifications outlined below:
        </p>

        <div class="template-card">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin-bottom: 14px;">
                <div class="template-item">
                    <strong><i class="fa-solid fa-heading" style="color: #00a896; margin-right: 6px;"></i> Title</strong>
                    <p>Clear and descriptive title of the proposed innovation / solution.</p>
                </div>
                <div class="template-item">
                    <strong><i class="fa-solid fa-user" style="color: #00a896; margin-right: 6px;"></i> Name of the Innovator</strong>
                    <p>Primary presenting innovator / lead researcher.</p>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px; margin-bottom: 14px;">
                <div class="template-item">
                    <strong><i class="fa-solid fa-people-group" style="color: #00a896; margin-right: 6px;"></i> Team Members</strong>
                    <p>Names and roles of co-innovators / team collaborators.</p>
                </div>
                <div class="template-item">
                    <strong><i class="fa-solid fa-chalkboard-user" style="color: #00a896; margin-right: 6px;"></i> Faculty Mentor (If Any)</strong>
                    <p>Name and department of faculty / institutional mentor.</p>
                </div>
            </div>

            <div class="template-item" style="margin-bottom: 14px;">
                <strong><i class="fa-solid fa-building-columns" style="color: #00a896; margin-right: 6px;"></i> Institution</strong>
                <p>Name of University, College, Research Institute, or Organization.</p>
            </div>

            <div class="template-item" style="margin-bottom: 14px; border-left: 4px solid #00a896;">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-bottom: 6px;">
                    <strong style="font-size: 1rem; color: #0f172a;"><i class="fa-solid fa-align-left" style="color: #00a896; margin-right: 6px;"></i> Summary of the Idea</strong>
                    <span style="background: rgba(0, 168, 150, 0.1); color: #008f7f; padding: 2px 10px; border-radius: 12px; font-weight: 700; font-size: 0.82rem;">Not more than 250 words</span>
                </div>
                <p style="margin-bottom: 8px;">The summary should clearly describe the following core aspects:</p>
                <ul class="sub-bullets" style="margin: 0 0 4px 0;">
                    <li><strong>Problem / Need:</strong> What problem or unmet need does the innovation address?</li>
                    <li><strong>Innovation / Solution:</strong> What is the proposed solution?</li>
                    <li><strong>Novelty:</strong> What makes the innovation unique or different from existing approaches?</li>
                </ul>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 14px;">
                <div class="template-item" style="border-left: 4px solid #028090;">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 6px; margin-bottom: 4px;">
                        <strong style="color: #0f172a;"><i class="fa-solid fa-fingerprint" style="color: #028090; margin-right: 6px;"></i> Uniqueness of the Idea</strong>
                        <span style="background: rgba(2, 128, 144, 0.1); color: #028090; padding: 2px 8px; border-radius: 12px; font-weight: 700; font-size: 0.78rem;">Max 50 words</span>
                    </div>
                    <p>Highlight the core differentiator and proprietary novelty.</p>
                </div>
                <div class="template-item" style="border-left: 4px solid #10b981;">
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 6px; margin-bottom: 4px;">
                        <strong style="color: #0f172a;"><i class="fa-solid fa-chart-line" style="color: #10b981; margin-right: 6px;"></i> Potential Impact</strong>
                        <span style="background: rgba(16, 185, 129, 0.1); color: #059669; padding: 2px 8px; border-radius: 12px; font-weight: 700; font-size: 0.78rem;">Max 100 words</span>
                    </div>
                    <p>Demonstrate scalability, clinical / commercial feasibility, and health impact.</p>
                </div>
            </div>
        </div>

        <div class="shortlist-badge-banner">
            <i class="fa-solid fa-circle-check" style="font-size: 1.5rem; color: #00a896; flex-shrink: 0;"></i>
            <span>Shortlisted innovators will be invited to pitch the idea during the conference.</span>
        </div>

        <!-- Pitch Presentation Guidelines -->
        <div class="section-title">
            <i class="fa-solid fa-chalkboard-user" style="color: #00a896;"></i> Pitch Presentation Guidelines
        </div>

        <ul class="guideline-list">
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <strong>5-minute pitch + 5-minute panel Q&A:</strong> Presenters must strictly adhere to the time allocated by session chairs.
            </li>
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <strong>Presentation Format:</strong> Presentation should be prepared in <strong>PowerPoint (.pptx)</strong> or <strong>PDF</strong> format.
            </li>
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <strong>Slide Limit:</strong> Maximum <strong>8–10 slides</strong> for the 5-minute pitch to maintain conciseness.
            </li>
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <strong>Demonstrations & Media:</strong> Live demonstrations or videos are permitted but must <strong>not exceed 2 minutes</strong> and will count towards the total presentation time.
            </li>
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <strong>Focus Areas:</strong> Pitch presentation should focus on the <strong>problem, solution, novelty, evidence/validation, potential impact, and scalability</strong> of the proposed solution.
            </li>
            <li>
                <i class="fa-solid fa-circle-check"></i>
                <strong>Slide Design & Clarity:</strong> Presenters are advised to use clear visuals and concise content and avoid overcrowding slides with text.
            </li>
        </ul>

        <!-- Action CTA Buttons -->
        <div style="margin-top: 45px; padding-top: 25px; border-top: 1px solid #e2e8f0; display: flex; gap: 18px; flex-wrap: wrap; justify-content: center;">
            <a href="{{ route('registration') }}" style="background: linear-gradient(135deg, #00a896, #028090); color: #ffffff; padding: 14px 32px; border-radius: 30px; font-weight: 700; text-decoration: none; font-size: 1.05rem; box-shadow: 0 8px 20px rgba(0, 168, 150, 0.25); display: inline-flex; align-items: center; gap: 10px; transition: transform 0.2s ease;">
                <i class="fa-solid fa-paper-plane"></i> Register for Innovation Pitch
            </a>
            <a href="{{ route('registration') }}" style="background: #0f172a; color: #ffffff; padding: 14px 32px; border-radius: 30px; font-weight: 700; text-decoration: none; font-size: 1.05rem; display: inline-flex; align-items: center; gap: 10px; transition: transform 0.2s ease;">
                <i class="fa-solid fa-file-arrow-up"></i> Submit Pitch Proposal
            </a>
        </div>

    </div>
</div>

@include('sections.footer')

@endsection
