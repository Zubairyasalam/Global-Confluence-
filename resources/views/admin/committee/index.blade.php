@extends('layouts.admin_cms')

@section('header_title', 'Committee CMS Management')

@section('content')
<style>
    .committee-admin-wrap {
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

    /* Preview Component Styles Matching Frontend Exactly */
    .prev-section-title {
        text-align: center;
        margin-bottom: 25px;
    }

    .prev-section-title h2 {
        font-size: 1.8rem;
        font-weight: 800;
        color: #0f172a;
        margin: 0 0 8px 0;
        text-transform: uppercase;
        letter-spacing: -0.5px;
    }

    .prev-section-title .prev-line {
        width: 60px;
        height: 3.5px;
        background: #84cc16;
        margin: 0 auto 14px auto;
        border-radius: 2px;
    }

    .prev-role-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.72rem;
        font-weight: 800;
        color: #009688;
        background: rgba(0, 150, 136, 0.08);
        padding: 5px 18px;
        border-radius: 30px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 15px;
        border: 1px solid rgba(0, 150, 136, 0.2);
    }

    .prev-role-badge.teal {
        background: #009688;
        color: #ffffff;
    }

    .prev-person-card {
        background: #ffffff;
        border-radius: 12px;
        padding: 16px 14px;
        border: 1px solid rgba(0, 150, 136, 0.15);
        box-shadow: 0 3px 10px rgba(15, 23, 42, 0.03);
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .prev-person-card .prev-name {
        font-size: 0.95rem;
        color: #0f172a;
        font-weight: 800;
        margin: 0 0 4px 0;
        line-height: 1.25;
    }

    .prev-person-card .prev-desc {
        font-size: 0.78rem;
        color: #64748b;
        line-height: 1.4;
        margin: 0;
    }

    .member-table-row {
        display: grid;
        grid-template-columns: 2fr 1.5fr 1fr 100px 90px;
        gap: 15px;
        align-items: center;
        padding: 14px 18px;
        border-bottom: 1px solid #f1f5f9;
        transition: background-color 0.15s;
    }

    .member-table-row:hover {
        background-color: #f8fafc;
    }

    .tab-btn {
        padding: 12px 24px;
        border: none;
        background: transparent;
        font-weight: 700;
        font-size: 0.95rem;
        color: #64748b;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        transition: all 0.2s;
    }

    .tab-btn.active {
        color: #00A896;
        border-bottom-color: #00A896;
    }
</style>

<div class="committee-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-users-gear" style="color: #00A896; margin-right: 8px;"></i> Committee Page CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Manage Leadership, Organizing Committee, Advisory Board, and Track Incharges in real time.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/committee" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW (Exact match to User Screenshot) -->
    <div style="background: #ffffff; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.95); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <!-- Banner Preview -->
        <div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 65px 20px 50px; position: relative; text-align: center;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.88);"></div>
            <div style="position: relative; z-index: 1;">
                <h1 style="color: #ffffff; font-size: 2.4rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; margin: 0;">
                    {{ $settings['committee_hero_title'] ?? 'COMMITTEE' }}
                </h1>
            </div>
        </div>

        <div style="padding: 40px 30px; max-width: 1100px; margin: 0 auto; font-family: 'Inter', system-ui, sans-serif;">
            
            <!-- 1. LEADERSHIP SECTION -->
            <div class="prev-section-title">
                <h2>Leadership</h2>
                <div class="prev-line"></div>
            </div>

            <!-- Chief Patron -->
            @if(isset($leadership['chief_patron']) && count($leadership['chief_patron']) > 0)
                <div style="text-align: center; margin-bottom: 12px;">
                    <span class="prev-role-badge teal">CHIEF PATRON</span>
                </div>
                <div style="display: flex; justify-content: center; gap: 20px; margin-bottom: 25px;">
                    @foreach($leadership['chief_patron'] as $m)
                        <div class="prev-person-card" style="width: 260px;">
                            <div class="prev-name">{{ $m->name }}</div>
                            <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Patrons -->
            @if(isset($leadership['patrons']) && count($leadership['patrons']) > 0)
                <div style="text-align: center; margin-bottom: 12px;">
                    <span class="prev-role-badge teal">PATRON</span>
                </div>
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-bottom: 25px;">
                    @foreach($leadership['patrons'] as $m)
                        <div class="prev-person-card" style="width: 250px;">
                            <div class="prev-name">{{ $m->name }}</div>
                            <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Convenors -->
            @if(isset($leadership['convenor']) && count($leadership['convenor']) > 0)
                <div style="text-align: center; margin-bottom: 12px;">
                    <span class="prev-role-badge">CONVENORS</span>
                </div>
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-bottom: 25px;">
                    @foreach($leadership['convenor'] as $m)
                        <div class="prev-person-card" style="width: 250px;">
                            <div class="prev-name">{{ $m->name }}</div>
                            <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Co-Convenors -->
            @if(isset($leadership['co_convenors']) && count($leadership['co_convenors']) > 0)
                <div style="text-align: center; margin-bottom: 12px;">
                    <span class="prev-role-badge">CO-CONVENORS</span>
                </div>
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-bottom: 25px;">
                    @foreach($leadership['co_convenors'] as $m)
                        <div class="prev-person-card" style="width: 250px;">
                            <div class="prev-name">{{ $m->name }}</div>
                            <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Organizing Secretaries -->
            @if(isset($leadership['organizing_secretaries']) && count($leadership['organizing_secretaries']) > 0)
                <div style="text-align: center; margin-bottom: 12px;">
                    <span class="prev-role-badge teal">ORGANIZING SECRETARIES</span>
                </div>
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px; margin-bottom: 40px;">
                    @foreach($leadership['organizing_secretaries'] as $m)
                        <div class="prev-person-card" style="width: 240px;">
                            <div class="prev-name">{{ $m->name }}</div>
                            <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- 2. ORGANIZING COMMITTEE SECTION -->
            <div class="prev-section-title" style="margin-top: 20px;">
                <h2>Organizing Committee</h2>
                <div class="prev-line"></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 40px;">
                @foreach($organizing->take(8) as $m)
                    <div class="prev-person-card">
                        <div class="prev-name">{{ $m->name }}</div>
                        <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                    </div>
                @endforeach
            </div>
            @if($organizing->count() > 8)
                <p style="text-align: center; color: #64748b; font-size: 0.82rem; margin: -25px 0 35px 0; font-weight: 600;">
                    + {{ $organizing->count() - 8 }} more organizing committee members
                </p>
            @endif

            <!-- 3. ADVISORY BOARD SECTION -->
            <div class="prev-section-title">
                <h2>Advisory Board</h2>
                <div class="prev-line"></div>
                <p style="color: #64748b; font-size: 0.88rem; max-width: 650px; margin: 0 auto 20px auto; line-height: 1.5;">
                    {{ $settings['advisory_text'] ?? 'Transforming one health in communities and environment research ecosystems across institutions and state stakeholders.' }}
                </p>
            </div>

            <!-- International Advisory -->
            <div style="text-align: center; margin-bottom: 12px;">
                <span class="prev-role-badge">INTERNATIONAL ADVISORY COMMITTEE</span>
            </div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 30px;">
                @foreach($advisory->where('subcategory', 'international')->take(3) as $m)
                    <div class="prev-person-card">
                        <div class="prev-name">{{ $m->name }}</div>
                        <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                    </div>
                @endforeach
            </div>

            <!-- National Advisory -->
            <div style="text-align: center; margin-bottom: 12px;">
                <span class="prev-role-badge">NATIONAL ADVISORY COMMITTEE</span>
            </div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 40px;">
                @foreach($advisory->where('subcategory', 'national')->take(6) as $m)
                    <div class="prev-person-card">
                        <div class="prev-name">{{ $m->name }}</div>
                        <div class="prev-desc">{!! nl2br(e($m->designation)) !!}</div>
                    </div>
                @endforeach
            </div>

            <!-- 4. TRACK-WISE INCHARGE SECTION -->
            <div class="prev-section-title">
                <h2>Track-Wise Incharge</h2>
                <div class="prev-line"></div>
            </div>
            <div style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 40px;">
                @for($t = 1; $t <= 2; $t++)
                    @if(isset($trackSettings['track_' . $t . '_name']))
                        <div style="background: #ffffff; border-left: 5px solid {{ $trackSettings['track_' . $t . '_color'] ?? '#009688' }}; border-radius: 10px; padding: 18px 22px; border: 1px solid #e2e8f0; border-left-width: 5px;">
                            <h4 style="color: {{ $trackSettings['track_' . $t . '_color'] ?? '#009688' }}; margin: 0 0 6px 0; font-size: 1.05rem; font-weight: 800;">
                                {{ $trackSettings['track_' . $t . '_name'] }}
                            </h4>
                            <p style="margin: 0 0 12px 0; font-size: 0.95rem; font-weight: 700; color: #0f172a;">
                                {{ $trackSettings['track_' . $t . '_topic'] ?? '' }}
                            </p>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; font-size: 0.82rem;">
                                <div style="background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                    <strong style="color: #009688; display: block; margin-bottom: 3px; font-size: 0.75rem; text-transform: uppercase;">Chairperson</strong>
                                    {{ $trackSettings['track_' . $t . '_adjudicator'] ?? 'Not assigned' }}
                                </div>
                                <div style="background: #f8fafc; padding: 10px 14px; border-radius: 8px; border: 1px solid #e2e8f0;">
                                    <strong style="color: #475569; display: block; margin-bottom: 3px; font-size: 0.75rem; text-transform: uppercase;">Staff Incharge</strong>
                                    {{ $trackSettings['track_' . $t . '_staff'] ?? 'Not assigned' }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

            <!-- College Banner -->
            <div style="background: linear-gradient(135deg, #0f172a 0%, #009688 100%); border-radius: 14px; padding: 25px 20px; text-align: center; color: #ffffff;">
                <h3 style="color: #ffffff; font-size: 1.4rem; font-weight: 800; margin: 0 0 6px 0;">Madras Christian College</h3>
                <p style="font-size: 0.88rem; margin: 0 0 14px 0; opacity: 0.9;">Tambaram East, Chennai 600 059, Tamil Nadu, India</p>
                <a href="https://mcc.edu.in" target="_blank" style="background: #ffffff; color: #0f172a; padding: 6px 20px; border-radius: 20px; font-weight: 800; text-decoration: none; font-size: 0.78rem; text-transform: uppercase;">Visit Website</a>
            </div>

        </div>
    </div>

    <!-- 2. EDIT TABS NAVIGATION -->
    <div style="background: #ffffff; border-radius: 14px; border: 1px solid #e2e8f0; display: flex; gap: 10px; padding: 6px 15px; overflow-x: auto;">
        <button type="button" class="tab-btn active" onclick="switchAdminTab('tab-members', this)">
            <i class="fa-solid fa-users"></i> 1. Committee Members List ({{ $allMembers->count() }})
        </button>
        <button type="button" class="tab-btn" onclick="switchAdminTab('tab-add-member', this)">
            <i class="fa-solid fa-user-plus"></i> 2. Add New Member
        </button>
        <button type="button" class="tab-btn" onclick="switchAdminTab('tab-page-settings', this)">
            <i class="fa-solid fa-sliders"></i> 3. Page Titles & Text Settings
        </button>
    </div>

    <!-- TAB 1: MEMBERS LIST -->
    <div id="tab-members" class="admin-card-section">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.25rem; font-weight: 800; color: #0f172a;">
                Manage Committee Members
            </h3>
            <div style="display: flex; gap: 10px; align-items: center;">
                <select id="categoryFilter" onchange="filterMembersByCategory(this.value)" class="form-input" style="width: auto; padding: 8px 14px; font-size: 0.88rem;">
                    <option value="all">All Categories ({{ $allMembers->count() }})</option>
                    <option value="leadership">Leadership ({{ $leadership->flatten()->count() }})</option>
                    <option value="organizing_committee">Organizing Committee ({{ $organizing->count() }})</option>
                    <option value="advisory_committee">Advisory Board ({{ $advisory->count() }})</option>
                </select>
                <button type="button" onclick="switchAdminTab('tab-add-member', document.querySelectorAll('.tab-btn')[1])" style="background: #00A896; color: white; border: none; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                    <i class="fa-solid fa-plus"></i> Add Member
                </button>
            </div>
        </div>

        <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden;">
            <div style="display: grid; grid-template-columns: 2fr 1.5fr 1fr 100px 90px; gap: 15px; padding: 12px 18px; background: #f1f5f9; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; color: #475569; letter-spacing: 0.5px;">
                <div>Name & Title</div>
                <div>Designation / Department</div>
                <div>Category & Role</div>
                <div>Order</div>
                <div style="text-align: right;">Actions</div>
            </div>

            <div id="membersListWrap">
                @foreach($allMembers as $m)
                    <div class="member-table-row member-row" data-cat="{{ $m->category }}">
                        <div>
                            <strong style="color: #0f172a; font-size: 0.95rem; display: block;">{{ $m->name }}</strong>
                        </div>
                        <div style="color: #64748b; font-size: 0.85rem; line-height: 1.4;">
                            {!! nl2br(e($m->designation)) !!}
                        </div>
                        <div>
                            <span style="display: inline-block; background: #e0f2fe; color: #0284c7; padding: 3px 10px; border-radius: 20px; font-size: 0.72rem; font-weight: 800; text-transform: uppercase;">
                                {{ ucwords(str_replace('_', ' ', $m->subcategory ?: $m->category)) }}
                            </span>
                        </div>
                        <div style="color: #475569; font-weight: 700; font-size: 0.85rem;">
                            #{{ $m->sort_order }}
                        </div>
                        <div style="display: flex; justify-content: flex-end; gap: 8px;">
                            <button type="button" onclick='openEditModal(@json($m))' style="background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; width: 32px; height: 32px; border-radius: 6px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <form action="{{ route('admin.committee.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $m->name }}?');" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; width: 32px; height: 32px; border-radius: 6px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- TAB 2: ADD NEW MEMBER -->
    <div id="tab-add-member" class="admin-card-section" style="display: none;">
        <h3 style="margin: 0 0 20px 0; font-size: 1.25rem; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-user-plus" style="color: #00A896;"></i> Add New Committee Member
        </h3>

        <form action="{{ route('admin.committee.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label class="form-label">Full Name & Salutation</label>
                    <input type="text" name="name" placeholder="e.g. Dr. P. Wilson" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Main Category</label>
                    <select name="category" id="newMemberCategory" onchange="updateSubcategories(this.value, 'newMemberSubcategory')" class="form-input" required>
                        <option value="leadership">Leadership</option>
                        <option value="organizing_committee">Organizing Committee</option>
                        <option value="advisory_committee">Advisory Board</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label class="form-label">Subcategory / Role Badge</label>
                    <select name="subcategory" id="newMemberSubcategory" class="form-input">
                        <option value="chief_patron">Chief Patron</option>
                        <option value="patrons">Patron</option>
                        <option value="convenor">Convenor</option>
                        <option value="co_convenors">Co-Convenor</option>
                        <option value="organizing_secretaries">Organizing Secretary</option>
                        <option value="international">International Advisory</option>
                        <option value="national">National Advisory</option>
                        <option value="other">General Member</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Sort Order (Lower numbers appear first)</label>
                    <input type="number" name="sort_order" value="{{ ($allMembers->max('sort_order') ?? 0) + 1 }}" class="form-input" required>
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label class="form-label">Designation / Affiliation (New line supported)</label>
                <textarea name="designation" rows="3" placeholder="e.g. Principal &amp; Secretary&#10;Madras Christian College" class="form-input"></textarea>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 32px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Member
                </button>
            </div>
        </form>
    </div>

    <!-- TAB 3: PAGE SETTINGS -->
    <div id="tab-page-settings" class="admin-card-section" style="display: none;">
        <h3 style="margin: 0 0 20px 0; font-size: 1.25rem; font-weight: 800; color: #0f172a; display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-sliders" style="color: #00A896;"></i> Committee Page Headers &amp; Subtitles
        </h3>

        <form action="{{ route('admin.committee.settings.update') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label class="form-label">Hero Banner Title</label>
                    <input type="text" name="committee_hero_title" value="{{ $settings['committee_hero_title'] ?? 'COMMITTEE' }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Advisory Board Subtitle</label>
                    <input type="text" name="advisory_text" value="{{ $settings['advisory_text'] ?? 'Transforming one health in communities and environment research ecosystems across institutions and state stakeholders.' }}" class="form-input">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                <div>
                    <label class="form-label">College Banner Heading</label>
                    <input type="text" name="banner_title" value="{{ $settings['banner_title'] ?? 'Madras Christian College' }}" class="form-input">
                </div>
                <div>
                    <label class="form-label">College Banner Address</label>
                    <input type="text" name="banner_desc" value="{{ $settings['banner_desc'] ?? 'Tambaram East, Chennai 600 059, Tamil Nadu, India' }}" class="form-input">
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 32px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Header Settings
                </button>
            </div>
        </form>
    </div>

</div>

<!-- EDIT MODAL -->
<div id="editModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.7); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: white; border-radius: 16px; max-width: 600px; width: 100%; padding: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.25);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="margin: 0; font-size: 1.3rem; font-weight: 800; color: #0f172a;">Edit Committee Member</h3>
            <button type="button" onclick="closeEditModal()" style="background: none; border: none; font-size: 1.5rem; color: #64748b; cursor: pointer;">&times;</button>
        </div>

        <form id="editMemberForm" method="POST" action="">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 16px;">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" id="edit_name" class="form-input" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 16px;">
                <div>
                    <label class="form-label">Category</label>
                    <select name="category" id="edit_category" onchange="updateSubcategories(this.value, 'edit_subcategory')" class="form-input" required>
                        <option value="leadership">Leadership</option>
                        <option value="organizing_committee">Organizing Committee</option>
                        <option value="advisory_committee">Advisory Board</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Subcategory / Role</label>
                    <select name="subcategory" id="edit_subcategory" class="form-input">
                        <option value="chief_patron">Chief Patron</option>
                        <option value="patrons">Patron</option>
                        <option value="convenor">Convenor</option>
                        <option value="co_convenors">Co-Convenor</option>
                        <option value="organizing_secretaries">Organizing Secretary</option>
                        <option value="international">International Advisory</option>
                        <option value="national">National Advisory</option>
                        <option value="other">General Member</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" id="edit_sort_order" class="form-input" required>
            </div>

            <div style="margin-bottom: 24px;">
                <label class="form-label">Designation / Affiliation</label>
                <textarea name="designation" id="edit_designation" rows="3" class="form-input"></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeEditModal()" style="background: #f1f5f9; color: #475569; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 700; cursor: pointer;">Cancel</button>
                <button type="submit" style="background: #00A896; color: white; border: none; padding: 10px 24px; border-radius: 8px; font-weight: 700; cursor: pointer;">Update Member</button>
            </div>
        </form>
    </div>
</div>

<script>
function switchAdminTab(tabId, btn) {
    document.getElementById('tab-members').style.display = 'none';
    document.getElementById('tab-add-member').style.display = 'none';
    document.getElementById('tab-page-settings').style.display = 'none';
    
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    
    document.getElementById(tabId).style.display = 'block';
    btn.classList.add('active');
}

function filterMembersByCategory(cat) {
    const rows = document.querySelectorAll('.member-row');
    rows.forEach(r => {
        if (cat === 'all' || r.getAttribute('data-cat') === cat) {
            r.style.display = 'grid';
        } else {
            r.style.display = 'none';
        }
    });
}

function updateSubcategories(category, targetSelectId) {
    const select = document.getElementById(targetSelectId);
    select.innerHTML = '';
    
    if (category === 'leadership') {
        select.innerHTML = `
            <option value="chief_patron">Chief Patron</option>
            <option value="patrons">Patron</option>
            <option value="convenor">Convenor</option>
            <option value="co_convenors">Co-Convenor</option>
            <option value="organizing_secretaries">Organizing Secretary</option>
        `;
    } else if (category === 'advisory_committee') {
        select.innerHTML = `
            <option value="international">International Advisory</option>
            <option value="national">National Advisory</option>
            <option value="other">General Advisory</option>
        `;
    } else {
        select.innerHTML = `
            <option value="other">Organizing Member</option>
        `;
    }
}

function openEditModal(member) {
    document.getElementById('editMemberForm').action = '/admin/committee/' + member.id;
    document.getElementById('edit_name').value = member.name || '';
    document.getElementById('edit_category').value = member.category || 'leadership';
    
    updateSubcategories(member.category || 'leadership', 'edit_subcategory');
    document.getElementById('edit_subcategory').value = member.subcategory || 'other';
    
    document.getElementById('edit_sort_order').value = member.sort_order || 1;
    document.getElementById('edit_designation').value = member.designation || '';
    
    const modal = document.getElementById('editModal');
    modal.style.display = 'flex';
}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>
@endsection
