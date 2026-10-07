@extends('layouts.admin_cms')

@section('header_title', 'Distinguished Awards CMS')

@section('content')
<style>
    .cms-header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }
    .cms-title-wrap {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .cms-icon-badge {
        width: 46px;
        height: 46px;
        background: rgba(0, 150, 136, 0.12);
        color: #009688;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }
    .cms-page-heading {
        margin: 0;
        font-size: 1.55rem;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.3px;
    }
    .cms-page-sub {
        margin: 3px 0 0 0;
        font-size: 0.9rem;
        color: #64748b;
    }
    .btn-view-live {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 9px 18px;
        background: #ffffff;
        color: #0f172a;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.88rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .btn-view-live:hover {
        background: #f8fafc;
        border-color: #009688;
        color: #009688;
        transform: translateY(-1px);
    }

    /* Live Visual Preview Frame */
    .preview-box-container {
        background: #0f172a;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid #1e293b;
        margin-bottom: 35px;
        box-shadow: 0 12px 35px rgba(15, 23, 42, 0.15);
    }
    .preview-topbar {
        background: #1e293b;
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .preview-badge-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(0, 150, 136, 0.2);
        color: #2dd4bf;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        padding: 4px 12px;
        border-radius: 20px;
        border: 1px solid rgba(45, 212, 191, 0.3);
    }
    .preview-canvas {
        background: #ffffff;
        padding: 40px 20px 50px 20px;
    }

    /* Form Section Cards */
    .config-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        padding: 28px;
        margin-bottom: 25px;
    }
    .section-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 22px;
        padding-bottom: 14px;
        border-bottom: 1px solid #f1f5f9;
    }
    .section-title-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .section-num-icon {
        font-size: 1.15rem;
        font-weight: 800;
        color: #009688;
    }
    .section-title {
        font-size: 1.18rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }
    .section-helper {
        font-size: 0.85rem;
        color: #64748b;
        margin-top: 2px;
    }

    .form-group {
        margin-bottom: 18px;
    }
    .form-label {
        display: block;
        font-weight: 700;
        color: #334155;
        margin-bottom: 7px;
        font-size: 0.88rem;
    }
    .form-control {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.92rem;
        color: #0f172a;
        transition: all 0.2s;
        box-sizing: border-box;
        background: #ffffff;
    }
    .form-control:focus {
        border-color: #009688;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 150, 136, 0.12);
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .grid-3 {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 16px;
    }

    /* Award Item Card Box */
    .award-card-editor {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 16px;
        transition: border-color 0.2s ease;
    }
    .award-card-editor:hover {
        border-color: #94a3b8;
    }
    .award-card-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #cbd5e1;
    }
    .award-badge-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #e6fffa;
        color: #00796b;
        font-weight: 800;
        font-size: 0.82rem;
        padding: 4px 10px;
        border-radius: 6px;
        border: 1px solid #b2f5ea;
    }
    .btn-delete-item {
        background: #fee2e2;
        color: #dc2626;
        border: 1px solid #fca5a5;
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }
    .btn-delete-item:hover {
        background: #dc2626;
        color: #ffffff;
    }

    .btn-add {
        background: #f0fdf4;
        color: #16a34a;
        border: 1.5px dashed #86efac;
        padding: 9px 18px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.88rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }
    .btn-add:hover {
        background: #dcfce7;
        border-color: #22c55e;
        color: #15803d;
    }

    .btn-save {
        background: #009688;
        color: #ffffff;
        border: none;
        padding: 12px 34px;
        border-radius: 8px;
        font-weight: 800;
        font-size: 1rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 12px rgba(0, 150, 136, 0.25);
        transition: all 0.2s;
    }
    .btn-save:hover {
        background: #00796b;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(0, 150, 136, 0.35);
    }

    .success-alert {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
        border-radius: 8px;
        padding: 14px 20px;
        margin-bottom: 22px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .grid-2, .grid-3 { grid-template-columns: 1fr; }
    }
</style>

<!-- Top Title Header Row -->
<div class="cms-header-row">
    <div class="cms-title-wrap">
        <div class="cms-icon-badge">
            <i class="fa-solid fa-trophy"></i>
        </div>
        <div>
            <h1 class="cms-page-heading">Distinguished Awards CMS</h1>
            <p class="cms-page-sub">Customize the banner headlines, distinguished awards categories, cash prizes, and announcements dynamically in real time.</p>
        </div>
    </div>
    <a href="{{ route('awards') }}" target="_blank" class="btn-view-live">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
    </a>
