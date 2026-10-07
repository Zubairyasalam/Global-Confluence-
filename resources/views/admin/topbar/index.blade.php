@extends('layouts.admin_cms')

@section('header_title', 'Topbar & Announcement Header CMS')

@section('content')
<style>
    .topbar-admin-wrap {
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

    /* Live Preview Component (1:1 with User Image) */
    .prev-topbar-desktop {
        padding: 10px 25px;
        display: flex;
        align-items: center;
        background-color: {{ $settings['topbar_bg_color'] ?? '#0f233a' }};
        color: {{ $settings['topbar_text_color'] ?? '#ffffff' }};
        font-size: 0.88rem;
        border-radius: 10px;
        overflow: hidden;
    }

    .prev-topbar-left {
        flex-shrink: 0;
        padding-right: 20px;
        border-right: 1px solid rgba(255,255,255,0.25);
        display: flex;
        gap: 15px;
        align-items: center;
        white-space: nowrap;
        font-weight: 600;
        z-index: 2;
    }

    .prev-topbar-left span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .prev-marquee-container {
        flex-grow: 1;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding-left: 20px;
        white-space: nowrap;
        position: relative;
        min-width: 0;
    }

    .prev-marquee-content {
        display: flex;
        min-width: max-content;
        animation: prev-marquee-scroll {{ $settings['topbar_speed'] ?? '55' }}s linear infinite;
        will-change: transform;
    }

    @keyframes prev-marquee-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .item-row-card {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 12px;
        transition: all 0.2s;
    }

    .item-row-card:hover {
        border-color: #009688;
        background: #ffffff;
    }
</style>

<div class="topbar-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-bullhorn" style="color: #009688; margin-right: 8px;"></i> Topbar &amp; Announcement Header CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Manage contact phone numbers, scrolling announcements ticker, event format, and colors dynamically.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Site
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW (Exact match to User Image) -->
    <div style="background: #ffffff; border-radius: 20px; border: 2px solid #e2e8f0; padding: 30px; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; background: #e6f7f5; padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <h4 style="font-size: 1rem; font-weight: 800; color: #0f172a; margin: 0 0 15px 0;">Top Announcement Bar Preview</h4>

        <div class="prev-topbar-desktop">
            <div class="prev-marquee-container" style="width: 100%; padding-left: 0;">
                <div class="prev-marquee-content">
                    @php
                        $mode = $settings['topbar_ticker_mode'] ?? 'custom';
                        $customItems = [];
                        for($i = 1; $i <= 20; $i++) {
                            if (!empty($settings['topbar_ticker_' . $i])) {
                                $customItems[] = $settings['topbar_ticker_' . $i];
                            }
                        }
                        if (empty($customItems)) {
                            $customItems = [
                                'All the Presentation will be published as a conference proceedings in ISBN indexed book',
                                'Quality presentation will be peer reviewed and considered for further publication in selected Scopus/ WoS indexed journals'
                            ];
                        }
                    @endphp

                    @if($mode === 'custom' || count($customItems) > 0)
                        @for($r = 0; $r < 4; $r++)
                            @foreach($customItems as $item)
                                <span style="margin-right: 45px; display: inline-flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid fa-circle" style="color: #00A896; font-size: 0.45rem;"></i>
                                    <span>{{ $item }}</span>
                                    <span style="color: rgba(255,255,255,0.25); margin-left: 20px;">|</span>
                                </span>
                            @endforeach
                        @endfor
                    @elseif(isset($deadlines) && count($deadlines) > 0)
                        @foreach($deadlines as $dl)
                            <span style="margin-right: 50px;">{{ $dl->title }}: {{ $dl->deadline_date }}</span>
                        @endforeach
                        @foreach($deadlines as $dl)
                            <span style="margin-right: 50px;">{{ $dl->title }}: {{ $dl->deadline_date }}</span>
                        @endforeach
                    @else
                        <span style="margin-right: 50px;">All the Presentation will be published as a conference proceedings in ISBN indexed book</span>
                        <span style="margin-right: 50px;">Quality presentation will be peer reviewed and considered for further publication in selected Scopus/ WoS indexed journals</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form method="POST" action="{{ route('admin.topbar.update') }}">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">

            <!-- SECTION 1: PHONE NUMBERS -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-phone" style="color: #009688;"></i> 1. Contact &amp; Helpdesk Phone Numbers
                        </h3>
                        <p style="margin: 0; color: #64748b; font-size: 0.88rem;">These phone numbers appear on the left side of the topbar header.</p>
                    </div>
                    <button type="button" onclick="addPhoneRow()" style="background: #e0f2fe; color: #0284c7; border: 1.5px solid #bae6fd; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Another Phone
                    </button>
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-bottom: 15px;">
                    <div>
                        <label class="form-label">Phone 1 (Primary)</label>
                        <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+91 9789582404' }}" class="form-input" placeholder="+91 9789582404" required>
                    </div>
                    <div>
                        <label class="form-label">Phone 2</label>
                        <input type="text" name="contact_phone_2" value="{{ $settings['contact_phone_2'] ?? '+91 9025596984' }}" class="form-input" placeholder="+91 9025596984">
                    </div>
                    <div>
                        <label class="form-label">Phone 3</label>
                        <input type="text" name="contact_phone_3" value="{{ $settings['contact_phone_3'] ?? '+91 81480 18894' }}" class="form-input" placeholder="+91 81480 18894">
                    </div>
                </div>

                <div id="additional-phones-wrapper">
                    @for($p = 4; $p <= 10; $p++)
                        @if(isset($settings['contact_phone_' . $p]))
                            <div class="item-row-card">
                                <i class="fa-solid fa-phone" style="color: #009688;"></i>
                                <input type="text" name="additional_phones[]" value="{{ $settings['contact_phone_' . $p] }}" class="form-input" style="flex: 1;" placeholder="Enter phone number...">
                                <button type="button" onclick="this.closest('.item-row-card').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <!-- SECTION 2: ANNOUNCEMENT TICKER / MARQUEE -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-scroll" style="color: #f59e0b;"></i> 2. Scrolling Announcement Marquee Ticker
                        </h3>
                        <p style="margin: 0; color: #64748b; font-size: 0.88rem;">Choose whether to automatically pull live Deadlines or show custom announcement messages.</p>
                    </div>
                    <button type="button" onclick="addTickerRow()" style="background: #fffbeb; color: #b45309; border: 1.5px solid #fde68a; padding: 8px 16px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Custom Message
                    </button>
                </div>

                <!-- Ticker Mode Selection -->
                <div style="background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: 12px; padding: 18px 22px; margin-bottom: 22px;">
                    <label class="form-label" style="margin-bottom: 12px;">Ticker Content Source</label>
                    <div style="display: flex; gap: 25px; flex-wrap: wrap;">
                        <label style="display: inline-flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 600; color: #0f172a;">
                            <input type="radio" name="topbar_ticker_mode" value="deadlines" {{ ($settings['topbar_ticker_mode'] ?? 'deadlines') === 'deadlines' ? 'checked' : '' }} onchange="toggleTickerMode(this.value)">
                            <span><i class="fa-solid fa-calendar-check" style="color: #009688;"></i> Automatically sync with Important Deadlines ({{ $deadlines->count() }} active)</span>
                        </label>
                        <label style="display: inline-flex; align-items: center; gap: 8px; cursor: pointer; font-weight: 600; color: #0f172a;">
                            <input type="radio" name="topbar_ticker_mode" value="custom" {{ ($settings['topbar_ticker_mode'] ?? 'deadlines') === 'custom' ? 'checked' : '' }} onchange="toggleTickerMode(this.value)">
                            <span><i class="fa-solid fa-pen-to-square" style="color: #f59e0b;"></i> Use Custom Announcement Items</span>
                        </label>
                    </div>
                </div>

                <!-- Custom Ticker List -->
                <div id="custom-ticker-wrap" style="{{ ($settings['topbar_ticker_mode'] ?? 'deadlines') === 'custom' ? 'display: block;' : 'display: none;' }} margin-bottom: 20px;">
                    <label class="form-label">Custom Marquee Announcement Items</label>
                    <div id="ticker-items-container">
                        @for($t = 1; $t <= 20; $t++)
                            @if(isset($settings['topbar_ticker_' . $t]))
                                <div class="item-row-card">
                                    <i class="fa-solid fa-bullhorn" style="color: #f59e0b;"></i>
                                    <input type="text" name="custom_ticker_items[]" value="{{ $settings['topbar_ticker_' . $t] }}" class="form-input" style="flex: 1;" placeholder="e.g. Submission of Abstract: 2026-10-07">
                                    <button type="button" onclick="this.closest('.item-row-card').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>

                <!-- Settings Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
                    <div>
                        <label class="form-label">Scroll Speed (Seconds)</label>
                        <input type="number" name="topbar_speed" value="{{ $settings['topbar_speed'] ?? '55' }}" class="form-input" min="5" max="150">
                    </div>
                    <div>
                        <label class="form-label">Topbar Background Color</label>
                        <input type="text" name="topbar_bg_color" value="{{ $settings['topbar_bg_color'] ?? '#0f233a' }}" class="form-input" placeholder="#0f233a">
                    </div>
                    <div>
                        <label class="form-label">Topbar Text Color</label>
                        <input type="text" name="topbar_text_color" value="{{ $settings['topbar_text_color'] ?? '#ffffff' }}" class="form-input" placeholder="#ffffff">
                    </div>
                    <div>
                        <label class="form-label">Mobile Format Badge</label>
                        <input type="text" name="topbar_format" value="{{ $settings['topbar_format'] ?? 'Online | In-person' }}" class="form-input" placeholder="Online | In-person">
                    </div>
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div style="text-align: right; margin-bottom: 30px;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #009688, #00796b); color: #ffffff; padding: 14px 34px; border-radius: 10px; font-weight: 800; font-size: 1.05rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 150, 136, 0.35); display: inline-flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Topbar &amp; Announcements
                </button>
            </div>

        </div>
    </form>

</div>

<script>
    function toggleTickerMode(val) {
        const wrap = document.getElementById('custom-ticker-wrap');
        if (val === 'custom') {
            wrap.style.display = 'block';
            if (document.getElementById('ticker-items-container').children.length === 0) {
                addTickerRow('Submission of Abstract: 2026-10-07');
                addTickerRow('Acceptance of Abstract: 2026-10-15');
                addTickerRow('Full Paper Submission: 2026-11-15');
            }
        } else {
            wrap.style.display = 'none';
        }
    }

    function addPhoneRow() {
        const wrapper = document.getElementById('additional-phones-wrapper');
        const div = document.createElement('div');
        div.className = 'item-row-card';
        div.innerHTML = `
            <i class="fa-solid fa-phone" style="color: #009688;"></i>
            <input type="text" name="additional_phones[]" value="" class="form-input" style="flex: 1;" placeholder="Enter additional phone number...">
            <button type="button" onclick="this.closest('.item-row-card').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove">
                <i class="fa-solid fa-trash"></i>
            </button>
        `;
        wrapper.appendChild(div);
        div.querySelector('input').focus();
    }

    function addTickerRow(defaultVal = '') {
        const container = document.getElementById('ticker-items-container');
        const div = document.createElement('div');
        div.className = 'item-row-card';
        div.innerHTML = `
            <i class="fa-solid fa-bullhorn" style="color: #f59e0b;"></i>
            <input type="text" name="custom_ticker_items[]" value="${defaultVal}" class="form-input" style="flex: 1;" placeholder="e.g. Submission of Abstract: 2026-10-07">
            <button type="button" onclick="this.closest('.item-row-card').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove">
                <i class="fa-solid fa-trash"></i>
            </button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }
</script>
@endsection
