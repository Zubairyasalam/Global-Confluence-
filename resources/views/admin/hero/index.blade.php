@extends('layouts.admin_cms')

@section('header_title', 'Hero Banner Configuration')

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
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
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
            color: #3b82f6;
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
        }
        .form-control:focus {
            border-color: #3b82f6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn-primary {
            background: #eef2ff;
            color: #4f46e5;
            border: 1px solid #e0e7ff;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-primary:hover {
            background: #e0e7ff;
        }

        .btn-save {
            background: #2563eb;
            color: #ffffff;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.05rem;
            cursor: pointer;
            transition: background 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-save:hover {
            background: #1d4ed8;
        }

        .organizer-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .organizer-item {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 12px;
            transition: all 0.2s;
        }
        .organizer-item:hover {
            border-color: #cbd5e1;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .drag-handle {
            cursor: grab;
            color: #94a3b8;
            padding: 0 10px;
        }
        .drag-handle:active {
            cursor: grabbing;
        }
        
        .btn-icon {
            background: none;
            border: none;
            cursor: pointer;
            color: #ef4444;
            padding: 8px;
            border-radius: 6px;
            transition: background 0.2s;
        }
        .btn-icon:hover {
            background: #fee2e2;
        }
        .btn-icon.edit { color: #3b82f6; }
        .btn-icon.edit:hover { background: #dbeafe; }

    </style>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <div class="page-title" style="margin-bottom: 0;">
            Hero Banner Configuration
        </div>
        <a href="{{ route('admin.home') }}" style="color: #64748b; font-size: 1.5rem; text-decoration: none; padding: 5px 10px; border-radius: 6px; transition: background 0.2s;" onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='transparent'" title="Close">
            <i class="fa-solid fa-xmark"></i>
        </a>
    </div>

    @if(session('success'))
        <div class="success-alert">
            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Section Header Details -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-user-group"></i> Section Header Details
            </div>
        </div>

        <form method="POST" action="{{ route('admin.hero.update') }}" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 25px;">
                <div class="form-group">
                    <label class="form-label">Institution Name</label>
                    <input type="text" name="hero_institution" class="form-control" value="{{ $settings['hero']->where('key', 'hero_institution')->first()->value ?? 'Madras Christian College' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Institution Subtitle/Type</label>
                    <input type="text" name="hero_institution_type" class="form-control" value="{{ $settings['hero']->where('key', 'hero_institution_type')->first()->value ?? 'Autonomous' }}">
                </div>

                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label">Institution Address</label>
                    <input type="text" name="hero_institution_address" class="form-control" value="{{ $settings['hero']->where('key', 'hero_institution_address')->first()->value ?? 'Tambaram East, Chennai – 600059, Tamil Nadu, India' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Pre-Title (e.g. organizes)</label>
                    <input type="text" name="hero_pre_title" class="form-control" value="{{ $settings['hero']->where('key', 'hero_pre_title')->first()->value ?? 'organizes' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Main Title (Part 1)</label>
                    <input type="text" name="hero_title_part1" class="form-control" placeholder="e.g. GLOBAL" value="{{ $settings['hero']->where('key', 'hero_title_part1')->first()->value ?? 'GLOBAL' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Main Title (Highlighted Part)</label>
                    <input type="text" name="hero_title_highlight" class="form-control" placeholder="e.g. ONE HEALTH" value="{{ $settings['hero']->where('key', 'hero_title_highlight')->first()->value ?? 'ONE HEALTH' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Main Title (Part 3)</label>
                    <input type="text" name="hero_title_part2" class="form-control" placeholder="e.g. CONFLUENCE 2026" value="{{ $settings['hero']->where('key', 'hero_title_part2')->first()->value ?? 'CONFLUENCE 2026' }}">
                </div>

                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label">Subtitle (e.g. Bridging Microbes...)</label>
                    <input type="text" name="hero_subtitle" class="form-control" value="{{ $settings['hero']->where('key', 'hero_subtitle')->first()->value ?? 'Bridging Microbes, Molecules & Mankind for Sustainability' }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Dates</label>
                    <input type="text" name="hero_dates" class="form-control" value="{{ $settings['hero']->where('key', 'hero_dates')->first()->value ?? 'DECEMBER 21-22, 2026' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Mode (e.g. HYBRID MODE)</label>
                    <input type="text" name="hero_mode" class="form-control" value="{{ $settings['hero']->where('key', 'hero_mode')->first()->value ?? 'HYBRID MODE' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Button Text</label>
                    <input type="text" name="hero_btn1_text" class="form-control" value="{{ $settings['hero']->where('key', 'hero_btn1_text')->first()->value ?? 'REGISTER NOW' }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Button Link</label>
                    <input type="text" name="hero_btn1_link" class="form-control" placeholder="e.g. #registration or /register" value="{{ $settings['hero']->where('key', 'hero_btn1_link')->first()->value ?? '' }}">
                </div>

                <div class="form-group" style="grid-column: 1 / -1;">
                    <label class="form-label">Background Image</label>
                    <input type="file" name="hero_bg_image" class="form-control" accept="image/*">
                    @php $bg = $settings['hero']->where('key', 'hero_bg_image')->first()->value ?? ''; @endphp
                    @if($bg)
                        <div style="margin-top: 10px;">
                            <img src="{{ asset($bg) }}" alt="Hero Background" style="max-height: 80px; border-radius: 8px; border: 1px solid #cbd5e1;">
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Hide Topbar inputs from original UI but keep them so they don't get lost or implement them if requested. Just doing hero fields based on image 2 -->
            
            <div style="text-align: right; margin-top: 20px;">
                <button type="submit" class="btn-save">Save Details</button>
            </div>
        </form>
    </div>

    <!-- Organizers Directory -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-address-book"></i> Organizers Directory
                <span style="font-size: 0.85rem; font-weight: normal; color: #ef4444; margin-left: 15px;">
                    Make the members reorder or rearrange the listing position like drag and drop feature
                </span>
            </div>
            <button class="btn-primary" onclick="openModal('addOrganizerModal')">
                <i class="fa-solid fa-plus"></i> Add New Organizer
            </button>
        </div>

        <ul class="organizer-list" id="sortable-organizers">
            @foreach($organizers as $org)
                <li class="organizer-item" data-id="{{ $org->id }}">
                    <div class="drag-handle"><i class="fa-solid fa-grip-vertical"></i></div>
                    
                    <div style="flex-grow: 1;">
                        <span style="font-size: 0.8rem; color: #64748b; font-weight: 600; display: block; margin-bottom: 4px;">ORGANIZER NAME</span>
                        <div style="font-weight: 500; color: #1e293b;">{{ $org->name }}</div>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button class="btn-icon edit" onclick="openEditModal({{ $org->id }}, '{{ addslashes($org->name) }}')">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <form action="{{ route('admin.hero.organizers.destroy', $org->id) }}" method="POST" onsubmit="return confirm('Delete this organizer?');" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-icon">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>


    <!-- Modals -->
    <style>
        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.6); z-index: 1000; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
        .modal-container { background: #fff; border-radius: 12px; width: 90%; max-width: 500px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); overflow: hidden; }
        .modal-header { padding: 20px 25px; border-bottom: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; background: #f8fafc; }
        .modal-body { padding: 30px 25px; }
        .modal-footer { padding: 15px 25px; border-top: 1px solid #f1f5f9; text-align: right; background: #f8fafc; }
    </style>

    <!-- Add Modal -->
    <div class="modal-overlay" id="addOrganizerModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem; color: #1e293b;">Add Organizer</h3>
                <button onclick="closeModal('addOrganizerModal')" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" action="{{ route('admin.hero.organizers.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label class="form-label">Organizer Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. DEPARTMENT OF MICROBIOLOGY">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: none; border: none; font-weight: 600; color: #64748b; margin-right: 15px; cursor: pointer;" onclick="closeModal('addOrganizerModal')">Cancel</button>
                    <button type="submit" class="btn-primary" style="padding: 10px 20px;">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal-overlay" id="editOrganizerModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem; color: #1e293b;">Edit Organizer</h3>
                <button onclick="closeModal('editOrganizerModal')" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #94a3b8;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" id="editOrganizerForm">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="form-group mb-0">
                        <label class="form-label">Organizer Name</label>
                        <input type="text" name="name" id="editOrgName" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" style="background: none; border: none; font-weight: 600; color: #64748b; margin-right: 15px; cursor: pointer;" onclick="closeModal('editOrganizerModal')">Cancel</button>
                    <button type="submit" class="btn-primary" style="padding: 10px 20px;">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        function openModal(id) { document.getElementById(id).style.display = 'flex'; }
        function closeModal(id) { document.getElementById(id).style.display = 'none'; }
        
        function openEditModal(id, name) {
            document.getElementById('editOrganizerForm').action = '/admin/hero/organizers/' + id;
            document.getElementById('editOrgName').value = name;
            openModal('editOrganizerModal');
        }

        // Initialize drag and drop
        document.addEventListener('DOMContentLoaded', function() {
            var el = document.getElementById('sortable-organizers');
            var sortable = Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function () {
                    // Get new order
                    let order = [];
                    document.querySelectorAll('#sortable-organizers .organizer-item').forEach(function(item) {
                        order.push(item.getAttribute('data-id'));
                    });
                    
                    // Send ajax request to save order
                    fetch('{{ route('admin.hero.organizers.reorder') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order: order })
                    }).then(response => response.json())
                      .then(data => {
                          if(!data.success) alert('Failed to save new order.');
                      });
                }
            });
        });
    </script>
@endsection
