@extends(isset($is_included) ? 'layouts.empty' : 'layouts.admin_cms')

@section('header_title', 'Important Deadlines Management')

@section('content')
<style>
    /* Admin Deadlines Styling */
    .dl-admin-container {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    /* Live Preview Container */
    .dl-live-preview-box {
        background: #ffffff;
        border-radius: 20px;
        padding: 40px 30px 45px;
        border: 2px solid #e2e8f0;
        box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06);
        position: relative;
    }

    .dl-preview-watermark {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #009688;
        background: #e6f7f5;
        padding: 5px 14px;
        border-radius: 20px;
        border: 1px solid #b2dfdb;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Preview Section Header */
    .dl-preview-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .dl-preview-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #e6f7f5;
        color: #009688;
        border: 1px solid #b2dfdb;
        padding: 6px 20px;
        border-radius: 50px;
        font-weight: 800;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: 12px;
    }

    .dl-preview-title {
        font-size: 2.3rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 10px 0;
        letter-spacing: -0.5px;
    }

    .dl-preview-title span {
        color: #009688;
    }

    .dl-preview-divider {
        width: 65px;
        height: 4px;
        background: linear-gradient(90deg, #009688, #84cc16);
        margin: 0 auto 14px auto;
        border-radius: 4px;
    }

    .dl-preview-sub {
        max-width: 620px;
        margin: 0 auto;
        color: #64748b;
        font-size: 1.05rem;
        line-height: 1.5;
        font-weight: 500;
    }

    /* Preview Cards Grid */
    .dl-preview-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 28px;
        width: 100%;
    }

    .dl-card-item {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 18px;
        padding: 34px 28px 28px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .dl-card-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(15, 23, 42, 0.1);
    }

    .dl-card-accent {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
    }

    /* Themes */
    .theme-teal .dl-card-accent { background: linear-gradient(90deg, #009688, #26a69a); }
    .theme-teal .dl-card-icon { background: #e6f7f5; color: #009688; border: 1.5px solid #b2dfdb; }
    .theme-teal .dl-card-date i { color: #009688; }
    .theme-teal .dl-status-tag { background: #e6f7f5; color: #00796b; border: 1px solid #b2dfdb; }

    .theme-navy .dl-card-accent { background: linear-gradient(90deg, #0f172a, #334155); }
    .theme-navy .dl-card-icon { background: #f1f5f9; color: #0f172a; border: 1.5px solid #cbd5e1; }
    .theme-navy .dl-card-date i { color: #0f172a; }
    .theme-navy .dl-status-tag { background: #f8fafc; color: #334155; border: 1px solid #cbd5e1; }

    .theme-lime .dl-card-accent { background: linear-gradient(90deg, #84cc16, #65a30d); }
    .theme-lime .dl-card-icon { background: #f7fee7; color: #65a30d; border: 1.5px solid #d9f99d; }
    .theme-lime .dl-card-date i { color: #65a30d; }
    .theme-lime .dl-status-tag { background: #f7fee7; color: #4d7c0f; border: 1px solid #d9f99d; }

    .theme-blue .dl-card-accent { background: linear-gradient(90deg, #2563eb, #3b82f6); }
    .theme-blue .dl-card-icon { background: #eff6ff; color: #2563eb; border: 1.5px solid #bfdbfe; }
    .theme-blue .dl-card-date i { color: #2563eb; }
    .theme-blue .dl-status-tag { background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; }

    .theme-purple .dl-card-accent { background: linear-gradient(90deg, #7c3aed, #9333ea); }
    .theme-purple .dl-card-icon { background: #faf5ff; color: #7c3aed; border: 1.5px solid #e9d5ff; }
    .theme-purple .dl-card-date i { color: #7c3aed; }
    .theme-purple .dl-status-tag { background: #faf5ff; color: #6b21a8; border: 1px solid #e9d5ff; }

    .theme-amber .dl-card-accent { background: linear-gradient(90deg, #d97706, #f59e0b); }
    .theme-amber .dl-card-icon { background: #fffbeb; color: #d97706; border: 1.5px solid #fde68a; }
    .theme-amber .dl-card-date i { color: #d97706; }
    .theme-amber .dl-status-tag { background: #fffbeb; color: #b45309; border: 1px solid #fde68a; }

    .theme-rose .dl-card-accent { background: linear-gradient(90deg, #e11d48, #f43f5e); }
    .theme-rose .dl-card-icon { background: #fff1f2; color: #e11d48; border: 1.5px solid #fecdd3; }
    .theme-rose .dl-card-date i { color: #e11d48; }
    .theme-rose .dl-status-tag { background: #fff1f2; color: #be123c; border: 1px solid #fecdd3; }

    .dl-card-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .dl-phase-pill {
        font-size: 0.8rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #475569;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 4px 12px;
        border-radius: 50px;
    }

    .dl-card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.35rem;
    }

    .dl-card-date {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
    }

    .dl-card-date i {
        font-size: 1.45rem;
    }

    .dl-card-date-text {
        font-size: 1.75rem;
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.4px;
        line-height: 1.2;
    }

    .dl-card-title {
        font-size: 1.22rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0 0 10px 0;
        line-height: 1.35;
    }

    .dl-card-desc {
        font-size: 0.95rem;
        color: #64748b;
        line-height: 1.6;
        margin: 0 0 22px 0;
        flex-grow: 1;
    }

    .dl-card-divider {
        border-top: 1px dashed #cbd5e1;
        margin-bottom: 18px;
    }

    .dl-status-tag {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.82rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 50px;
        width: fit-content;
    }

    /* Manager Table / List Card */
    .dl-admin-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 25px 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .dl-table-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 18px 22px;
        margin-bottom: 12px;
        transition: all 0.2s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }

    .dl-table-row:hover {
        border-color: #009688;
        box-shadow: 0 4px 12px rgba(0, 150, 136, 0.08);
    }

    .dl-drag-handle {
        cursor: grab;
        color: #94a3b8;
        font-size: 1.2rem;
        padding: 6px;
    }

    .dl-drag-handle:active {
        cursor: grabbing;
    }

    /* Modal Styles */
    .dl-modal-backdrop {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(15, 23, 42, 0.65);
        z-index: 1000;
        backdrop-filter: blur(4px);
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .dl-modal-backdrop.open {
        display: flex;
    }

    .dl-modal-content {
        background: #ffffff;
        border-radius: 20px;
        max-width: 650px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        animation: modalScale 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes modalScale {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .dl-modal-header {
        padding: 22px 28px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f8fafc;
        border-radius: 20px 20px 0 0;
    }

    .dl-modal-body {
        padding: 28px;
    }

    .dl-modal-footer {
        padding: 18px 28px;
        border-top: 1px solid #e2e8f0;
        background: #f8fafc;
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        border-radius: 0 0 20px 20px;
    }
</style>

<div class="dl-admin-container">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-regular fa-calendar-check" style="color: #009688; margin-right: 8px;"></i> Important Deadlines CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Manage your event timeline, key submission phases, badges, descriptions, and dynamic styling in real time.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/#deadlines" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Preview On Site
            </a>
            <button type="button" onclick="openAddDeadlineModal()" class="btn" style="background: linear-gradient(135deg, #009688, #00796b); color: #ffffff; padding: 12px 24px; border-radius: 10px; font-weight: 700; font-size: 0.95rem; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 15px rgba(0, 150, 136, 0.35); border: none; cursor: pointer;">
                <i class="fa-solid fa-plus"></i> Add New Deadline Card
            </button>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW BOX (Exact match to frontend & image) -->
    <div class="dl-live-preview-box">
        <div class="dl-preview-watermark">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <div class="dl-preview-header">
            <span class="dl-preview-badge">
                <i class="fa-regular fa-calendar-check"></i> {{ $settings['deadlines_badge'] ?? 'EVENT TIMELINE' }}
            </span>
            <h2 class="dl-preview-title">
                {!! $settings['deadlines_title'] ?? 'Important <span>Deadlines</span>' !!}
            </h2>
            <div class="dl-preview-divider"></div>
            <p class="dl-preview-sub">
                {{ $settings['deadlines_subtitle'] ?? 'Key dates to mark in your calendar for submissions and notifications' }}
            </p>
        </div>

        <div class="dl-preview-grid">
            @forelse($deadlines as $dl)
                <div class="dl-card-item theme-{{ $dl->color_theme ?: 'teal' }}" style="{{ !$dl->is_active ? 'opacity: 0.55; filter: grayscale(0.5);' : '' }}">
                    <div class="dl-card-accent"></div>
                    <div class="dl-card-topbar">
                        <span class="dl-phase-pill">{{ $dl->phase ?: 'PHASE 01' }}</span>
                        <div class="dl-card-icon">
                            <i class="{{ $dl->icon ?: 'fa-solid fa-file-arrow-up' }}"></i>
                        </div>
                    </div>
                    <div class="dl-card-date">
                        <i class="fa-regular fa-calendar-days"></i>
                        <span class="dl-card-date-text">{{ $dl->date_text ?: ($dl->deadline_date ? \Carbon\Carbon::parse($dl->deadline_date)->format('M d, Y') : 'TBA') }}</span>
                    </div>
                    <h3 class="dl-card-title">{{ $dl->title }}</h3>
                    <p class="dl-card-desc">{{ $dl->description ?: 'Online submission portal open for structured scientific abstracts across all conference tracks.' }}</p>
                    <div class="dl-card-divider"></div>
                    <div>
                        <span class="dl-status-tag">
                            <i class="{{ $dl->tag_icon ?: 'fa-solid fa-circle-dot' }}"></i> {{ $dl->tag_label ?: 'Call for Abstracts' }}
                        </span>
                        @if(!$dl->is_active)
                            <span style="font-size: 0.72rem; color: #ef4444; font-weight: 800; margin-left: 8px; text-transform: uppercase;">(Inactive)</span>
                        @endif
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px 20px; color: #94a3b8;">
                    <i class="fa-regular fa-calendar-xmark" style="font-size: 3rem; margin-bottom: 12px; display: block;"></i>
                    <p style="font-size: 1.1rem; font-weight: 600;">No deadline cards created yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- 2. SECTION HEADER CUSTOMIZER -->
    <div class="dl-admin-card">
        <h3 style="margin: 0 0 15px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-sliders" style="color: #009688;"></i> Section Header Settings
        </h3>
        <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 22px;">Customize the top timeline badge, main highlighted title, and subtitle text.</p>

        <form method="POST" action="{{ route('admin.deadlines.header.update') }}">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1.5fr 2fr; gap: 20px; align-items: start;">
                <div>
                    <label style="display: block; font-weight: 600; color: #1e293b; margin-bottom: 8px; font-size: 0.92rem;">Header Badge Text</label>
                    <input type="text" name="deadlines_badge" value="{{ $settings['deadlines_badge'] ?? 'EVENT TIMELINE' }}" placeholder="e.g. EVENT TIMELINE" style="width: 100%; padding: 11px 15px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                </div>
                <div>
                    <label style="display: block; font-weight: 600; color: #1e293b; margin-bottom: 8px; font-size: 0.92rem;">Main Title (HTML Allowed)</label>
                    <input type="text" name="deadlines_title" value="{{ $settings['deadlines_title'] ?? 'Important <span style=\"color: #009688;\">Deadlines</span>' }}" placeholder='Important <span style="color: #009688;">Deadlines</span>' style="width: 100%; padding: 11px 15px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                </div>
                <div>
                    <label style="display: block; font-weight: 600; color: #1e293b; margin-bottom: 8px; font-size: 0.92rem;">Subtitle Description</label>
                    <input type="text" name="deadlines_subtitle" value="{{ $settings['deadlines_subtitle'] ?? 'Key dates to mark in your calendar for submissions and notifications' }}" placeholder="Subtitle description text..." style="width: 100%; padding: 11px 15px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem;">
                </div>
            </div>

            <div style="text-align: right; margin-top: 20px;">
                <button type="submit" class="btn" style="background: #0f172a; color: #ffffff; padding: 11px 24px; border-radius: 8px; font-weight: 700; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Header Settings
                </button>
            </div>
        </form>
    </div>

    <!-- 3. MANAGE INDIVIDUAL DEADLINE CARDS LIST -->
    <div class="dl-admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
            <div>
                <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-list-check" style="color: #009688;"></i> Timeline Cards List ({{ $deadlines->count() }})
                </h3>
                <p style="color: #64748b; font-size: 0.88rem; margin: 0;">Drag rows to reorder position. Click Edit to customize dates, titles, descriptions, icons, and themes.</p>
            </div>
            <button type="button" onclick="openAddDeadlineModal()" style="background: #e6f7f5; color: #00796b; border: 1px solid #b2dfdb; padding: 9px 16px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                <i class="fa-solid fa-plus"></i> Add Card
            </button>
        </div>

        <div id="sortable-deadlines-list">
            @foreach($deadlines as $dl)
                <div class="dl-table-row" data-id="{{ $dl->id }}">
                    <div style="display: flex; align-items: center; gap: 16px; min-width: 0;">
                        <div class="dl-drag-handle" title="Drag to reorder">
                            <i class="fa-solid fa-grip-vertical"></i>
                        </div>
                        
                        <div class="dl-card-icon theme-{{ $dl->color_theme ?: 'teal' }}" style="width: 44px; height: 44px; flex-shrink: 0; font-size: 1.2rem;">
                            <i class="{{ $dl->icon ?: 'fa-solid fa-file-arrow-up' }}"></i>
                        </div>

                        <div style="min-width: 0;">
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 4px; flex-wrap: wrap;">
                                <span style="font-size: 0.75rem; font-weight: 800; background: #f1f5f9; color: #334155; padding: 2px 8px; border-radius: 6px; border: 1px solid #e2e8f0;">
                                    {{ $dl->phase ?: 'PHASE' }}
                                </span>
                                <strong style="font-size: 1.05rem; color: #0f172a;">{{ $dl->title }}</strong>
                                <span style="font-size: 0.82rem; font-weight: 700; color: #009688; background: #e6f7f5; padding: 2px 8px; border-radius: 6px;">
                                    📅 {{ $dl->date_text ?: ($dl->deadline_date ? \Carbon\Carbon::parse($dl->deadline_date)->format('M d, Y') : 'TBA') }}
                                </span>
                                <span style="font-size: 0.72rem; font-weight: 800; text-transform: uppercase; padding: 2px 8px; border-radius: 12px; background: {{ $dl->is_active ? '#dcfce7' : '#fee2e2' }}; color: {{ $dl->is_active ? '#15803d' : '#b91c1c' }};">
                                    {{ $dl->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </div>
                            <p style="margin: 0; color: #64748b; font-size: 0.88rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 550px;">
                                {{ $dl->description ?: 'No description provided.' }}
                            </p>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 10px; flex-shrink: 0; margin-left: 15px;">
                        <button type="button" onclick="openEditDeadlineModal({{ json_encode($dl) }})" style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; padding: 8px 14px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </button>

                        <form action="{{ route('admin.deadlines.delete', $dl->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this deadline card?');" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; padding: 8px 14px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                                <i class="fa-solid fa-trash-can"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<!-- ADD MODAL -->
<div class="dl-modal-backdrop" id="addDeadlineModal">
    <div class="dl-modal-content">
        <div class="dl-modal-header">
            <h3 style="margin: 0; font-size: 1.25rem; font-weight: 800; color: #0f172a;">
                <i class="fa-solid fa-plus-circle" style="color: #009688;"></i> Add Deadline Card
            </h3>
            <button type="button" onclick="closeAddDeadlineModal()" style="background: none; border: none; font-size: 1.3rem; color: #64748b; cursor: pointer;">&times;</button>
        </div>
        <form method="POST" action="{{ route('admin.deadlines.store') }}">
            @csrf
            <div class="dl-modal-body" style="display: grid; gap: 18px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Phase Badge</label>
                        <input type="text" name="phase" placeholder="e.g. PHASE 01" value="PHASE 0{{ $deadlines->count() + 1 }}" required style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Color Theme</label>
                        <select name="color_theme" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; background: #fff; font-weight: 600;">
                            <option value="teal">🟢 Teal (#009688)</option>
                            <option value="navy">🔵 Navy (#0f172a)</option>
                            <option value="lime">🍏 Lime (#84cc16)</option>
                            <option value="blue">🔷 Blue (#2563eb)</option>
                            <option value="purple">🟣 Purple (#7c3aed)</option>
                            <option value="amber">🟠 Amber (#d97706)</option>
                            <option value="rose">🔴 Rose (#e11d48)</option>
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Date Display Text</label>
                        <input type="text" name="date_text" placeholder="e.g. Oct 07, 2026" required style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-weight: 700;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Card Icon (FontAwesome)</label>
                        <select name="icon" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; background: #fff;">
                            <option value="fa-solid fa-file-arrow-up">📄 Abstract / Upload (fa-file-arrow-up)</option>
                            <option value="fa-solid fa-envelope-open-text">✉️ Acceptance / Notification (fa-envelope-open-text)</option>
                            <option value="fa-solid fa-book-journal-whills">📚 Proceedings / Full Paper (fa-book-journal-whills)</option>
                            <option value="fa-solid fa-award">🏆 Awards / Certificate (fa-award)</option>
                            <option value="fa-solid fa-calendar-days">📅 Calendar Date (fa-calendar-days)</option>
                            <option value="fa-solid fa-bell">🔔 Alert / Announcement (fa-bell)</option>
                            <option value="fa-solid fa-users">👥 Registration / Attendees (fa-users)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Card Main Title</label>
                    <input type="text" name="title" placeholder="e.g. Submission of Abstract" required style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-weight: 600;">
                </div>

                <div>
                    <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Description Text</label>
                    <textarea name="description" rows="3" placeholder="Online submission portal open for structured scientific abstracts..." style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; resize: vertical; font-family: inherit; font-size: 0.92rem;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1.3fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Bottom Status Tag Label</label>
                        <input type="text" name="tag_label" placeholder="e.g. Call for Abstracts" value="Call for Abstracts" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Status Tag Icon</label>
                        <select name="tag_icon" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; background: #fff;">
                            <option value="fa-solid fa-circle-dot">🔘 Circle Bullet (fa-circle-dot)</option>
                            <option value="fa-regular fa-clock">⏰ Clock / Timer (fa-clock)</option>
                            <option value="fa-solid fa-award">🏅 Award Medal (fa-award)</option>
                            <option value="fa-solid fa-check">✔️ Checkmark (fa-check)</option>
                            <option value="fa-solid fa-lock">🔒 Lock (fa-lock)</option>
                        </select>
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 12px 16px; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <input type="checkbox" name="is_active" id="add_is_active" value="1" checked style="width: 18px; height: 18px;">
                    <label for="add_is_active" style="font-weight: 700; color: #1e293b; cursor: pointer; font-size: 0.92rem;">Visible / Active on Live Website</label>
                </div>
            </div>
            <div class="dl-modal-footer">
                <button type="button" onclick="closeAddDeadlineModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 8px; font-weight: 700; cursor: pointer;">Cancel</button>
                <button type="submit" style="background: #009688; color: #ffffff; border: none; padding: 10px 22px; border-radius: 8px; font-weight: 700; cursor: pointer;">Create Deadline Card</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="dl-modal-backdrop" id="editDeadlineModal">
    <div class="dl-modal-content">
        <div class="dl-modal-header">
            <h3 style="margin: 0; font-size: 1.25rem; font-weight: 800; color: #0f172a;">
                <i class="fa-solid fa-pen-to-square" style="color: #0284c7;"></i> Edit Deadline Card
            </h3>
            <button type="button" onclick="closeEditDeadlineModal()" style="background: none; border: none; font-size: 1.3rem; color: #64748b; cursor: pointer;">&times;</button>
        </div>
        <form method="POST" id="editDeadlineForm">
            @csrf
            @method('PUT')
            <div class="dl-modal-body" style="display: grid; gap: 18px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Phase Badge</label>
                        <input type="text" name="phase" id="edit_phase" required style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Color Theme</label>
                        <select name="color_theme" id="edit_color_theme" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; background: #fff; font-weight: 600;">
                            <option value="teal">🟢 Teal (#009688)</option>
                            <option value="navy">🔵 Navy (#0f172a)</option>
                            <option value="lime">🍏 Lime (#84cc16)</option>
                            <option value="blue">🔷 Blue (#2563eb)</option>
                            <option value="purple">🟣 Purple (#7c3aed)</option>
                            <option value="amber">🟠 Amber (#d97706)</option>
                            <option value="rose">🔴 Rose (#e11d48)</option>
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Date Display Text</label>
                        <input type="text" name="date_text" id="edit_date_text" required style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-weight: 700;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Card Icon</label>
                        <input type="text" name="icon" id="edit_icon" placeholder="fa-solid fa-file-arrow-up" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                    </div>
                </div>

                <div>
                    <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Card Main Title</label>
                    <input type="text" name="title" id="edit_title" required style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-weight: 600;">
                </div>

                <div>
                    <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Description Text</label>
                    <textarea name="description" id="edit_description" rows="3" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px; resize: vertical; font-family: inherit; font-size: 0.92rem;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1.3fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Bottom Status Tag Label</label>
                        <input type="text" name="tag_label" id="edit_tag_label" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1e293b; margin-bottom: 6px; font-size: 0.9rem;">Status Tag Icon</label>
                        <input type="text" name="tag_icon" id="edit_tag_icon" placeholder="fa-solid fa-circle-dot" style="width: 100%; padding: 10px 14px; border: 1.5px solid #cbd5e1; border-radius: 8px;">
                    </div>
                </div>

                <div style="display: flex; align-items: center; gap: 10px; background: #f8fafc; padding: 12px 16px; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <input type="checkbox" name="is_active" id="edit_is_active" value="1" style="width: 18px; height: 18px;">
                    <label for="edit_is_active" style="font-weight: 700; color: #1e293b; cursor: pointer; font-size: 0.92rem;">Visible / Active on Live Website</label>
                </div>
            </div>
            <div class="dl-modal-footer">
                <button type="button" onclick="closeEditDeadlineModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 10px 18px; border-radius: 8px; font-weight: 700; cursor: pointer;">Cancel</button>
                <button type="submit" style="background: #0284c7; color: #ffffff; border: none; padding: 10px 22px; border-radius: 8px; font-weight: 700; cursor: pointer;">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<!-- Sortable.js for Drag & Drop Reordering -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    function openAddDeadlineModal() {
        document.getElementById('addDeadlineModal').classList.add('open');
    }
    function closeAddDeadlineModal() {
        document.getElementById('addDeadlineModal').classList.remove('open');
    }

    function openEditDeadlineModal(dl) {
        const form = document.getElementById('editDeadlineForm');
        form.action = '/admin/deadlines/' + dl.id;

        document.getElementById('edit_phase').value = dl.phase || 'PHASE 01';
        document.getElementById('edit_color_theme').value = dl.color_theme || 'teal';
        document.getElementById('edit_date_text').value = dl.date_text || dl.deadline_date || '';
        document.getElementById('edit_icon').value = dl.icon || 'fa-solid fa-file-arrow-up';
        document.getElementById('edit_title').value = dl.title || '';
        document.getElementById('edit_description').value = dl.description || '';
        document.getElementById('edit_tag_label').value = dl.tag_label || '';
        document.getElementById('edit_tag_icon').value = dl.tag_icon || 'fa-solid fa-circle-dot';
        document.getElementById('edit_is_active').checked = !!dl.is_active;

        document.getElementById('editDeadlineModal').classList.add('open');
    }

    function closeEditDeadlineModal() {
        document.getElementById('editDeadlineModal').classList.remove('open');
    }

    // Drag and Drop Sortable Initialization
    document.addEventListener('DOMContentLoaded', function() {
        const el = document.getElementById('sortable-deadlines-list');
        if (el && typeof Sortable !== 'undefined') {
            Sortable.create(el, {
                animation: 150,
                handle: '.dl-drag-handle',
                onEnd: function() {
                    const rows = el.querySelectorAll('.dl-table-row');
                    const order = Array.from(rows).map(r => r.getAttribute('data-id'));
                    
                    fetch('{{ route("admin.deadlines.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order: order })
                    }).then(res => res.json()).then(data => {
                        if (data.success) {
                            console.log('Deadlines reordered successfully');
                        }
                    }).catch(err => console.error(err));
                }
            });
        }
    });
</script>
@endsection