</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<!-- LIVE VISUAL PREVIEW SECTION -->
<div class="preview-box-container">
    <div class="preview-topbar">
        <div class="preview-badge-pill">
            <i class="fa-solid fa-eye"></i> LIVE VISUAL PREVIEW
        </div>
        <span style="font-size: 0.8rem; color: #94a3b8;">Real-time Awards Page Preview</span>
    </div>

    <!-- Top Banner Preview -->
    <div style="background: linear-gradient(135deg, #0a192f 0%, #1e3a8a 100%); padding: 35px 20px; text-align: center; color: white;">
        <h2 id="prev-banner-title" style="margin: 0; font-size: 1.8rem; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">
            {{ $settings['banner_awards_title'] ?? $settings['awards_banner_title'] ?? 'CONFERENCE AWARDS' }}
        </h2>
    </div>

    <!-- Live Card Canvas -->
    <div class="preview-canvas">
        
        <!-- Section Header Preview -->
        <div style="text-align: center; margin-bottom: 35px;">
            <h3 id="prev-section-title" style="margin: 0 0 10px 0; color: #0f172a; font-weight: 800; font-size: 1.8rem; text-transform: uppercase;">
                {{ $settings['awards_section_title'] ?? 'DISTINGUISHED AWARDS' }}
            </h3>
            <div style="width: 50px; height: 3px; background-color: #009688; margin: 0 auto 12px auto; border-radius: 2px;"></div>
            <p id="prev-section-sub" style="max-width: 650px; margin: 0 auto; color: #64748b; font-size: 0.95rem; line-height: 1.5;">
                {{ $settings['awards_section_sub'] ?? 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.' }}
            </p>
        </div>

        <!-- Awards Card Box Preview -->
        <div id="prev-awards-box" style="max-width: 640px; margin: 0 auto; border: 2px solid #8da8f6; background-color: #f6fafe; border-radius: 6px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
            
            <div id="prev-awards-rows-wrapper">
                @php
                    $count = (int)($settings['awards_count'] ?? 3);
                @endphp
                @for($i = 1; $i <= $count; $i++)
                    @if(isset($settings['award_' . $i . '_title']))
                    <div class="prev-row-item" style="padding: 22px 25px; border-bottom: 2px solid #8da8f6;">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 15px;">
                            <div style="width: 45px; flex-shrink: 0;">
                                <i class="{{ $settings['award_' . $i . '_icon'] ?? 'fa-solid fa-award' }}" style="font-size: 2.3rem; color: #f59e0b;"></i>
                            </div>
                            <div style="flex: 1; text-align: center;">
                                <h4 style="margin: 0; color: #1e3250; font-size: 1.15rem; font-weight: 500; font-family: Georgia, serif; line-height: 1.4;">
                                    {!! nl2br(e($settings['award_' . $i . '_title'])) !!}
                                </h4>
                            </div>
                            <div style="min-width: 100px; text-align: right; font-size: 1.25rem; font-weight: 800; color: #1e3250;">
                                {{ $settings['award_' . $i . '_amount'] ?? '₹ 25,000' }}
                            </div>
                        </div>
                        <div style="margin-top: 14px; text-align: center;">
                            <button type="button" style="background: #009688; color: white; padding: 7px 22px; border: none; border-radius: 4px; font-weight: 700; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: default;">APPLY</button>
                        </div>
                    </div>
                    @endif
                @endfor
            </div>

            <!-- Bottom Navy Banner Preview -->
            <div style="background-color: #154770; padding: 18px 24px; display: flex; align-items: center; gap: 18px; justify-content: center; text-align: center;">
                <div>
                    <i id="prev-footer-icon" class="{{ $settings['awards_footer_icon'] ?? 'fa-solid fa-medal' }}" style="font-size: 2rem; color: #f59e0b;"></i>
                </div>
                <h4 id="prev-footer-note" style="margin: 0; color: #ffffff; font-size: 1rem; font-weight: 600; line-height: 1.45;">
                    {!! nl2br(e($settings['awards_footer_note'] ?? "Prizes will be awarded for best Oral, Poster\nPresentations and Best Innovation Pitch")) !!}
                </h4>
            </div>

        </div>

    </div>
</div>

<!-- CMS EDIT FORM -->
<form method="POST" action="{{ route('admin.awards.settings.update') }}">
    @csrf

    <!-- SECTION 1: HERO BANNER & HEADINGS -->
    <div class="config-card">
        <div class="section-head">
            <div class="section-title-wrap">
                <span class="section-num-icon">H 1.</span>
                <div>
                    <h2 class="section-title">Hero Banner & Section Headlines</h2>
                    <p class="section-helper">Customize the top dark navy banner title and page headings.</p>
                </div>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Main Header Banner Title</label>
                <input type="text" 
                       id="input_banner_title" 
                       name="awards_banner_title" 
                       class="form-control" 
                       value="{{ $settings['banner_awards_title'] ?? $settings['awards_banner_title'] ?? 'CONFERENCE AWARDS' }}"
                       oninput="document.getElementById('prev-banner-title').innerText = this.value">
            </div>

            <div class="form-group">
                <label class="form-label">Section Heading Title</label>
                <input type="text" 
                       id="input_section_title" 
                       name="awards_section_title" 
                       class="form-control" 
                       value="{{ $settings['awards_section_title'] ?? 'DISTINGUISHED AWARDS' }}"
                       oninput="document.getElementById('prev-section-title').innerText = this.value">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Section Subtitle / Description Text</label>
            <textarea id="input_section_sub" 
                      name="awards_section_sub" 
                      class="form-control" 
                      rows="2"
                      oninput="document.getElementById('prev-section-sub').innerText = this.value">{{ $settings['awards_section_sub'] ?? 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.' }}</textarea>
        </div>
    </div>

    <!-- SECTION 2: DISTINGUISHED AWARDS LIST -->
    <div class="config-card">
        <div class="section-head">
            <div class="section-title-wrap">
                <span class="section-num-icon"><i class="fa-solid fa-award"></i> 2.</span>
                <div>
                    <h2 class="section-title">Distinguished Awards Categories & Prizes</h2>
                    <p class="section-helper">Add, edit, or remove specific award categories, cash prizes, and proforma download links.</p>
                </div>
            </div>
            <button type="button" class="btn-add" onclick="addAwardCard()">
                <i class="fa-solid fa-plus"></i> Add Award
            </button>
        </div>

        <div id="awards-items-wrapper">
            @php
                $awardsCount = (int)($settings['awards_count'] ?? 3);
            @endphp
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['award_' . $i . '_title']))
                <div class="award-card-editor">
                    <div class="award-card-top">
                        <div class="award-badge-tag">
                            <i class="fa-solid fa-medal"></i> Award Category #{{ $i }}
                        </div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.award-card-editor').remove(); syncPreview();">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </div>

                    <div class="grid-3">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Award Title (Supports Line Breaks)</label>
                            <textarea name="award_titles[]" class="form-control field-title" rows="2" oninput="syncPreview()">{{ $settings['award_' . $i . '_title'] }}</textarea>
                        </div>
                        
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Cash Prize Amount</label>
                            <input type="text" name="award_amounts[]" class="form-control field-amount" value="{{ $settings['award_' . $i . '_amount'] ?? '₹ 25,000' }}" oninput="syncPreview()">
                        </div>

                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">FontAwesome Icon</label>
                            <input type="text" name="award_icons[]" class="form-control field-icon" value="{{ $settings['award_' . $i . '_icon'] ?? 'fa-solid fa-award' }}" oninput="syncPreview()">
                        </div>
                    </div>

                    <div class="form-group" style="margin-top: 14px; margin-bottom: 0;">
                        <label class="form-label">Nomination Proforma Type / Download Link</label>
                        <select name="award_proformas[]" class="form-control">
                            <option value="download.proforma" {{ ($settings['award_' . $i . '_proforma'] ?? '') == 'download.proforma' ? 'selected' : '' }}>Faculty Award Proforma (download.proforma)</option>
                            <option value="download.proforma_scholar" {{ ($settings['award_' . $i . '_proforma'] ?? '') == 'download.proforma_scholar' ? 'selected' : '' }}>Scholar Award Proforma (download.proforma_scholar)</option>
                            <option value="download.proforma_innovator" {{ ($settings['award_' . $i . '_proforma'] ?? '') == 'download.proforma_innovator' ? 'selected' : '' }}>Innovator & Entrepreneur Proforma (download.proforma_innovator)</option>
                        </select>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 3: BOTTOM BLUE BANNER NOTE -->
    <div class="config-card">
        <div class="section-head">
            <div class="section-title-wrap">
                <span class="section-num-icon"><i class="fa-solid fa-bullhorn"></i> 3.</span>
                <div>
                    <h2 class="section-title">Bottom Prize Announcement Banner</h2>
                    <p class="section-helper">Customize the bottom navy highlight banner for oral, poster, and pitch prizes.</p>
                </div>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Banner Icon Class</label>
                <input type="text" 
                       name="awards_footer_icon" 
                       class="form-control" 
                       value="{{ $settings['awards_footer_icon'] ?? 'fa-solid fa-medal' }}"
                       oninput="document.getElementById('prev-footer-icon').className = this.value">
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Banner Announcement Text (Supports line breaks)</label>
                <textarea name="awards_footer_note" 
                          class="form-control" 
                          rows="2"
                          oninput="document.getElementById('prev-footer-note').innerHTML = this.value.replace(/\n/g, '<br>')">{{ $settings['awards_footer_note'] ?? "Prizes will be awarded for best Oral, Poster\nPresentations and Best Innovation Pitch" }}</textarea>
            </div>
        </div>
    </div>

    <!-- STICKY BOTTOM SAVE BAR -->
    <div style="position: sticky; bottom: 20px; z-index: 100; display: flex; justify-content: flex-end; background: rgba(255, 255, 255, 0.95); padding: 14px 24px; border-radius: 12px; box-shadow: 0 8px 30px rgba(0,0,0,0.12); backdrop-filter: blur(8px); border: 1.5px solid #e2e8f0; margin-top: 25px;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Awards Settings
        </button>
    </div>

</form>

<script>
function addAwardCard() {
    const wrapper = document.getElementById('awards-items-wrapper');
    const index = wrapper.querySelectorAll('.award-card-editor').length + 1;

    const html = `
    <div class="award-card-editor">
        <div class="award-card-top">
            <div class="award-badge-tag">
                <i class="fa-solid fa-medal"></i> New Award Category #${index}
            </div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.award-card-editor').remove(); syncPreview();">
                <i class="fa-solid fa-trash"></i> Delete
            </button>
        </div>

        <div class="grid-3">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Award Title</label>
                <textarea name="award_titles[]" class="form-control field-title" rows="2" placeholder="e.g. Young Innovator Award" oninput="syncPreview()"></textarea>
            </div>
            
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Cash Prize Amount</label>
                <input type="text" name="award_amounts[]" class="form-control field-amount" value="₹ 25,000" placeholder="₹ 25,000" oninput="syncPreview()">
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">FontAwesome Icon</label>
                <input type="text" name="award_icons[]" class="form-control field-icon" value="fa-solid fa-award" oninput="syncPreview()">
            </div>
        </div>

        <div class="form-group" style="margin-top: 14px; margin-bottom: 0;">
            <label class="form-label">Nomination Proforma Type / Download Link</label>
            <select name="award_proformas[]" class="form-control">
                <option value="download.proforma">Faculty Award Proforma (download.proforma)</option>
                <option value="download.proforma_scholar">Scholar Award Proforma (download.proforma_scholar)</option>
                <option value="download.proforma_innovator">Innovator & Entrepreneur Proforma (download.proforma_innovator)</option>
            </select>
        </div>
    </div>`;

    wrapper.insertAdjacentHTML('beforeend', html);
    syncPreview();
}

function syncPreview() {
    const editors = document.querySelectorAll('.award-card-editor');
    const prevWrapper = document.getElementById('prev-awards-rows-wrapper');
    prevWrapper.innerHTML = '';

    editors.forEach((editor, idx) => {
        const title = editor.querySelector('.field-title')?.value || 'Award Title';
        const amount = editor.querySelector('.field-amount')?.value || '₹ 25,000';
        const icon = editor.querySelector('.field-icon')?.value || 'fa-solid fa-award';

        const rowHtml = `
        <div class="prev-row-item" style="padding: 22px 25px; border-bottom: 2px solid #8da8f6;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 15px;">
                <div style="width: 45px; flex-shrink: 0;">
                    <i class="${icon}" style="font-size: 2.3rem; color: #f59e0b;"></i>
                </div>
                <div style="flex: 1; text-align: center;">
                    <h4 style="margin: 0; color: #1e3250; font-size: 1.15rem; font-weight: 500; font-family: Georgia, serif; line-height: 1.4;">
                        ${title.replace(/\n/g, '<br>')}
                    </h4>
                </div>
                <div style="min-width: 100px; text-align: right; font-size: 1.25rem; font-weight: 800; color: #1e3250;">
                    ${amount}
                </div>
            </div>
            <div style="margin-top: 14px; text-align: center;">
                <button type="button" style="background: #009688; color: white; padding: 7px 22px; border: none; border-radius: 4px; font-weight: 700; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.5px; cursor: default;">APPLY</button>
            </div>
        </div>`;
        prevWrapper.insertAdjacentHTML('beforeend', rowHtml);
    });
}
</script>
@endsection
