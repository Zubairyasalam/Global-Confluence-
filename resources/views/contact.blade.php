@extends('layouts.app')

@section('title', 'Contact Us | Global One Health Confluence 2026')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Contact Hero Banner -->
<div class="page-banner" style="background: linear-gradient(135deg, #0a192f 0%, #0f172a 50%, #112240 100%); padding: 75px 20px 70px; text-align: center; color: #ffffff; position: relative;">
    <div class="page-banner-content" style="max-width: 900px; margin: 0 auto; position: relative; z-index: 5;">
        <h1 style="text-transform: uppercase; font-size: clamp(2.2rem, 4vw, 2.9rem); font-weight: 800; letter-spacing: 2px; color: #ffffff !important; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">
            {{ $settings['contact_hero_title'] ?? 'CONTACT US' }}
        </h1>
    </div>
</div>

<style>
    .contact-page-container {
        padding: 60px 20px 80px;
        max-width: 1050px;
        margin: 0 auto;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: #334155;
    }
    .contact-page-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        padding: 42px 40px;
    }
    .contact-info-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: all 0.2s ease;
    }
    .contact-info-box:hover {
        border-color: #00A896;
        background: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 168, 150, 0.08);
    }
    .contact-icon-sq {
        width: 46px;
        height: 46px;
        background: #e6f7f5;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #00A896;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    .contact-person-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-left: 4px solid #00A896;
        border-radius: 10px;
        padding: 20px 22px;
        transition: all 0.25s ease;
    }
    .contact-person-card:hover {
        transform: translateY(-3px);
        background: #ffffff;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
        border-color: #00A896;
    }
</style>

