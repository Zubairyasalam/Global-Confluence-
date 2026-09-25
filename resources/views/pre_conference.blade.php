@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = $bannerSettings['banner_pre_conference_title'] ?? 'PRE-CONFERENCE WORKSHOP';
        $bannerImage = $bannerSettings['banner_pre_conference_image'] ?? 'images/2026-bg.jpg';
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.8), rgba(10, 25, 47, 0.85)), url('" . asset($bannerImage) . "');" : '' }} padding: 100px 0 80px 0; text-align: center; color: white;">
        <div class="page-banner-content" style="max-width: 900px; margin: 0 auto; padding: 0 20px;">
            <h1 style="text-transform: uppercase; font-size: 2.5rem; font-weight: 800; margin-bottom: 20px; letter-spacing: 1px; color: #fff;">{{ $bannerTitle }}</h1>
            <p style="font-size: 1.2rem; color: #94a3b8; margin: 0 auto; max-width: 800px; line-height: 1.6;">
                Pre-Conference Consultative Workshop on<br>
                <strong style="color: #009688; font-size: 1.4rem;">GLOBAL ONE HEALTH CONFLUENCE 2026</strong><br>
                Bridging Microbes, Molecules & Mankind for Sustainability
            </p>
        </div>
    </div>

<style>
    .pre-conf-wrap {
        padding: 70px 0;
        background-color: #f8fafc;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }
    
    .pre-conf-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .pre-conf-section {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
        padding: 40px;
        margin-bottom: 40px;
        border-top: 5px solid #009688;
    }

    .pre-conf-title {
        color: #0f172a;
        font-size: 1.8rem;
        font-weight: 800;
        margin-top: 0;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pre-conf-text {
        color: #475569;
        line-height: 1.8;
        font-size: 1.05rem;
        text-align: justify;
    }

    .obj-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .obj-list li {
        position: relative;
        padding-left: 45px;
        margin-bottom: 20px;
        color: #334155;
        font-size: 1.05rem;
        line-height: 1.7;
    }

    .obj-list li::before {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        background: #d1fae5;
        color: #059669;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .schedule-table-wrap {
        overflow-x: auto;
    }

    .schedule-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 800px;
    }

    .schedule-table th {
        background-color: #1e293b;
        color: #ffffff;
        padding: 18px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        border: none;
    }
    
    .schedule-table th:first-child { border-top-left-radius: 8px; }
    .schedule-table th:last-child { border-top-right-radius: 8px; }

    .schedule-table td {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        color: #475569;
        font-size: 0.95rem;
        line-height: 1.6;
        vertical-align: top;
    }

    .schedule-table tr:last-child td {
        border-bottom: none;
    }

    .schedule-table tr:hover td {
        background-color: #f8fafc;
    }

    .schedule-note {
        background: #e0f2fe;
        border-left: 4px solid #0284c7;
        padding: 15px 20px;
        border-radius: 4px;
        margin-bottom: 30px;
        color: #0369a1;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    @media (max-width: 768px) {
        .pre-conf-section { padding: 25px; }
    }
</style>

<div class="pre-conf-wrap">
    <div class="pre-conf-container">

        <!-- PREAMBLE -->
        <div class="pre-conf-section">
            <h2 class="pre-conf-title"><i class="fa-solid fa-book-open" style="color: #009688;"></i> PREAMBLE</h2>
            <p class="pre-conf-text">
                {{ $settings['pre_conf_preamble'] ?? 'Pre-conference preamble will appear here.' }}
            </p>
        </div>

        <!-- KEY OBJECTIVES -->
        <div class="pre-conf-section" style="border-top-color: #f59e0b;">
            <h2 class="pre-conf-title"><i class="fa-solid fa-bullseye" style="color: #f59e0b;"></i> KEY OBJECTIVES</h2>
            <ul class="obj-list">
                @for($i = 1; $i <= 20; $i++)
                    @if(!empty($settings['pre_conf_obj_'.$i]))
                        <li>{{ $settings['pre_conf_obj_'.$i] }}</li>
                    @endif
                @endfor
            </ul>
        </div>

        <!-- SCHEDULE -->
        <div class="pre-conf-section" style="border-top-color: #3b82f6;">
            <h2 class="pre-conf-title"><i class="fa-regular fa-calendar-days" style="color: #3b82f6;"></i> SCHEDULE FOR THE PRE-CONFERENCE</h2>
            
            <div class="schedule-note">
                <i class="fa-solid fa-circle-info"></i> {{ $settings['pre_conf_schedule_note'] ?? 'Proposed date: TBD | Venue: TBD | Mode: Hybrid' }}
            </div>

            <div class="schedule-table-wrap">
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th style="width: 6%; text-align: center;">S.No</th>
                            <th style="width: 28%; text-align: center;">Resource Persons</th>
                            <th style="width: 40%;">Affiliation</th>
                            <th style="width: 26%;">Expertise</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sno = 1; @endphp
                        @for($i = 1; $i <= 30; $i++)
                            @if(!empty($settings['pre_conf_speaker_'.$i.'_name']))
                            <tr style="border-bottom: 1px solid #e2e8f0;">
                                <td style="text-align: center; vertical-align: middle; font-weight: 600; color: #64748b; font-size: 1rem;">{{ $sno++ }}.</td>
                                <td style="text-align: center; vertical-align: middle; padding: 18px 12px;">
                                    @if(!empty($settings['pre_conf_speaker_'.$i.'_image']))
                                    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 5px; display: inline-block; box-shadow: 0 2px 8px rgba(0,0,0,0.05); margin-bottom: 8px;">
                                        <img src="{{ asset($settings['pre_conf_speaker_'.$i.'_image']) }}" alt="{{ $settings['pre_conf_speaker_'.$i.'_name'] }}" style="width: 110px; height: 110px; object-fit: cover; border-radius: 8px; display: block;">
                                    </div>
                                    @endif
                                    <div style="font-weight: 800; color: #0f172a; font-size: 0.98rem; line-height: 1.3;">{{ $settings['pre_conf_speaker_'.$i.'_name'] }}</div>
                                </td>
                                <td style="vertical-align: middle; color: #334155; line-height: 1.6; font-size: 0.95rem;">{{ $settings['pre_conf_speaker_'.$i.'_affiliation'] ?? '' }}</td>
                                <td style="vertical-align: middle; color: #475569; line-height: 1.6; font-size: 0.95rem;">{{ $settings['pre_conf_speaker_'.$i.'_expertise'] ?? '' }}</td>
                            </tr>
                            @endif
                        @endfor
                        @if(!empty($settings['pre_conf_panel']))
                        <tr style="background: #f8fafc;">
                            <td style="text-align: center; vertical-align: middle; font-weight: 600; color: #64748b; font-size: 1rem;">{{ $sno }}.</td>
                            <td colspan="3" style="vertical-align: middle; padding: 20px 24px;"><strong style="color: #0f172a; font-size: 1rem;">{{ $settings['pre_conf_panel'] }}</strong></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@include('sections.footer')

@endsection
