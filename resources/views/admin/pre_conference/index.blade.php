@extends('layouts.admin_cms')

@section('header_title', 'Pre-Conference Workshop CMS')

@section('content')
<style>
    .preconf-admin-wrap {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    /* Live Preview Box */
    .preconf-live-box {
        background: #f8fafc;
        border-radius: 20px;
        border: 2px solid #e2e8f0;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06);
        position: relative;
    }

    .preconf-preview-watermark {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #009688;
        background: rgba(255, 255, 255, 0.9);
        padding: 5px 14px;
        border-radius: 20px;
        border: 1px solid #b2dfdb;
        display: flex;
        align-items: center;
        gap: 6px;
        z-index: 10;
        backdrop-filter: blur(4px);
    }

    .admin-card-section {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .form-group {
        margin-bottom: 20px;
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
        border-color: #009688;
        outline: none;
    }

    .obj-item-row {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 10px;
        transition: all 0.2s ease;
    }

    .obj-item-row:hover {
        border-color: #f59e0b;
        background: #ffffff;
    }
</style>

<div class="preconf-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-person-chalkboard" style="color: #009688; margin-right: 8px;"></i> Pre-Conference Workshop CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize the banner headlines, preamble statement, and key objectives dynamically in real time.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="{{ route('pre-conference') }}" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW BOX (Exact 1:1 match to Frontend & Image) -->
    <div class="preconf-live-box">
        <div class="preconf-preview-watermark">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <!-- Banner Preview -->
        <div style="background: linear-gradient(180deg, #0b1528 0%, #0f1d38 100%); padding: 60px 20px 50px; text-align: center; color: #ffffff;">
            <h1 style="text-transform: uppercase; font-size: 2.2rem; font-weight: 900; margin: 0 0 12px 0; color: #ffffff;">
                {{ $settings['pre_conf_hero_title'] ?? 'PRE-CONFERENCE WORKSHOP' }}
            </h1>
            <p style="font-size: 1.05rem; color: #94a3b8; margin: 0 auto; max-width: 750px; line-height: 1.6; font-weight: 500;">
                {{ $settings['pre_conf_hero_sub1'] ?? 'Pre-Conference Consultative Workshop on' }}<br>
                <strong style="color: #009688; font-size: 1.25rem; font-weight: 800; display: inline-block; margin: 4px 0;">
                    {{ $settings['pre_conf_hero_sub2'] ?? 'GLOBAL ONE HEALTH CONFLUENCE 2026' }}
                </strong><br>
                <span style="color: #cbd5e1;">{{ $settings['pre_conf_hero_sub3'] ?? 'Bridging Microbes, Molecules & Mankind for Sustainability' }}</span>
            </p>
        </div>

        <!-- Cards Preview -->
        <div style="padding: 40px 30px 45px; display: flex; flex-direction: column; gap: 28px; max-width: 1050px; margin: 0 auto;">
            
            <!-- Preamble Preview -->
            <div style="background: #ffffff; border-radius: 16px; border: 1.5px solid #e2e8f0; border-top: 5px solid #009688; padding: 32px 30px; box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);">
                <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 16px 0; display: flex; align-items: center; gap: 10px;">
                    <i class="{{ $settings['pre_conf_preamble_icon'] ?? 'fa-solid fa-book-open' }}" style="color: #009688;"></i> 
                    {{ $settings['pre_conf_preamble_title'] ?? 'PREAMBLE' }}
                </h3>
                <p style="margin: 0; color: #475569; font-size: 0.98rem; line-height: 1.8; text-align: justify;">
                    {{ $settings['pre_conf_preamble'] ?? 'Pre-conference preamble text will appear here.' }}
                </p>
            </div>

            <!-- Objectives Preview -->
            <div style="background: #ffffff; border-radius: 16px; border: 1.5px solid #e2e8f0; border-top: 5px solid #f59e0b; padding: 32px 30px; box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);">
                <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 20px 0; display: flex; align-items: center; gap: 10px;">
                    <i class="{{ $settings['pre_conf_obj_icon'] ?? 'fa-regular fa-compass' }}" style="color: #f59e0b;"></i> 
                    {{ $settings['pre_conf_obj_title'] ?? 'KEY OBJECTIVES' }}
                </h3>
                @php
                    $previewObjs = [];
                    for ($i = 1; $i <= 20; $i++) {
                        if (!empty($settings['pre_conf_obj_' . $i])) {
                            $previewObjs[] = trim($settings['pre_conf_obj_' . $i]);
                        }
                    }
                    if (empty($previewObjs)) {
                        $previewObjs = [
                            'To obtain expert inputs for the scientific and thematic planning of Global One Health Confluence 2026.',
                            'To facilitate interdisciplinary dialogue on human health, animal health, environmental health and allied One Health domains.',
                            'To discuss regional priorities related to antimicrobial resistance, infectious diseases, zoonotic diseases, veterinary public health, IKS and public health.',
                            'To integrate diverse expert perspectives into the scientific sessions and thematic discussions of GOHC 2026.',
                            'To strengthen institutional and professional collaboration towards advancing sustainable and integrated One Health approaches.'
                        ];
                    }
                @endphp
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px;">
                    @foreach($previewObjs as $obj)
                        <li style="display: flex; align-items: flex-start; gap: 12px; color: #334155; font-size: 0.98rem; line-height: 1.6; font-weight: 500;">
                            <i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.15rem; flex-shrink: 0; margin-top: 2px;"></i>
                            <span>{{ $obj }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <!-- 2. EDIT FORM (Hero, Preamble & Objectives) -->
    <form method="POST" action="{{ route('admin.pre_conference.update') }}">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">

            <!-- SECTION 1: HERO BANNER SETTINGS -->
            <div class="admin-card-section">
                <h3 style="margin: 0 0 16px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-heading" style="color: #009688;"></i> 1. Hero Banner Headlines
                </h3>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 22px;">Customize the top dark navy banner title and the 3 tagline lines.</p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">Main Header Title</label>
                        <input type="text" name="pre_conf_hero_title" value="{{ $settings['pre_conf_hero_title'] ?? 'PRE-CONFERENCE WORKSHOP' }}" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subtitle Line 1</label>
                        <input type="text" name="pre_conf_hero_sub1" value="{{ $settings['pre_conf_hero_sub1'] ?? 'Pre-Conference Consultative Workshop on' }}" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Highlighted Conference Name (Teal)</label>
                        <input type="text" name="pre_conf_hero_sub2" value="{{ $settings['pre_conf_hero_sub2'] ?? 'GLOBAL ONE HEALTH CONFLUENCE 2026' }}" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subtitle Line 3 / Theme</label>
                        <input type="text" name="pre_conf_hero_sub3" value="{{ $settings['pre_conf_hero_sub3'] ?? 'Bridging Microbes, Molecules & Mankind for Sustainability' }}" class="form-input" required>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: PREAMBLE CARD SETTINGS -->
            <div class="admin-card-section">
                <h3 style="margin: 0 0 16px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-book-open" style="color: #009688;"></i> 2. Preamble Section
                </h3>
                <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 22px;">Edit the title, icon, and comprehensive preamble text.</p>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Preamble Title</label>
                        <input type="text" name="pre_conf_preamble_title" value="{{ $settings['pre_conf_preamble_title'] ?? 'PREAMBLE' }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Preamble Icon (FontAwesome)</label>
                        <select name="pre_conf_preamble_icon" class="form-input" style="background: #fff;">
                            <option value="fa-solid fa-book-open" {{ ($settings['pre_conf_preamble_icon'] ?? '') == 'fa-solid fa-book-open' ? 'selected' : '' }}>📖 Book Open (fa-book-open)</option>
                            <option value="fa-solid fa-file-lines" {{ ($settings['pre_conf_preamble_icon'] ?? '') == 'fa-solid fa-file-lines' ? 'selected' : '' }}>📄 Document Lines (fa-file-lines)</option>
                            <option value="fa-solid fa-quote-left" {{ ($settings['pre_conf_preamble_icon'] ?? '') == 'fa-solid fa-quote-left' ? 'selected' : '' }}>❝ Quote (fa-quote-left)</option>
                            <option value="fa-solid fa-circle-info" {{ ($settings['pre_conf_preamble_icon'] ?? '') == 'fa-solid fa-circle-info' ? 'selected' : '' }}>ℹ️ Info (fa-circle-info)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Preamble Content Text</label>
                    <textarea name="pre_conf_preamble" rows="8" class="form-input" style="resize: vertical; line-height: 1.7; font-size: 0.95rem;" required>{{ $settings['pre_conf_preamble'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- SECTION 3: KEY OBJECTIVES SETTINGS -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-bullseye" style="color: #f59e0b;"></i> 3. Key Objectives List
                        </h3>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0;">Add, edit, or remove specific bullet objectives.</p>
                    </div>
                    <button type="button" onclick="addNewObjectiveRow()" style="background: #fffbeb; color: #b45309; border: 1.5px solid #fde68a; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Objective
                    </button>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 22px;">
                    <div>
                        <label class="form-label">Objectives Section Title</label>
                        <input type="text" name="pre_conf_obj_title" value="{{ $settings['pre_conf_obj_title'] ?? 'KEY OBJECTIVES' }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Objectives Icon (FontAwesome)</label>
                        <select name="pre_conf_obj_icon" class="form-input" style="background: #fff;">
                            <option value="fa-regular fa-compass" {{ ($settings['pre_conf_obj_icon'] ?? '') == 'fa-regular fa-compass' ? 'selected' : '' }}>🧭 Compass (fa-compass)</option>
                            <option value="fa-solid fa-bullseye" {{ ($settings['pre_conf_obj_icon'] ?? '') == 'fa-solid fa-bullseye' ? 'selected' : '' }}>🎯 Bullseye (fa-bullseye)</option>
                            <option value="fa-solid fa-list-check" {{ ($settings['pre_conf_obj_icon'] ?? '') == 'fa-solid fa-list-check' ? 'selected' : '' }}>☑️ List Check (fa-list-check)</option>
                            <option value="fa-solid fa-lightbulb" {{ ($settings['pre_conf_obj_icon'] ?? '') == 'fa-solid fa-lightbulb' ? 'selected' : '' }}>💡 Lightbulb (fa-lightbulb)</option>
                        </select>
                    </div>
                </div>

                <div id="objectives-container" style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($previewObjs as $idx => $objText)
                        <div class="obj-item-row">
                            <i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.25rem;"></i>
                            <input type="text" name="pre_conf_obj[]" value="{{ $objText }}" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter objective statement...">
                            <button type="button" onclick="this.closest('.obj-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Remove Objective">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div style="text-align: right; margin-bottom: 30px;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #009688, #00796b); color: #ffffff; padding: 14px 34px; border-radius: 10px; font-weight: 800; font-size: 1.05rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 150, 136, 0.35); display: inline-flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Pre-Conference Settings
                </button>
            </div>

        </div>
    </form>

</div>

<script>
    function addNewObjectiveRow() {
        const container = document.getElementById('objectives-container');
        const div = document.createElement('div');
        div.className = 'obj-item-row';
        div.innerHTML = `
            <i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.25rem;"></i>
            <input type="text" name="pre_conf_obj[]" value="" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter new objective statement...">
            <button type="button" onclick="this.closest('.obj-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Remove Objective">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }
</script>
@endsection
