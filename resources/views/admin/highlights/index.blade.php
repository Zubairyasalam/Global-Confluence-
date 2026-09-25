@extends('layouts.admin_cms')

@section('header_title', 'Conference Highlights & Scientific Publications Settings')

@section('content')
<style>
    .page-title {
        color: #1a237e;
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    .page-title::before {
        content: '';
        display: block;
        width: 6px;
        height: 28px;
        background: linear-gradient(180deg, #009688 0%, #00796b 100%);
        border-radius: 10px;
    }

    .success-alert {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .config-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        padding: 30px;
        margin-bottom: 30px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .card-title {
        color: #1e293b;
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-title i {
        color: #009688;
    }

    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
        color: #334155;
        transition: all 0.3s;
        box-sizing: border-box;
    }
    .form-control:focus {
        border-color: #009688;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 150, 136, 0.1);
    }

    .btn-save {
        background: #009688;
        color: #ffffff;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.05rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #00796b;
        transform: translateY(-1px);
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
</style>

<div class="page-title">Conference Highlights & Scientific Publications</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.about.update') }}">
    @csrf

    <!-- Section Header Settings -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-heading"></i>
                Section Title Information
            </div>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Section Heading Title</label>
                <input type="text" name="highlights_title" class="form-control" value="{{ $settings['highlights_title'] ?? 'Conference Highlights' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Section Subtitle</label>
                <input type="text" name="highlights_subtitle" class="form-control" value="{{ $settings['highlights_subtitle'] ?? 'Key features and interactive forums scheduled for the Global One Health Confluence 2026' }}">
            </div>
        </div>
    </div>

    <!-- Scientific Publications Card -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-book-journal-whills"></i>
                Scientific Publications Box Configuration
            </div>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Box Heading Title</label>
                <input type="text" name="pub_title" class="form-control" value="{{ $settings['pub_title'] ?? 'Scientific Publications' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Box Subtitle / Description</label>
                <input type="text" name="pub_subtitle" class="form-control" value="{{ $settings['pub_subtitle'] ?? 'Selected peer-reviewed manuscripts will be considered for publication in:' }}">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Publication Option 1</label>
            <input type="text" name="pub_item_1" class="form-control" value="{{ $settings['pub_item_1'] ?? 'Scopus-indexed journals' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Publication Option 2</label>
            <input type="text" name="pub_item_2" class="form-control" value="{{ $settings['pub_item_2'] ?? 'Edited ISBN conference proceedings' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Publication Option 3</label>
            <input type="text" name="pub_item_3" class="form-control" value="{{ $settings['pub_item_3'] ?? 'Special issues with partnering international journals (subject to review)' }}">
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0; margin-bottom: 40px;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Settings
        </button>
    </div>
</form>

<hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 40px 0;">

<div class="page-title">Manage Highlight Items</div>

<style>
    .highlight-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    .highlight-title {
        font-weight: 600;
        color: var(--admin-sidebar);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .highlight-icon {
        color: var(--admin-primary);
        background: rgba(0, 150, 136, 0.1);
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
    }
    .highlight-actions {
        display: flex;
        gap: 8px;
    }
    .btn-icon {
        width: 32px;
        height: 32px;
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

    .responsive-grid-highlights {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
    }

    @media (max-width: 900px) {
        .responsive-grid-highlights {
            grid-template-columns: minmax(0, 1fr);
        }
    }
</style>

<div class="responsive-grid-highlights">
    
    <!-- Highlights List -->
    <div>
        <div class="nav-tabs">
            <a href="{{ route('admin.highlights', ['column' => 1]) }}" class="nav-tab {{ $column == 1 ? 'active' : '' }}">Column 1 Items</a>
            <a href="{{ route('admin.highlights', ['column' => 2]) }}" class="nav-tab {{ $column == 2 ? 'active' : '' }}">Column 2 Items</a>
            <a href="{{ route('admin.highlights', ['column' => 3]) }}" class="nav-tab {{ $column == 3 ? 'active' : '' }}">Column 3 Items</a>
        </div>

        <div class="config-card" style="margin-bottom: 30px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px; margin-top: 0;">Current Items in Column {{ $column }}</h3>
            
            @if(count($highlights) > 0)
                @foreach($highlights as $item)
                    <div class="highlight-card">
                        <div class="highlight-title">
                            <div class="highlight-icon"><i class="fa-solid fa-check"></i></div>
                            <div>
                                {{ $item->title }}
                                <div style="font-size: 0.8rem; color: #94a3b8; margin-top: 4px; font-weight: normal;">Sort Order: {{ $item->sort_order }}</div>
                            </div>
                        </div>
                        <div class="highlight-actions">
                            <button type="button" class="btn-icon btn-edit" title="Edit Item" onclick='editHighlight(@json($item))'>
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <form action="{{ route('admin.highlights.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Delete Item">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="color: #64748b;">No items added to this column yet.</p>
            @endif
        </div>
    </div>

    <!-- Add/Edit Form -->
    <div>
        <div class="config-card" style="position: sticky; top: 20px;">
            <h3 id="form-title" style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px; margin-top: 0;">Add New Item</h3>
            
            <form id="highlight-form" action="{{ route('admin.highlights.store') }}" method="POST">
                @csrf
                <div id="method-spoofing"></div>
                
                <input type="hidden" name="sort_order" id="sort_order" value="{{ count($highlights) + 1 }}">

                <div class="form-group" style="margin-bottom: 15px;">
                    <label class="form-label">Column</label>
                    <select name="column_number" id="column_number" required class="form-control">
                        <option value="1" {{ $column == 1 ? 'selected' : '' }}>Column 1</option>
                        <option value="2" {{ $column == 2 ? 'selected' : '' }}>Column 2</option>
                        <option value="3" {{ $column == 3 ? 'selected' : '' }}>Column 3</option>
                    </select>
                </div>

                <div class="form-group" style="margin-bottom: 25px;">
                    <label class="form-label">Highlight Title</label>
                    <input type="text" name="title" id="title" required class="form-control" placeholder="e.g. Plenary Sessions">
                </div>

                <button type="submit" id="submit-btn" class="btn-save" style="width: 100%; justify-content: center;">Add Item</button>
                <button type="button" id="cancel-btn" style="display: none; width: 100%; background: #e2e8f0; color: #475569; border: none; padding: 12px; border-radius: 8px; font-weight: 600; cursor: pointer; margin-top: 10px;" onclick="window.location.reload();">Cancel Edit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function editHighlight(item) {
        document.getElementById('form-title').innerText = 'Edit Highlight Item';
        
        let form = document.getElementById('highlight-form');
        form.action = `/admin/home/highlights/${item.id}`;
        
        document.getElementById('method-spoofing').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('title').value = item.title;
        document.getElementById('column_number').value = item.column_number;
        document.getElementById('sort_order').value = item.sort_order;

        document.getElementById('submit-btn').innerHTML = '<i class="fa-solid fa-pencil"></i> Update Item';
        document.getElementById('cancel-btn').style.display = 'block';
        
        window.scrollTo({ top: document.querySelector('.responsive-grid-highlights').offsetTop - 20, behavior: 'smooth' });
    }
</script>
@endsection