<div class="contact-page-container">
    <div class="contact-page-card">
        <h2 style="font-size: 1.85rem; font-weight: 800; color: #0f172a; margin: 0 0 28px 0; border-bottom: 3px solid #00A896; padding-bottom: 12px; display: inline-block;">
            {{ $settings['contact_page_title'] ?? 'Contact Us' }}
        </h2>

        <!-- Official Website & Email Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; margin-bottom: 25px;">
            <!-- Official Website -->
            <div class="contact-info-box">
                <div class="contact-icon-sq">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div>
                    <strong style="display: block; color: #1e293b; font-size: 1rem; margin-bottom: 3px;">Official Website</strong>
                    <a href="{{ $settings['contact_website'] ?? 'https://biomed.mccmrfip.in/' }}" target="_blank" style="color: #00A896; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                        {{ $settings['contact_website'] ?? 'https://biomed.mccmrfip.in/' }}
                    </a>
                </div>
            </div>

            <!-- Official Email -->
            <div class="contact-info-box">
                <div class="contact-icon-sq">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div>
                    <strong style="display: block; color: #1e293b; font-size: 1rem; margin-bottom: 3px;">Official Email</strong>
                    <a href="mailto:{{ $settings['contact_email'] ?? 'gohc2026@gmail.com' }}" style="color: #00A896; text-decoration: none; font-weight: 600; font-size: 0.95rem;">
                        {{ $settings['contact_email'] ?? 'gohc2026@gmail.com' }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Special Assistance & Information Grid (Foreign Students & Accommodation) -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; margin-bottom: 35px;">
            <!-- Foreign Students / Visa Assistance -->
            <div class="contact-info-box" style="border-left: 4px solid #028090; align-items: flex-start; padding: 22px 24px;">
                <div class="contact-icon-sq" style="background: #e0f2fe; color: #028090;">
                    <i class="fa-solid fa-passport"></i>
                </div>
                <div style="flex: 1;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px;">
                        <strong style="color: #0f172a; font-size: 1.05rem; font-weight: 800;">
                            {{ $settings['contact_foreign_title'] ?? 'Foreign Students' }}
                        </strong>
                        <span style="background: #e0f2fe; color: #0369a1; font-size: 0.72rem; font-weight: 700; padding: 2px 8px; border-radius: 6px; text-transform: uppercase;">
                            Visa Support
                        </span>
                    </div>
                    <p style="color: #475569; font-size: 0.92rem; margin: 0 0 10px 0; line-height: 1.5;">
                        {{ $settings['contact_foreign_note'] ?? 'Kindly contact Dean IP regarding Visa' }}
                    </p>
                    <a href="mailto:{{ $settings['contact_foreign_email'] ?? 'deanip@mcc.edu.in' }}" style="display: inline-flex; align-items: center; gap: 8px; color: #028090; font-weight: 700; font-size: 0.95rem; text-decoration: none; background: #f0f9ff; padding: 6px 14px; border-radius: 8px; border: 1px solid #bae6fd; transition: all 0.2s;">
                        <i class="fa-solid fa-envelope"></i> {{ $settings['contact_foreign_email'] ?? 'deanip@mcc.edu.in' }}
                    </a>
                </div>
            </div>

            <!-- Accommodation -->
            <div class="contact-info-box" style="border-left: 4px solid #00A896; align-items: flex-start; padding: 22px 24px;">
                <div class="contact-icon-sq" style="background: #e6f7f5; color: #00A896;">
                    <i class="fa-solid fa-hotel"></i>
                </div>
                <div style="flex: 1;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px;">
                        <strong style="color: #0f172a; font-size: 1.05rem; font-weight: 800;">
                            {{ $settings['contact_accom_title'] ?? 'Accommodation' }}
                        </strong>
                        <span style="background: #fef3c7; color: #b45309; font-size: 0.72rem; font-weight: 700; padding: 2px 8px; border-radius: 6px; text-transform: uppercase;">
                            Notice
                        </span>
                    </div>
                    <p style="color: #475569; font-size: 0.92rem; margin: 0 0 10px 0; line-height: 1.5;">
                        {{ $settings['contact_accom_note'] ?? 'Will be updated soon' }}
                    </p>
                    <span style="display: inline-flex; align-items: center; gap: 6px; color: #64748b; font-size: 0.85rem; font-weight: 500;">
                        <i class="fa-solid fa-clock-rotate-left" style="color: #f59e0b;"></i> Please check back for updates
                    </span>
                </div>
            </div>
        </div>

        <!-- Contact Persons Section -->
        <div style="background: #ffffff; border: 1.5px solid #e2e8f0; border-radius: 14px; padding: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.02);">
            <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin: 0 0 24px 0; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-id-badge" style="color: #00A896; font-size: 1.35rem;"></i> Contact Persons
            </h3>

            @php
                $contactPersons = [];
                for ($i = 1; $i <= 10; $i++) {
                    if (!empty($settings['contact_person_' . $i . '_title']) || !empty($settings['contact_person_' . $i . '_phone'])) {
                        $contactPersons[] = [
                            'title' => $settings['contact_person_' . $i . '_title'] ?? ('Contact ' . $i),
                            'phone' => $settings['contact_person_' . $i . '_phone'] ?? ''
                        ];
                    }
                }

                // Default fallback if empty
                if (empty($contactPersons)) {
                    $contactPersons = [
                        ['title' => 'ORGANIZING SECRETARY 1', 'phone' => '+91 73975 39543'],
                        ['title' => 'ORGANIZING SECRETARY 2', 'phone' => '+91 81480 18894'],
                        ['title' => 'STUDENT CHAIRMAN', 'phone' => '+91 90255 96984'],
                        ['title' => 'STUDENT COORDINATOR', 'phone' => '+91 97895 82404'],
                    ];
                }
            @endphp

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
                @foreach($contactPersons as $person)
                    <div class="contact-person-card">
                        <span style="display: block; font-size: 0.78rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; color: #64748b; margin-bottom: 8px;">
                            {{ $person['title'] }}
                        </span>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $person['phone']) }}" style="display: inline-flex; align-items: center; gap: 8px; color: #0f172a; text-decoration: none; font-size: 1.15rem; font-weight: 800; transition: color 0.2s;">
                            <i class="fa-solid fa-phone" style="color: #00A896; font-size: 1rem;"></i>
                            <span>{{ $person['phone'] }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@include('sections.footer')

@endsection
