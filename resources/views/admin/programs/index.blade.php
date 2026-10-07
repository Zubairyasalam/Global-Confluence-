@extends('layouts.admin_cms')

@section('header_title', 'Scientific Tracks & Thrust Areas CMS')

@section('content')
<style>
    .tracks-admin-wrap {
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

    .section-title {
        margin: 0 0 18px 0;
        font-size: 1.25rem;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 10px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 12px;
    }

    .item-card {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 16px;
        transition: all 0.2s ease;
    }

    .item-card:hover {
        border-color: #cbd5e1;
        background: #ffffff;
    }

    .btn-add-item {
        background: #f1f5f9;
        color: #0f172a;
        border: 1.5px dashed #94a3b8;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.95rem;
        cursor: pointer;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-add-item:hover {
        background: #e6f7f5;
        color: #00A896;
        border-color: #00A896;
    }
</style>

@php
    $bannerTitle = $settings['tracks_banner_title'] ?? 'SCIENTIFIC TRACKS & THRUST AREAS';
    $bannerSubtitle = $settings['tracks_banner_subtitle'] ?? 'Research and innovation at the confluence of human, animal, and environmental health. Discover the multidisciplinary tracks and focus areas shaping this conference.';
    $sectionBadge = $settings['tracks_section_badge'] ?? 'Conference Themes';
    $sectionTitle = $settings['tracks_section_title'] ?? 'Thrust Areas';
    $sectionDesc = $settings['tracks_section_desc'] ?? 'Explore the core conference tracks, thrust topics, and focus areas driving our collaborative approach to global One Health.';
    $referencesTitle = $settings['tracks_references_title'] ?? 'References';
    $refList = !empty($references) ? $references : [
        'Qasim, S., Khan, A. U., & Raza, A. (2024). Zoonotic diseases and antimicrobial resistance: a dual threat at the human–animal interface.',
        'Bett, B., et al. (2024). Enhancing public health: Five key takeaways on zoonotic disease and antimicrobial resistance surveillance. ILRI.',
        'Constructing a One Health governance architecture: a systematic review. (2024). PMC11631453.',
        'Analyzing One Health governance and implementation challenges. (2025). BMJ Open, 16(7), e115471.',
        'Zielinski, C., et al. (2023). Time to treat the climate and nature crisis as one indivisible global health emergency. BMC Global and Public Health.',
        'Sustainability in Pharma Industry [white paper]. (2025). Indian Pharmaceutical Alliance.'
    ];
@endphp

<div class="tracks-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-flask" style="color: #00A896; margin-right: 8px;"></i> Scientific Tracks & Thrust Areas CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize the banner, section headers, tracks content, focus areas, and citations in real time.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/scientific-themes" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW -->
    <div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.9); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <!-- Banner Preview -->
        <div style="background: linear-gradient(135deg, #0a192f 0%, #0f172a 50%, #112240 100%); padding: 50px 20px 45px; text-align: center; color: #ffffff;">
            <h1 style="text-transform: uppercase; font-size: 1.8rem; font-weight: 800; letter-spacing: 1px; color: #ffffff; margin: 0 0 8px 0;">
                {{ $bannerTitle }}
            </h1>
            <p style="color: #cbd5e1; font-size: 0.95rem; margin: 0; font-weight: 400; max-width: 750px; margin-left: auto; margin-right: auto;">
                {{ $bannerSubtitle }}
            </p>
        </div>

        <!-- Content Preview -->
        <div style="padding: 35px 25px; max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="color: #00A896; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 5px;">
                    {{ $sectionBadge }}
                </div>
                <h3 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">
                    {!! preg_replace('/(areas)/i', '<span style="color: #00A896;">$1</span>', e($sectionTitle)) !!}
                </h3>
                <div style="width: 50px; height: 3px; background: #00A896; margin: 0 auto 12px; border-radius: 2px;"></div>
                <p style="color: #64748b; font-size: 0.95rem; max-width: 700px; margin: 0 auto;">
                    {{ $sectionDesc }}
                </p>
            </div>

            <!-- Mini Tracks List Preview -->
            <div style="display: flex; flex-direction: column; gap: 18px; margin-bottom: 25px;">
                @foreach($tracks->take(3) as $t)
                    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                        <h4 style="font-size: 1.05rem; font-weight: 800; color: #0f172a; margin: 0 0 10px 0; display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                            {{ $t->title }}
                            @if($t->badge)
                                <span style="background: #e0f2fe; color: #0369a1; font-size: 0.75rem; padding: 2px 10px; border-radius: 6px; font-weight: 700;">{{ $t->badge }}</span>
                            @endif
                        </h4>
                        @if($t->description)
                            <p style="font-size: 0.88rem; color: #64748b; line-height: 1.5; margin: 0 0 12px 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $t->description }}
                            </p>
                        @endif
                        @if($t->bullet_points && count($t->bullet_points) > 0)
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
                                @foreach(array_slice($t->bullet_points, 0, 4) as $p)
                                    <div style="font-size: 0.82rem; color: #334155; display: flex; align-items: center; gap: 6px;">
                                        <i class="fa-solid fa-check" style="color: #84cc16; font-size: 0.75rem;"></i> {{ $p }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
                @if($tracks->count() > 3)
                    <div style="text-align: center; color: #00A896; font-weight: 700; font-size: 0.88rem;">
                        + {{ $tracks->count() - 3 }} more tracks configured below
                    </div>
                @endif
            </div>

            <!-- References Mini Preview -->
            <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 20px;">
                <h4 style="font-size: 1.1rem; font-weight: 800; color: #00A896; margin: 0 0 12px 0; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-book-bookmark"></i> {{ $referencesTitle }}
                </h4>
                <div style="display: flex; flex-direction: column; gap: 8px;">
                    @foreach(array_slice($refList, 0, 3) as $r)
                        <div style="font-size: 0.82rem; color: #475569; display: flex; align-items: flex-start; gap: 8px;">
                            <i class="fa-solid fa-bookmark" style="color: #84cc16; font-size: 0.75rem; margin-top: 3px;"></i>
                            <span>{{ $r }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM: BANNER, SECTION HEADERS & REFERENCES -->
    <form method="POST" action="{{ route('admin.programs.update') }}">
        @csrf

        <!-- Section 1: Hero Banner & Section Headers -->
        <div class="admin-card-section">
            <div class="section-title">
                <i class="fa-solid fa-heading" style="color: #00A896;"></i> 1. Banner &amp; Header Settings
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label class="form-label">Banner Title</label>
                    <input type="text" name="tracks_banner_title" value="{{ $bannerTitle }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Banner Subtitle</label>
                    <input type="text" name="tracks_banner_subtitle" value="{{ $bannerSubtitle }}" class="form-input" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr 2fr; gap: 20px;">
                <div>
                    <label class="form-label">Section Badge Text</label>
                    <input type="text" name="tracks_section_badge" value="{{ $sectionBadge }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Section Heading Title</label>
                    <input type="text" name="tracks_section_title" value="{{ $sectionTitle }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Section Description Text</label>
                    <input type="text" name="tracks_section_desc" value="{{ $sectionDesc }}" class="form-input" required>
                </div>
            </div>
        </div>

        <!-- Section 2: References & Citations -->
        <div class="admin-card-section">
            <div class="section-title">
                <i class="fa-solid fa-book-bookmark" style="color: #00A896;"></i> 2. Academic References &amp; Citations
            </div>
            <p style="color: #64748b; font-size: 0.9rem; margin-top: -10px; margin-bottom: 20px;">
                Manage the research references displayed in the citations block at the bottom of the page.
            </p>

            <div style="margin-bottom: 20px;">
                <label class="form-label">References Section Title</label>
                <input type="text" name="tracks_references_title" value="{{ $referencesTitle }}" class="form-input" style="max-width: 400px;" required>
            </div>

            <div id="references-container">
                @foreach($refList as $index => $ref)
                    <div class="item-card ref-row" style="display: flex; gap: 12px; align-items: center; padding: 12px 15px; margin-bottom: 10px;">
                        <i class="fa-solid fa-bookmark" style="color: #84cc16;"></i>
                        <input type="text" name="references_list[]" value="{{ $ref }}" class="form-input" style="flex: 1;" required>
                        <button type="button" onclick="this.closest('.ref-row').remove();" style="background: #fee2e2; color: #dc2626; border: none; padding: 8px 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>

            <button type="button" class="btn-add-item" onclick="addReferenceRow()" style="margin-top: 10px;">
                <i class="fa-solid fa-plus"></i> Add Another Reference
            </button>

            <div style="text-align: right; margin-top: 25px;">
                <button type="submit" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 12px 30px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Header &amp; References
                </button>
            </div>
        </div>
    </form>

    <!-- 3. TRACKS MANAGEMENT (Cards & Add/Edit Form) -->
    <div class="admin-card-section">
        <div class="section-title">
            <i class="fa-solid fa-list-check" style="color: #00A896;"></i> 3. Thrust Areas (Tracks List &amp; Editor)
        </div>

        <div style="display: grid; grid-template-columns: 1fr 420px; gap: 30px;">
            
            <!-- Existing Tracks List -->
            <div>
                <h4 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0 0 15px 0;">
                    Existing Tracks ({{ $tracks->count() }})
                </h4>

                @foreach($tracks as $track)
                    <div class="item-card" style="padding: 22px; margin-bottom: 16px;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 15px; margin-bottom: 10px;">
                            <div>
                                <h4 style="color: #0f172a; margin: 0 0 6px 0; font-size: 1.1rem; font-weight: 800;">
                                    {{ $track->title }}
                                </h4>
                                <div style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
                                    <span style="font-size: 0.8rem; background: #e2e8f0; color: #475569; padding: 2px 8px; border-radius: 4px; font-weight: 700;">
                                        Order: {{ $track->sort_order }}
                                    </span>
                                    @if($track->badge)
                                        <span style="font-size: 0.8rem; background: #e0f2fe; color: #0369a1; padding: 2px 8px; border-radius: 4px; font-weight: 700;">
                                            {{ $track->badge }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div style="display: flex; gap: 8px;">
                                <button type="button" class="btn" style="padding: 7px 14px; font-size: 0.88rem; background: #00A896;" onclick='editTrack(@json($track))'>
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                                <form action="{{ route('admin.tracks.destroy', $track->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this track?');" style="margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #ef4444; padding: 7px 14px; font-size: 0.88rem;">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        @if($track->description)
                            <p style="font-size: 0.9rem; color: #64748b; line-height: 1.6; margin: 10px 0; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                {{ $track->description }}
                            </p>
                        @endif

                        @if($track->bullet_points && count($track->bullet_points) > 0)
                            <div style="margin-top: 10px; padding-top: 10px; border-top: 1px dashed #e2e8f0;">
                                <div style="font-size: 0.82rem; font-weight: 700; color: #00A896; margin-bottom: 6px;">Focus Areas / Thrust Topics ({{ count($track->bullet_points) }}):</div>
                                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                    @foreach($track->bullet_points as $point)
                                        <span style="font-size: 0.8rem; background: #ffffff; border: 1px solid #cbd5e1; padding: 3px 10px; border-radius: 6px; color: #334155;">
                                            <i class="fa-solid fa-check" style="color: #84cc16; font-size: 0.75rem;"></i> {{ $point }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Add / Edit Track Form (Sticky) -->
            <div>
                <div style="background: #f8fafc; border: 2px solid #cbd5e1; border-radius: 16px; padding: 25px; position: sticky; top: 20px;">
                    <h3 id="track-form-title" style="color: #0f172a; margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-plus-circle" style="color: #00A896;"></i> Add New Track
                    </h3>
                    
                    <form id="track-form" method="POST" action="{{ route('admin.tracks.store') }}">
                        @csrf
                        <div id="track-method"></div>
                        
                        <div style="margin-bottom: 15px;">
                            <label class="form-label">Track Title *</label>
                            <input type="text" name="title" id="track_title" placeholder="e.g. Track I: Emerging Infectious Diseases..." required class="form-input">
                        </div>

                        <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 12px; margin-bottom: 15px;">
                            <div>
                                <label class="form-label">Badge / Pill (Optional)</label>
                                <input type="text" name="badge" id="track_badge" placeholder="e.g. (for medical practitioners)" class="form-input">
                            </div>
                            <div>
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" id="track_sort_order" value="{{ count($tracks) + 1 }}" class="form-input">
                            </div>
                        </div>

                        <div style="margin-bottom: 15px;">
                            <label class="form-label">Track Overview &amp; Abstract Description</label>
                            <textarea name="description" id="track_description" rows="5" placeholder="Enter detailed scholarly description with references and context..." class="form-input" style="font-family: inherit; font-size: 0.9rem; line-height: 1.6;"></textarea>
                        </div>

                        <div style="margin-bottom: 18px;">
                            <label class="form-label">Focus Areas / Bullet Points (with Checkmarks)</label>
                            <p style="font-size: 0.82rem; color: #64748b; margin: -4px 0 10px 0;">Add focus topics for this track.</p>
                            <div id="bullet-points-container">
                                <input type="text" name="bullet_points[]" class="form-input" style="margin-bottom: 8px;" placeholder="Bullet point text...">
                            </div>
                            <button type="button" class="btn" style="background: #e2e8f0; color: #334155; padding: 7px 14px; font-size: 0.85rem; margin-top: 5px; width: 100%; border: none; font-weight: 600;" onclick="addBulletPoint()">
                                <i class="fa-solid fa-plus"></i> Add Another Bullet Point
                            </button>
                        </div>

                        <button type="submit" id="track-submit-btn" style="width: 100%; background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 12px; border-radius: 8px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.3);">
                            <i class="fa-solid fa-save"></i> Save Track
                        </button>
                        <button type="button" id="track-cancel-btn" style="display: none; width: 100%; background: #e2e8f0; color: #475569; padding: 10px; border: none; border-radius: 8px; cursor: pointer; margin-top: 10px; font-weight: 700;" onclick="cancelTrackEdit()">
                            Cancel Edit
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    function addReferenceRow() {
        const container = document.getElementById('references-container');
        const row = document.createElement('div');
        row.className = 'item-card ref-row';
        row.style.cssText = 'display: flex; gap: 12px; align-items: center; padding: 12px 15px; margin-bottom: 10px;';
        row.innerHTML = `
            <i class="fa-solid fa-bookmark" style="color: #84cc16;"></i>
            <input type="text" name="references_list[]" placeholder="Author, Year, Title, Journal..." class="form-input" style="flex: 1;" required>
            <button type="button" onclick="this.closest('.ref-row').remove();" style="background: #fee2e2; color: #dc2626; border: none; padding: 8px 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">
                <i class="fa-solid fa-trash"></i>
            </button>
        `;
        container.appendChild(row);
    }

    function addBulletPoint(value = '') {
        const container = document.getElementById('bullet-points-container');
        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'bullet_points[]';
        input.value = value;
        input.className = 'form-input';
        input.style.marginBottom = '8px';
        input.placeholder = 'Focus area / bullet point text...';
        container.appendChild(input);
    }

    function editTrack(track) {
        document.getElementById('track-form-title').innerHTML = '<i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> Edit Track';
        let form = document.getElementById('track-form');
        form.action = `/admin/tracks/${track.id}`;
        document.getElementById('track-method').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('track_title').value = track.title || '';
        document.getElementById('track_badge').value = track.badge || '';
        document.getElementById('track_sort_order').value = track.sort_order || 1;
        document.getElementById('track_description').value = track.description || '';
        
        // Handle bullet points
        const container = document.getElementById('bullet-points-container');
        container.innerHTML = '';
        if (track.bullet_points && track.bullet_points.length > 0) {
            track.bullet_points.forEach(point => {
                addBulletPoint(point);
            });
        } else {
            addBulletPoint();
        }

        document.getElementById('track-submit-btn').innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Update Track';
        document.getElementById('track-cancel-btn').style.display = 'block';
    }

    function cancelTrackEdit() {
        document.getElementById('track-form-title').innerHTML = '<i class="fa-solid fa-plus-circle" style="color: #00A896;"></i> Add New Track';
        let form = document.getElementById('track-form');
        form.action = "{{ route('admin.tracks.store') }}";
        document.getElementById('track-method').innerHTML = '';
        
        document.getElementById('track_title').value = '';
        document.getElementById('track_badge').value = '';
        document.getElementById('track_sort_order').value = '{{ count($tracks) + 1 }}';
        document.getElementById('track_description').value = '';
        
        const container = document.getElementById('bullet-points-container');
        container.innerHTML = '';
        addBulletPoint();

        document.getElementById('track-submit-btn').innerHTML = '<i class="fa-solid fa-save"></i> Save Track';
        document.getElementById('track-cancel-btn').style.display = 'none';
    }
</script>
@endsection
