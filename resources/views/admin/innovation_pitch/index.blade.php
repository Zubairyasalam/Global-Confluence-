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
                <i class="fa-solid fa-lightbulb" style="color: #00A896; margin-right: 8px;"></i> Innovation Pitch CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize pitch competition criteria, evaluation metrics, incubation opportunities, and guidelines with full Add/Edit/Delete.</p>
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

        $defaultGuidelines = [
            'Problem Statement & Impact: Significance of the healthcare, veterinary, or environmental challenge addressed.',
            'Technological Novelty: Originality of the innovation, prototype readiness, and intellectual property potential.',
            'Commercial Viability: Market feasibility, scalable business model, regulatory pathway, and financial sustainability.',
            'Pitch Deck Specifications: Maximum 10 presentation slides covering problem, solution, traction, team, and funding requirements.',
            'Jury Interaction: Live 3-minute Q&A with venture capitalists, translational researchers, and industry leaders.'
        ];

        $guidelineList = !empty($guidelines) ? $guidelines : $defaultGuidelines;
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

                <!-- Criteria Preview -->
                <h4 style="color: #0f172a; font-size: 1.1rem; font-weight: 700; margin-bottom: 12px;"><i class="fa-solid fa-clipboard-check" style="color: #00A896;"></i> Evaluation Criteria & Submission Details</h4>
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
            </div>

            <!-- Dynamic Guidelines Items (Add / Edit / Delete) -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-list-ol" style="color: #00A896;"></i> 3. Dynamic Evaluation Criteria & Guidelines
                        </h3>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0;">Add, edit in place, or delete pitch evaluation criteria.</p>
                    </div>
                    <button type="button" onclick="addPitchCriterionRow()" style="background: #e6fffa; color: #0d9488; border: 1.5px solid #99f6e4; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Criterion
                    </button>
                </div>

                <div id="pitch-guidelines-container" style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($guidelineList as $idx => $item)
                        <div class="dynamic-item-row">
                            <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem;"></i>
                            <input type="text" name="pitch_guideline_items[]" value="{{ $item }}" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter pitch criterion...">
                            <button type="button" onclick="this.closest('.dynamic-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Delete item">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div style="text-align: right; margin-top: 25px;">
                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 34px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Innovation Pitch Content
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
    function addPitchCriterionRow() {
        const container = document.getElementById('pitch-guidelines-container');
        const div = document.createElement('div');
        div.className = 'dynamic-item-row';
        div.innerHTML = `
            <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem;"></i>
            <input type="text" name="pitch_guideline_items[]" value="" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter new pitch criterion...">
            <button type="button" onclick="this.closest('.dynamic-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Delete item">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }
</script>
@endsection
