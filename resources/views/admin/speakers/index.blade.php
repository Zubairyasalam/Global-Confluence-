@extends('layouts.admin_cms')

@section('header_title', 'Manage Speakers')

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
    .speaker-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
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
        .speaker-img {
            width: 100%;
            height: auto;
            max-width: 200px;
        }
        .speaker-actions {
            margin-top: 10px;
        }
    }
</style>

<div class="responsive-grid">
    
    <!-- Speakers List -->
    <div>
        <div class="nav-tabs">
            <a href="{{ route('admin.experts', ['type' => 'keynote']) }}" class="nav-tab {{ $type == 'keynote' ? 'active' : '' }}">Keynote Speakers</a>
            <a href="{{ route('admin.experts', ['type' => 'distinguished']) }}" class="nav-tab {{ $type == 'distinguished' ? 'active' : '' }}">Distinguished Speakers</a>
        </div>

        <div class="card" style="margin-bottom: 30px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Current {{ ucfirst($type) }} Speakers</h3>
            
            @if(count($speakers) > 0)
                @foreach($speakers as $speaker)
                    <div class="speaker-card">
                        <img src="{{ asset($speaker->image_path) }}" class="speaker-img" alt="{{ $speaker->name }}">
                        <div class="speaker-info">
                            <div class="speaker-title">{{ $speaker->name }}</div>
                            <div class="speaker-meta">
                                @if($speaker->h_index)<strong>H-Index:</strong> {{ $speaker->h_index }} | @endif
                                <strong>University:</strong> {{ $speaker->university }} |
                                <strong>Country:</strong> {{ $speaker->country }} |
                                <strong>Order:</strong> {{ $speaker->sort_order }}
                            </div>
                            @if($speaker->title)
                            <div class="speaker-topic">Title: {{ $speaker->title }}</div>
                            @endif
                        </div>
                        <div class="speaker-actions">
                            <button type="button" class="btn-icon btn-edit" title="Edit Speaker" onclick='editSpeaker(@json($speaker))'>
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <form action="{{ route('admin.speakers.destroy', $speaker->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this speaker?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Delete Speaker">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="color: #64748b;">No speakers added yet.</p>
            @endif
        </div>
    </div>

    <!-- Add/Edit Form -->
    <div>
        <div class="card" style="position: sticky; top: 20px; max-height: calc(100vh - 40px); overflow-y: auto;">
            <h3 id="form-title" style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Add New {{ ucfirst($type) }} Speaker</h3>
            
            <form id="speaker-form" action="{{ route('admin.speakers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="method-spoofing"></div>
                
                <input type="hidden" name="sort_order" id="sort_order" value="{{ count($speakers) + 1 }}">

                <div class="form-group" style="margin-bottom: 15px;">
                    <label class="form-label" style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Speaker Type *</label>
                    <select name="type" id="type" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                        <option value="keynote" {{ $type == 'keynote' ? 'selected' : '' }}>Keynote Speaker</option>
                        <option value="distinguished" {{ $type == 'distinguished' ? 'selected' : '' }}>Distinguished Speaker</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Full Name</label>
                    <input type="text" name="name" id="name" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">H-Index (Optional)</label>
                    <input type="text" name="h_index" id="h_index" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">University / Institution</label>
                    <input type="text" name="university" id="university" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Country</label>
                    <input type="text" name="country" id="country" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Presentation Title (Optional for some)</label>
                    <textarea name="title" id="title" rows="3" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;"></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Speaker Photo (Square Recommended)</label>
                    <input type="file" name="image" id="image" accept="image/*" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                    <small id="image-help" style="color: #64748b; display: block; margin-top: 5px;">Upload a new image to change.</small>
                </div>

                <button type="submit" id="submit-btn" class="btn btn-primary" style="width: 100%; background: var(--admin-primary); color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">Save Speaker</button>
                <button type="button" id="cancel-btn" style="display: none; width: 100%; background: #e2e8f0; color: #475569; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer; margin-top: 10px;" onclick="window.location.reload();">Cancel Edit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function editSpeaker(speaker) {
        document.getElementById('form-title').innerText = 'Edit Speaker';
        
        let form = document.getElementById('speaker-form');
        form.action = `/admin/experts/${speaker.id}`;
        
        document.getElementById('method-spoofing').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('name').value = speaker.name;
        document.getElementById('h_index').value = speaker.h_index || '';
        document.getElementById('university').value = speaker.university;
        document.getElementById('country').value = speaker.country;
        document.getElementById('title').value = speaker.title || '';
        document.getElementById('sort_order').value = speaker.sort_order;
        document.getElementById('type').value = speaker.type;
        
        let imgInput = document.getElementById('image');
        imgInput.required = false; // Not required when editing
        document.getElementById('image-help').innerText = 'Leave empty to keep current photo.';

        document.getElementById('submit-btn').innerText = 'Update Speaker';
        document.getElementById('cancel-btn').style.display = 'block';
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
@endsection
