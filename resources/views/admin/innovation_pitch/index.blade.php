@extends('layouts.admin_cms')

@section('header_title', 'Innovation Pitch CMS')

@section('content')
<style>
    .event-admin-wrap {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .admin-card-section {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .form-label {
        display: block;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        font-size: 0.92rem;
    }

    .form-input {
        width: 100%;
        padding: 11px 15px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #0f172a;
        font-family: inherit;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        border-color: #00A896;
        outline: none;
    }
</style>

<div class="event-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-lightbulb" style="color: #00A896; margin-right: 8px;"></i> Innovation Pitch CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize pitch competition criteria, evaluation metrics, incubation opportunities, and guidelines.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/events/innovation-pitch" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    @php
        $bannerTitle = $settings['pitch_banner_title'] ?? 'INNOVATION PITCH';
        $sectionTitle = $settings['pitch_section_title'] ?? 'One Health Innovation Pitch Challenge';
        $mainContent = $settings['pitch_main_content'] ?? 'The Innovation Pitch invites startups, innovators, student entrepreneurs, and interdisciplinary research teams to present novel technologies, prototypes, biomedical devices, diagnostic platforms, and digital solutions tackling complex One Health challenges.';
    @endphp

    <!-- 1. LIVE VISUAL PREVIEW -->
    <div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.95); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 55px 20px 45px; text-align: center; color: #fff;">
            <h1 style="text-transform: uppercase; font-size: 2rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">
                {{ $bannerTitle }}
            </h1>
        </div>

        <div style="padding: 40px 30px; max-width: 950px; margin: 0 auto; font-family: 'Poppins', sans-serif;">
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 35px 30px; box-shadow: 0 6px 20px rgba(0,0,0,0.03);">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin: 0 0 18px 0; border-bottom: 3px solid #00A896; padding-bottom: 10px; display: inline-block;">
                    {{ $sectionTitle }}
                </h2>

                <div style="background: #f0fdf4; border-left: 4px solid #10b981; border-radius: 10px; padding: 18px 22px; margin-bottom: 25px; color: #334155; line-height: 1.7; font-size: 0.95rem;">
                    {{ $mainContent }}
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 25px;">
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-users" style="color: #00A896;"></i> Team Size</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['pitch_spec_team'] ?? '1 to 4 Members per Team' }}</p>
                    </div>
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-stopwatch" style="color: #00A896;"></i> Pitch Time</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['pitch_spec_time'] ?? '5 mins Pitch + 3 mins Jury Q&A' }}</p>
                    </div>
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-trophy" style="color: #00A896;"></i> Opportunity</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['pitch_spec_opp'] ?? 'Incubation Grants & Mentor Connect' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form action="{{ route('admin.innovation_pitch.update') }}" method="POST">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">
            
            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> 1. Page Header & Challenge Overview
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Hero Banner Title</label>
                        <input type="text" name="pitch_banner_title" value="{{ $bannerTitle }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Main Section Heading</label>
                        <input type="text" name="pitch_section_title" value="{{ $sectionTitle }}" class="form-input" required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="form-label">Challenge Overview Paragraph</label>
                    <textarea name="pitch_main_content" rows="4" class="form-input" required>{{ $mainContent }}</textarea>
                </div>
            </div>

            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-list-check" style="color: #00A896;"></i> 2. Pitch Parameters & Eligibility
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Team Size</label>
                        <input type="text" name="pitch_spec_team" value="{{ $settings['pitch_spec_team'] ?? '1 to 4 Members per Team' }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Pitch Time Allocation</label>
                        <input type="text" name="pitch_spec_time" value="{{ $settings['pitch_spec_time'] ?? '5 mins Pitch + 3 mins Jury Q&A' }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Incentives & Awards</label>
                        <input type="text" name="pitch_spec_opp" value="{{ $settings['pitch_spec_opp'] ?? 'Incubation Grants & Mentor Connect' }}" class="form-input">
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="form-label">Evaluation Criteria & Pitch Guidelines (HTML Supported)</label>
                    <textarea name="pitch_guidelines_content" rows="6" class="form-input">{{ $settings['pitch_guidelines_content'] ?? '1. Problem Statement & Market Need in One Health.\n2. Novelty and Technological Feasibility of the Proposed Solution.\n3. Business Model, Commercialization Roadmap & ESG Impact.\n4. Live Demonstration / Prototype / Slide Deck (Max 10 slides).' }}</textarea>
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 34px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Innovation Pitch Content
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
