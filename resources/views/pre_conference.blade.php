@extends('layouts.app')

@section('title', 'Pre-Conference Workshop | Global One Health Confluence 2026')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

<!-- Pre-Conference Hero Banner (Exact match to User Image) -->
<div class="preconf-hero-banner" style="background: linear-gradient(180deg, #0b1528 0%, #0f1d38 100%); padding: 90px 20px 80px; text-align: center; color: #ffffff; position: relative;">
    <div style="max-width: 950px; margin: 0 auto;">
        <h1 style="text-transform: uppercase; font-size: clamp(2.2rem, 4vw, 3.1rem); font-weight: 900; margin: 0 0 16px 0; letter-spacing: 0.5px; color: #ffffff; line-height: 1.2;">
            {{ $settings['pre_conf_hero_title'] ?? 'PRE-CONFERENCE WORKSHOP' }}
        </h1>
        <p style="font-size: 1.2rem; color: #94a3b8; margin: 0 auto; max-width: 850px; line-height: 1.65; font-weight: 500;">
            {{ $settings['pre_conf_hero_sub1'] ?? 'Pre-Conference Consultative Workshop on' }}<br>
            <strong style="color: #009688; font-size: clamp(1.25rem, 2.5vw, 1.55rem); font-weight: 800; display: inline-block; margin: 6px 0; letter-spacing: 0.5px;">
                {{ $settings['pre_conf_hero_sub2'] ?? 'GLOBAL ONE HEALTH CONFLUENCE 2026' }}
            </strong><br>
            <span style="color: #cbd5e1;">{{ $settings['pre_conf_hero_sub3'] ?? 'Bridging Microbes, Molecules & Mankind for Sustainability' }}</span>
        </p>
    </div>
</div>

<!-- Main Pre-Conference Content Section -->
<section style="background-color: #f8fafc; padding: 60px 0 80px; min-height: 60vh; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div style="max-width: 1140px; margin: 0 auto; padding: 0 20px; display: flex; flex-direction: column; gap: 36px;">

        <!-- 1. PREAMBLE CARD -->
        <div class="preconf-card card-preamble">
            <div class="preconf-card-accent accent-teal"></div>
            <h2 class="preconf-card-title">
                <i class="{{ $settings['pre_conf_preamble_icon'] ?? 'fa-solid fa-book-open' }}" style="color: #009688;"></i> 
                {{ $settings['pre_conf_preamble_title'] ?? 'PREAMBLE' }}
            </h2>
            <div class="preconf-card-body">
                <p style="margin: 0; color: #475569; font-size: 1.03rem; line-height: 1.85; text-align: justify;">
                    {{ $settings['pre_conf_preamble'] ?? 'The Pre-Conference Consultation of Global One Health Confluence 2026 aims to bring together eminent experts, academicians, researchers, healthcare professionals, policymakers and resource persons from diverse disciplines to provide focused and meaningful inputs for the scientific, thematic and collaborative planning of the conference.' }}
                </p>
            </div>
        </div>

        <!-- 2. KEY OBJECTIVES CARD -->
        <div class="preconf-card card-objectives">
            <div class="preconf-card-accent accent-amber"></div>
            <h2 class="preconf-card-title">
                <i class="{{ $settings['pre_conf_obj_icon'] ?? 'fa-regular fa-compass' }}" style="color: #f59e0b;"></i> 
                {{ $settings['pre_conf_obj_title'] ?? 'KEY OBJECTIVES' }}
            </h2>
            <div class="preconf-card-body">
                @php
                    $objectivesList = [];
                    for ($i = 1; $i <= 25; $i++) {
                        if (!empty($settings['pre_conf_obj_' . $i])) {
                            $objectivesList[] = trim($settings['pre_conf_obj_' . $i]);
                        }
                    }

                    // Default fallback if empty
                    if (empty($objectivesList)) {
                        $objectivesList = [
                            'To obtain expert inputs for the scientific and thematic planning of Global One Health Confluence 2026.',
                            'To facilitate interdisciplinary dialogue on human health, animal health, environmental health and allied One Health domains.',
                            'To discuss regional priorities related to antimicrobial resistance, infectious diseases, zoonotic diseases, veterinary public health, IKS and public health.',
                            'To integrate diverse expert perspectives into the scientific sessions and thematic discussions of GOHC 2026.',
                            'To strengthen institutional and professional collaboration towards advancing sustainable and integrated One Health approaches.'
                        ];
                    }
                @endphp

                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 18px;">
                    @foreach($objectivesList as $obj)
                        <li style="display: flex; align-items: flex-start; gap: 14px; color: #334155; font-size: 1.03rem; line-height: 1.65; font-weight: 500;">
                            <i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.25rem; flex-shrink: 0; margin-top: 3px;"></i>
                            <span>{{ $obj }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</section>

<style>
    .preconf-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1.5px solid #e2e8f0;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
        padding: 42px 40px 40px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .preconf-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
    }

    .preconf-card-accent {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
    }

    .accent-teal {
        background: linear-gradient(90deg, #009688, #26a69a);
    }

    .accent-amber {
        background: linear-gradient(90deg, #f59e0b, #d97706);
    }

    .preconf-card-title {
        font-size: 1.55rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 24px 0;
        display: flex;
        align-items: center;
        gap: 12px;
        letter-spacing: 0.5px;
    }

    .preconf-card-title i {
        font-size: 1.6rem;
    }

    @media (max-width: 768px) {
        .preconf-card {
            padding: 30px 22px 28px;
        }
        .preconf-card-title {
            font-size: 1.35rem;
        }
    }
</style>

@include('sections.footer')

@endsection
