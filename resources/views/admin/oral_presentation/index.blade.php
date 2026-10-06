@extends('layouts.admin_cms')

@section('header_title', 'Oral Presentation CMS')

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

    .dynamic-item-row {
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

    .dynamic-item-row:hover {
        border-color: #00A896;
        background: #ffffff;
    }
</style>

<div class="event-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-microphone-lines" style="color: #00A896; margin-right: 8px;"></i> Oral Presentation CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize presentation rules, slide format specifications, abstract guidelines, and announcements with full Add/Edit/Delete.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/events/oral-presentation" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
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
        $bannerTitle = $settings['oral_banner_title'] ?? 'ORAL PRESENTATION';
        $sectionTitle = $settings['oral_section_title'] ?? 'Abstract Submission & Oral Presentation Guidelines';
        $announcement = $settings['oral_announcement'] ?? 'We are delighted to announce abstract submissions from scientists, academicians, healthcare professionals, research scholars, and students working across the One Health domains. Selected abstracts will be allotted slots for live oral presentations during dedicated technical track sessions.';

        $defaultGuidelines = [
            'Submit the abstract in MS-Word format. The abstract should be 250–300 words in length.',
            'Author names with institutional affiliations are to be provided immediately below the title.',
            'Provide the email ID of the corresponding author.',
            'Presenting author is to be marked with # and corresponding author with *',
            'Include 5 to 6 keywords at the end of the abstract.',
            'Upload the Abstract using the designated Google Form submission portal.',
            'Abstracts will be considered only after receipt of registration fee.'
        ];

        $guidelineList = !empty($guidelines) ? $guidelines : $defaultGuidelines;
    @endphp

    <!-- 1. LIVE VISUAL PREVIEW -->
    <div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.95); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <!-- Banner Preview -->
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
                    {{ $announcement }}
                </div>

                <!-- Spec Grid Preview -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 25px;">
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-clock" style="color: #00A896;"></i> Duration</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['oral_spec_duration'] ?? '8 mins presentation + 2 mins Q&A' }}</p>
                    </div>
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-file-powerpoint" style="color: #00A896;"></i> Slide Format</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['oral_spec_format'] ?? '16:9 Widescreen (PPTX / PDF)' }}</p>
                    </div>
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-language" style="color: #00A896;"></i> Language</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['oral_spec_lang'] ?? 'English (Official Conference Medium)' }}</p>
                    </div>
                </div>

                <!-- Guidelines Preview -->
                <h4 style="color: #0f172a; font-size: 1.1rem; font-weight: 700; margin-bottom: 12px;"><i class="fa-solid fa-circle-check" style="color: #00A896;"></i> Submission Guidelines</h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    @foreach($guidelineList as $g)
                        <li style="display: flex; align-items: flex-start; gap: 10px; color: #334155; font-size: 0.92rem; line-height: 1.6;">
                            <i class="fa-solid fa-check" style="color: #00A896; margin-top: 3px;"></i>
                            <span>{{ $g }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form action="{{ route('admin.oral_presentation.update') }}" method="POST">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">
            
            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> 1. Page Header & Announcements
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Hero Banner Title</label>
                        <input type="text" name="oral_banner_title" value="{{ $bannerTitle }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Main Section Heading</label>
                        <input type="text" name="oral_section_title" value="{{ $sectionTitle }}" class="form-input" required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="form-label">Announcement / Intro Paragraph</label>
                    <textarea name="oral_announcement" rows="4" class="form-input" required>{{ $announcement }}</textarea>
                </div>
            </div>

            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-list-check" style="color: #00A896;"></i> 2. Presentation Specifications
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Presentation Duration</label>
                        <input type="text" name="oral_spec_duration" value="{{ $settings['oral_spec_duration'] ?? '8 mins presentation + 2 mins Q&A' }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Slide Aspect Ratio & Format</label>
                        <input type="text" name="oral_spec_format" value="{{ $settings['oral_spec_format'] ?? '16:9 Widescreen (PPTX / PDF)' }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Official Language</label>
                        <input type="text" name="oral_spec_lang" value="{{ $settings['oral_spec_lang'] ?? 'English (Official Conference Medium)' }}" class="form-input">
                    </div>
                </div>
            </div>

            <!-- Dynamic Guidelines Items (Add / Edit / Delete) -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-list-ol" style="color: #00A896;"></i> 3. Dynamic Submission & Presentation Guidelines
                        </h3>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0;">Add new guidelines, edit existing points, or delete obsolete instructions.</p>
                    </div>
                    <button type="button" onclick="addGuidelineRow()" style="background: #e6fffa; color: #0d9488; border: 1.5px solid #99f6e4; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Guideline
                    </button>
                </div>

                <div id="guidelines-container" style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($guidelineList as $idx => $item)
                        <div class="dynamic-item-row">
                            <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem;"></i>
                            <input type="text" name="oral_guideline_items[]" value="{{ $item }}" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter guideline instruction...">
                            <button type="button" onclick="this.closest('.dynamic-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Delete item">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div style="text-align: right; margin-top: 25px;">
                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 34px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Oral Presentation Content
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
    function addGuidelineRow() {
        const container = document.getElementById('guidelines-container');
        const div = document.createElement('div');
        div.className = 'dynamic-item-row';
        div.innerHTML = `
            <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem;"></i>
            <input type="text" name="oral_guideline_items[]" value="" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter new guideline instruction...">
            <button type="button" onclick="this.closest('.dynamic-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Delete item">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }
</script>
@endsection
