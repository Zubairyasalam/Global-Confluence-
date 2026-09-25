@extends('layouts.admin_cms')

@section('header_title', 'Manage Committee')

@section('content')
<style>
    .speaker-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        align-items: center;
    }
    .speaker-info {
        flex: 1;
    }
    .speaker-title {
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--admin-sidebar);
        margin-bottom: 5px;
    }
    .speaker-meta {
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 5px;
    }
    .speaker-topic {
        font-size: 0.9rem;
        color: var(--admin-primary);
        font-weight: 600;
    }
    .speaker-actions {
        display: flex;
        gap: 10px;
    }
    .btn-icon {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        border: none;
        color: white;
        cursor: pointer;
    }
    .btn-edit { background: var(--admin-primary); }
    .btn-delete { background: #ef4444; }
    
    .nav-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 10px;
    }
    .nav-tab {
        padding: 8px 16px;
        text-decoration: none;
        color: #64748b;
        font-weight: 600;
        border-radius: 6px;
    }
    .nav-tab.active {
        background: var(--admin-primary);
        color: white;
    }

    .responsive-grid {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }

    @media (max-width: 900px) {
        .responsive-grid {
            grid-template-columns: minmax(0, 1fr);
        }
        .speaker-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .speaker-actions {
            margin-top: 10px;
        }
    }
</style>

<div class="responsive-grid">
    
    <!-- Members List -->
    <div>
        <div class="nav-tabs">
            <a href="{{ route('admin.committee', ['category' => 'leadership']) }}" class="nav-tab {{ $category == 'leadership' ? 'active' : '' }}">Leadership</a>
            <a href="{{ route('admin.committee', ['category' => 'organizing_committee']) }}" class="nav-tab {{ $category == 'organizing_committee' ? 'active' : '' }}">Organizing Committee</a>
            <a href="{{ route('admin.committee', ['category' => 'advisory_committee']) }}" class="nav-tab {{ $category == 'advisory_committee' ? 'active' : '' }}">Advisory Committee</a>
        </div>

        <div class="card" style="margin-bottom: 30px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Current {{ ucwords(str_replace('_', ' ', $category)) }} Members</h3>
            
            @if(count($members) > 0)
                @foreach($members as $member)
                    <div class="speaker-card">
                        @if($category === 'advisory_committee' && $member->icon)
                            <div style="font-size: 2rem; color: var(--admin-primary); margin-right: 15px;"><i class="{{ $member->icon }}"></i></div>
                        @endif
                        <div class="speaker-info">
                            <div class="speaker-title">{{ $member->name }}</div>
                            <div class="speaker-meta">
                                @if($category === 'leadership' || $category === 'advisory_committee')
                                    <strong>Subcategory:</strong> {{ ucwords(str_replace('_', ' ', $member->subcategory)) }} |
                                @endif
                                @if($member->designation)
                                    <strong>Designation:</strong> {{ $member->designation }} |
                                @endif
                                <strong>Order:</strong> {{ $member->sort_order }}
                            </div>
                        </div>
                        <div class="speaker-actions">
                            <button type="button" class="btn-icon btn-edit" title="Edit Member" onclick='editMember(@json($member))'>
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <form action="{{ route('admin.committee.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this member?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Delete Member">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="color: #64748b;">No members added yet.</p>
            @endif
        </div>
    </div>

    <!-- Add/Edit Form -->
    <div>
        <div class="card" style="position: sticky; top: 20px; max-height: calc(100vh - 40px); overflow-y: auto;">
            <h3 id="form-title" style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Add New Member</h3>
            
            <form id="member-form" action="{{ route('admin.committee.store') }}" method="POST">
                @csrf
                <div id="method-spoofing"></div>
                
                <input type="hidden" name="sort_order" id="sort_order" value="{{ count($members) + 1 }}">
                <input type="hidden" name="category" id="category" value="{{ $category }}">

                @if($category === 'leadership')
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Leadership Role</label>
                    <select name="subcategory" id="subcategory" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                        <option value="chief_patron">Chief - Patron</option>
                        <option value="patrons">Patrons</option>
                        <option value="convenor">Convenors</option>
                        <option value="co_convenors">Co-Convenors</option>
                        <option value="organizing_secretaries">Organizing Secretaries</option>
                    </select>
                </div>
                @endif

                @if($category === 'advisory_committee')
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Advisory Role (Subcategory)</label>
                    <select name="subcategory" id="subcategory" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                        <option value="international">International Advisory Committee</option>
                        <option value="national">National Advisory Committee</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                @endif

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Full Name</label>
                    <input type="text" name="name" id="name" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Designation / Details</label>
                    <textarea name="designation" id="designation" rows="2" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;"></textarea>
                    <small style="color: #64748b;">(Optional. For multi-line, it will break if you have a very long line. Better keep it short)</small>
                </div>

                @if($category === 'advisory_committee')
                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" id="icon" value="fa-solid fa-user-shield" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>
                @endif

                <button type="submit" id="submit-btn" class="btn btn-primary" style="width: 100%; background: var(--admin-primary); color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">Save Member</button>
                <button type="button" id="cancel-btn" style="display: none; width: 100%; background: #e2e8f0; color: #475569; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer; margin-top: 10px;" onclick="window.location.reload();">Cancel Edit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function editMember(member) {
        document.getElementById('form-title').innerText = 'Edit Member';
        
        let form = document.getElementById('member-form');
        form.action = `/admin/committee/${member.id}`;
        
        document.getElementById('method-spoofing').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('name').value = member.name;
        document.getElementById('designation').value = member.designation || '';
        document.getElementById('sort_order').value = member.sort_order;
        document.getElementById('category').value = member.category;
        
        if (document.getElementById('subcategory')) {
            document.getElementById('subcategory').value = member.subcategory;
        }
        if (document.getElementById('icon')) {
            document.getElementById('icon').value = member.icon;
        }

        document.getElementById('submit-btn').innerText = 'Update Member';
        document.getElementById('cancel-btn').style.display = 'block';
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
@endsection
