@extends('layouts.admin_cms')

@section('header_title', 'Registration Settings')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Registration Page Settings</h2>
        <p style="color: #64748b; font-size: 0.9rem;">Manage the content and fields displayed on the Registration page.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <style>
        .responsive-grid-1-2 {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }
        @media (max-width: 900px) {
            .responsive-grid-1-2 {
                grid-template-columns: minmax(0, 1fr);
            }
        }
    </style>

    <form method="POST" action="{{ route('admin.settings.registration.update') }}">
        @csrf
        <div style="display: flex; flex-direction: column; gap: 30px;">
            
            <!-- SECTION 1: HEADER TITLE & SUBTITLE -->
            <div class="card" style="margin-bottom: 0;">
                <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border); display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-heading" style="color: #009688;"></i> 1. Registration Plans Header Settings
                </h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Section Heading Title</label>
                        <input type="text" name="reg_section_title" value="{{ $settings['reg_section_title'] ?? 'Registration Plans' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Section Subtitle / Description</label>
                        <input type="text" name="reg_section_sub" value="{{ $settings['reg_section_sub'] ?? 'Choose the appropriate registration tier to access the conference. Super early-bird rates are currently active.' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                </div>
            </div>

            <!-- SECTION 2: REGISTRATION PROCESS BOX -->
            <div class="card" style="margin-bottom: 0;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border);">
                    <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin: 0; display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-list-check" style="color: #009688;"></i> 2. Registration Process Box Settings
                    </h3>
                    <button type="button" class="btn" style="background: #f1f5f9; color: #0f172a; border: 1px dashed #cbd5e1; padding: 6px 14px; font-weight: 600; font-size: 0.85rem;" onclick="addRegStepItem()">
                        <i class="fa-solid fa-plus"></i> Add Step Item
                    </button>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Process Box Main Title</label>
                        <input type="text" name="reg_proc_title" value="{{ $settings['reg_proc_title'] ?? 'Registration Process of GOHC - 2026' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Process Subtitle Note</label>
                        <input type="text" name="reg_proc_sub" value="{{ $settings['reg_proc_sub'] ?? 'Participation in GOHC 2026 is open only to registered delegates..' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Steps Section Subheading</label>
                        <input type="text" name="reg_proc_heading" value="{{ $settings['reg_proc_heading'] ?? 'Steps for Conference Registration' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;">
                    </div>
                </div>

                <h4 style="font-size: 1rem; color: var(--admin-sidebar); margin: 15px 0 15px; font-weight: 700;">Registration Process Bullet Steps</h4>

                <div id="reg-steps-wrapper">
                    @for($i = 1; $i <= 20; $i++)
                        @if(isset($settings['reg_step_' . $i]))
                        <div class="reg-step-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 15px; margin-bottom: 12px;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                                <label style="font-weight: 600; color: #009688; font-size: 0.85rem; margin: 0;">Step Text</label>
                                <button type="button" style="background: rgba(239,68,68,0.1); color: #ef4444; border: 1px solid rgba(239,68,68,0.2); padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; cursor: pointer;" onclick="this.closest('.reg-step-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                            </div>
                            <input type="text" name="reg_steps[]" value="{{ $settings['reg_step_' . $i] }}" style="width: 100%; padding: 10px 12px; border: 1px solid var(--admin-border); border-radius: 6px; font-size: 0.9rem;">
                        </div>
                        @endif
                    @endfor
                </div>
            </div>

        </div>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn btn-primary" style="padding: 12px 30px; font-size: 1.05rem; background: #009688;">
                <i class="fa-solid fa-save"></i> Save Registration Settings
            </button>
        </div>
    </form>

    <div style="margin-top: 50px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem; margin-bottom: 10px;">Dropdown Options: "Interested In"</h2>
        <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 25px;">Manage the list of options available in the 'Select Interested In' dropdown on the registration form.</p>

        <div class="responsive-grid-1-2">
            <div class="card" style="align-self: start;">
                <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border);">Add New Option</h3>
                
                <form action="{{ route('admin.interest_options.store') }}" method="POST">
                    @csrf
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Option Name <span style="color: #ef4444;">*</span></label>
                        <input type="text" name="name" required placeholder="e.g., Virtual Attendee" style="width: 100%; padding: 12px; border: 1px solid var(--admin-border); border-radius: 8px;">
                    </div>
                    
                    <div style="margin-bottom: 25px;">
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Sort Order</label>
                        <input type="number" name="sort_order" value="0" style="width: 100%; padding: 12px; border: 1px solid var(--admin-border); border-radius: 8px;">
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">Add Option</button>
                </form>
            </div>

            <div class="card">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap;">
                        <thead>
                            <tr>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600; font-size: 0.85rem; text-transform: uppercase;">Option Name</th>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; width: 100px;">Sort</th>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600; font-size: 0.85rem; text-transform: uppercase; width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($interestOptions as $option)
                                <tr style="border-bottom: 1px solid var(--admin-border);">
                                    <td style="padding: 15px; font-weight: 600; color: var(--admin-sidebar);">{{ $option->name }}</td>
                                    <td style="padding: 15px; color: var(--admin-text);">{{ $option->sort_order }}</td>
                                    <td style="padding: 15px;">
                                        <form method="POST" action="{{ route('admin.interest_options.delete', $option->id) }}" onsubmit="return confirm('Delete this option?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid #ef4444; padding: 6px 12px; font-size: 0.85rem; border-radius: 4px; cursor: pointer;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" style="padding: 20px; text-align: center; color: var(--admin-text);">No options defined yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Policies Section -->
    <div style="margin-top: 50px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <div>
                <h2 style="color: var(--admin-sidebar); font-size: 1.5rem; margin-bottom: 5px;">Registration Policies (Accordions)</h2>
                <p style="color: #64748b; font-size: 0.9rem;">Manage the "What's Included" and "Cancellation Policy" accordions shown on the registration page.</p>
            </div>
            <button class="btn btn-primary" onclick="openModal('addModal')" style="display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-plus"></i> Add New Policy
            </button>
        </div>

        <div class="card">
            @if(count($policies) > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left; white-space: nowrap;">
                        <thead>
                            <tr>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600; width: 80px;">Order</th>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600;">Title</th>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600;">Status</th>
                                <th style="padding: 15px; border-bottom: 2px solid var(--admin-border); color: #64748b; font-weight: 600; text-align: right;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($policies as $policy)
                                <tr style="border-bottom: 1px solid var(--admin-border);">
                                    <td style="padding: 15px; color: var(--admin-text);">{{ $policy->sort_order }}</td>
                                    <td style="padding: 15px; font-weight: 600; color: var(--admin-sidebar);">{{ $policy->title }}</td>
                                    <td style="padding: 15px;">
                                        @if($policy->is_active)
                                            <span style="background: rgba(164, 198, 57, 0.15); color: #627722; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">Active</span>
                                        @else
                                            <span style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">Disabled</span>
                                        @endif
                                    </td>
                                    <td style="padding: 15px; text-align: right;">
                                        <div style="display: flex; gap: 10px; justify-content: flex-end;">
                                            <button class="btn" style="background: #e2e8f0; color: #475569; padding: 6px 12px;" onclick='openEditModal(@json($policy))'>
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                            <form method="POST" action="{{ route('admin.policies.delete', $policy->id) }}" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn" style="background: #fee2e2; color: #ef4444; padding: 6px 12px;">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p style="text-align: center; color: #94a3b8; padding: 30px;">No policies created yet.</p>
            @endif
        </div>
    </div>

    <!-- Modals -->
    <style>
        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(17, 35, 64, 0.7); z-index: 1000; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
        .modal-container { background: #fff; border-radius: 12px; width: 90%; max-width: 800px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); animation: slideUp 0.3s ease; overflow: hidden;}
        .modal-header { padding: 20px 25px; border-bottom: 1px solid var(--admin-border); display: flex; justify-content: space-between; align-items: center; background: var(--admin-sidebar); color: #fff; }
        .modal-body { padding: 30px; max-height: 70vh; overflow-y: auto;}
        .form-group-modal { margin-bottom: 20px; }
        .form-label-modal { display: block; font-weight: 600; color: var(--admin-sidebar); margin-bottom: 8px; font-size: 0.9rem; }
        .form-control-modal { width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem; }
        .checkbox-group-modal { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
    </style>

    <!-- Add Modal -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem;">Add New Policy</h3>
                <button onclick="closeModal('addModal')" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" action="{{ route('admin.policies.store') }}">
                @csrf
                <div class="modal-body">
                    <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 15px;">
                        <div class="form-group-modal">
                            <label class="form-label-modal">Policy Title</label>
                            <input type="text" name="title" class="form-control-modal" required placeholder="e.g. CANCELLATION POLICY">
                        </div>
                        <div class="form-group-modal">
                            <label class="form-label-modal">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control-modal" value="0">
                        </div>
                    </div>
                    <div class="form-group-modal">
                        <label class="form-label-modal">Content (HTML allowed)</label>
                        <textarea name="content_html" class="form-control-modal" rows="10" required placeholder="<ul><li>Rule 1</li></ul>"></textarea>
                    </div>
                    <div class="checkbox-group-modal">
                        <input type="checkbox" name="is_active" id="active1" value="1" checked>
                        <label for="active1" style="color: var(--admin-text); font-size: 0.95rem;">Active (Visible on frontend)</label>
                    </div>
                </div>
                <div style="padding: 20px 30px; border-top: 1px solid var(--admin-border); text-align: right; background: #f8fafc;">
                    <button type="button" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;" onclick="closeModal('addModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Policy</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal-overlay" id="editModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem;">Edit Policy</h3>
                <button onclick="closeModal('editModal')" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 15px;">
                        <div class="form-group-modal">
                            <label class="form-label-modal">Policy Title</label>
                            <input type="text" name="title" id="edit_title" class="form-control-modal" required>
                        </div>
                        <div class="form-group-modal">
                            <label class="form-label-modal">Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort" class="form-control-modal">
                        </div>
                    </div>
                    <div class="form-group-modal">
                        <label class="form-label-modal">Content (HTML allowed)</label>
                        <textarea name="content_html" id="edit_content" class="form-control-modal" rows="10" required></textarea>
                    </div>
                    <div class="checkbox-group-modal">
                        <input type="checkbox" name="is_active" id="edit_active" value="1">
                        <label for="edit_active" style="color: var(--admin-text); font-size: 0.95rem;">Active (Visible on frontend)</label>
                    </div>
                </div>
                <div style="padding: 20px 30px; border-top: 1px solid var(--admin-border); text-align: right; background: #f8fafc;">
                    <button type="button" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;" onclick="closeModal('editModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Policy</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) { document.getElementById(id).style.display = 'flex'; }
        function closeModal(id) { document.getElementById(id).style.display = 'none'; }
        
        function openEditModal(policy) {
            document.getElementById('editForm').action = '/admin/policies/' + policy.id;
            document.getElementById('edit_title').value = policy.title;
            document.getElementById('edit_sort').value = policy.sort_order;
            document.getElementById('edit_content').value = policy.content_html;
            document.getElementById('edit_active').checked = policy.is_active ? true : false;
            openModal('editModal');
        }

        function addRegStepItem() {
            const html = `
            <div class="reg-step-item" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 15px; margin-bottom: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <label style="font-weight: 600; color: #009688; font-size: 0.85rem; margin: 0;">New Step Text</label>
                    <button type="button" style="background: rgba(239,68,68,0.1); color: #ef4444; border: 1px solid rgba(239,68,68,0.2); padding: 2px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 600; cursor: pointer;" onclick="this.closest('.reg-step-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                </div>
                <input type="text" name="reg_steps[]" placeholder="Enter step description" style="width: 100%; padding: 10px 12px; border: 1px solid var(--admin-border); border-radius: 6px; font-size: 0.9rem;">
            </div>`;
            document.getElementById('reg-steps-wrapper').insertAdjacentHTML('beforeend', html);
        }
    </script>
@endsection
