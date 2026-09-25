@extends('layouts.admin_cms')

@section('header_title', 'Manage Topics of Discussion')

@section('content')
<style>
    .topic-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        gap: 15px;
    }
    .topic-title {
        font-weight: 600;
        color: var(--admin-sidebar);
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .topic-meta {
        font-size: 0.85rem;
        color: #64748b;
        margin-top: 5px;
        margin-left: 26px;
    }
    .topic-actions {
        display: flex;
        gap: 10px;
        flex-shrink: 0;
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
        .topic-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .header-settings-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>

<div class="responsive-grid" style="margin-bottom: 30px;">
    <!-- Topics Header Settings -->
    <div class="card" style="grid-column: 1 / -1;">
        <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Topics Section Header (Topics Of Discussion)</h3>
        @php
            $topicsSettings = isset($settings['topics']) ? $settings['topics']->pluck('value', 'key')->toArray() : [];
        @endphp
        <form method="POST" action="{{ route('admin.topics.update_settings') }}" enctype="multipart/form-data">
            @csrf
            <div class="header-settings-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Heading (Black Text)</label>
                    <input type="text" name="topics_title_black" value="{{ $topicsSettings['topics_title_black'] ?? 'Topics Of' }}" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>
                <div class="form-group">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Heading (Color Text)</label>
                    <input type="text" name="topics_title_color" value="{{ $topicsSettings['topics_title_color'] ?? 'Discussion' }}" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Subtitle</label>
                <input type="text" name="topics_subtitle" value="{{ $topicsSettings['topics_subtitle'] ?? 'Science That Shapes Tomorrow\'s World' }}" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
            </div>
            <div style="margin-top: 20px; text-align: right;">
                <button type="submit" class="btn" style="background: var(--admin-primary); color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; cursor: pointer;">Save Header</button>
            </div>
        </form>
    </div>
</div>

<div class="responsive-grid">
    
    <!-- Topics List -->
    <div>
        <div class="nav-tabs">
            <a href="{{ route('admin.topics', ['column' => 1]) }}" class="nav-tab {{ $column == 1 ? 'active' : '' }}">Column 1</a>
            <a href="{{ route('admin.topics', ['column' => 2]) }}" class="nav-tab {{ $column == 2 ? 'active' : '' }}">Column 2</a>
            <a href="{{ route('admin.topics', ['column' => 3]) }}" class="nav-tab {{ $column == 3 ? 'active' : '' }}">Column 3</a>
        </div>

        <div class="card" style="margin-bottom: 30px;">
            <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Topics in Column {{ $column }}</h3>
            
            @if(count($topics) > 0)
                @foreach($topics as $topic)
                    <div class="topic-card">
                        <div>
                            <div class="topic-title">
                                <i class="fa-solid fa-circle-check" style="color: var(--admin-primary);"></i>
                                {{ $topic->title }}
                            </div>
                            <div class="topic-meta">
                                <strong>Order:</strong> {{ $topic->sort_order }}
                            </div>
                        </div>
                        <div class="topic-actions">
                            <button type="button" class="btn-icon btn-edit" title="Edit Topic" onclick='editTopic(@json($topic))'>
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <form action="{{ route('admin.topics.destroy', $topic->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this topic?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Delete Topic">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p style="color: #64748b;">No topics added to this column yet.</p>
            @endif
        </div>
    </div>

    <!-- Add/Edit Form -->
    <div>
        <div class="card" style="position: sticky; top: 20px;">
            <h3 id="form-title" style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Add New Topic</h3>
            
            <form id="topic-form" action="{{ route('admin.topics.store') }}" method="POST">
                @csrf
                <div id="method-spoofing"></div>
                
                <input type="hidden" name="column_number" id="column_number" value="{{ $column }}">
                <input type="hidden" name="sort_order" id="sort_order" value="{{ count($topics) + 1 }}">

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Topic Title</label>
                    <input type="text" name="title" id="title" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                </div>

                <button type="submit" id="submit-btn" class="btn btn-primary" style="width: 100%; background: var(--admin-primary); color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer; margin-top: 10px;">Save Topic</button>
                <button type="button" id="cancel-btn" style="display: none; width: 100%; background: #e2e8f0; color: #475569; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer; margin-top: 10px;" onclick="window.location.reload();">Cancel Edit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function editTopic(topic) {
        document.getElementById('form-title').innerText = 'Edit Topic';
        
        let form = document.getElementById('topic-form');
        form.action = `/admin/topics/${topic.id}`;
        
        document.getElementById('method-spoofing').innerHTML = '<input type="hidden" name="_method" value="PUT">';
        
        document.getElementById('title').value = topic.title;
        document.getElementById('column_number').value = topic.column_number;
        document.getElementById('sort_order').value = topic.sort_order;
        
        document.getElementById('submit-btn').innerText = 'Update Topic';
        document.getElementById('cancel-btn').style.display = 'block';
        
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
@endsection
