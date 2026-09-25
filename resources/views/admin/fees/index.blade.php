@extends('layouts.admin_cms')

@section('header_title', 'Manage Registration Fees')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Pricing Plans</h2>
        <button class="btn" onclick="openModal('addModal')" style="display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-plus"></i> Add New Plan
        </button>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card">
        @if(count($fees) > 0)
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: separate; border-spacing: 0; text-align: left; white-space: nowrap;">
                    <thead>
                        <tr style="background-color: #f8fafc;">
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-top-left-radius: 8px;">Sort Order</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Category Name</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Price (INR)</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Features</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Status</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-top-right-radius: 8px; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fees as $fee)
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f1f5f9';" onmouseout="this.style.backgroundColor='transparent';">
                                <td style="padding: 18px 20px; color: #64748b; font-weight: 500; border-bottom: 1px solid var(--admin-border);">{{ $fee->sort_order }}</td>
                                <td style="padding: 18px 20px; font-weight: 600; color: #0f172a; font-size: 1rem; border-bottom: 1px solid var(--admin-border);">
                                    {{ $fee->category_name }}
                                    @if($fee->is_highlighted)
                                        <span style="margin-left: 10px; background: #fffbeb; color: #d97706; padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; text-transform: uppercase; border: 1px solid #fde68a; font-weight: 700; display: inline-block;"><i class="fa-solid fa-star" style="margin-right: 4px;"></i> Highlighted</span>
                                    @endif
                                </td>
                                <td style="padding: 18px 20px; color: var(--admin-primary); font-weight: 700; font-size: 1.1rem; border-bottom: 1px solid var(--admin-border);">₹{{ number_format($fee->price_inr) }}</td>
                                <td style="padding: 18px 20px; font-size: 0.9rem; color: #64748b; border-bottom: 1px solid var(--admin-border);">
                                    @php $features = json_decode($fee->features, true) ?? []; @endphp
                                    <span style="background: #e2e8f0; color: #475569; padding: 4px 10px; border-radius: 6px; font-weight: 600; font-size: 0.8rem; display: inline-block; white-space: nowrap;">{{ count($features) }} features listed</span>
                                </td>
                                <td style="padding: 18px 20px; border-bottom: 1px solid var(--admin-border);">
                                    @if($fee->is_active)
                                        <span style="background: #ecfccb; color: #4d7c0f; padding: 6px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; border: 1px solid #d9f99d; display: inline-block;">Active</span>
                                    @else
                                        <span style="background: #fee2e2; color: #b91c1c; padding: 6px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; border: 1px solid #fecaca; display: inline-block;">Disabled</span>
                                    @endif
                                </td>
                                <td style="padding: 18px 20px; border-bottom: 1px solid var(--admin-border); text-align: center;">
                                    <div style="display: flex; gap: 8px; justify-content: center;">
                                        <button class="btn" style="background: #e2e8f0; color: #334155; padding: 8px 16px; border-radius: 6px;" onclick='openEditModal(@json($fee))'>
                                            <i class="fa-solid fa-pen-to-square" style="margin-right: 4px;"></i> Edit
                                        </button>
                                        <form method="POST" action="{{ route('admin.fees.delete', $fee->id) }}" onsubmit="return confirm('Are you sure you want to delete this plan?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="background: #fee2e2; color: #ef4444; padding: 8px 12px; border-radius: 6px;">
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
            <p style="text-align: center; color: #94a3b8; padding: 30px;">No fee plans created yet.</p>
        @endif
    </div>
    

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 40px; margin-bottom: 20px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Form Add-Ons (e.g. Workshops)</h2>
        <button class="btn" onclick="openModal('addAddonModal')" style="display: flex; align-items: center; gap: 8px; background-color: var(--admin-sidebar);">
            <i class="fa-solid fa-plus"></i> Add New Add-On
        </button>
    </div>

    <div class="card">
        @if(count($addons) > 0)
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: separate; border-spacing: 0; text-align: left; white-space: nowrap;">
                    <thead>
                        <tr style="background-color: #f8fafc;">
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-top-left-radius: 8px;">Title</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Price (INR)</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Badge</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em;">Status</th>
                            <th style="padding: 16px 20px; border-bottom: 2px solid var(--admin-border); color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; border-top-right-radius: 8px; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($addons as $addon)
                            <tr style="border-bottom: 1px solid var(--admin-border); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f1f5f9';" onmouseout="this.style.backgroundColor='transparent';">
                                <td style="padding: 18px 20px; font-weight: 600; color: #0f172a; font-size: 1rem; border-bottom: 1px solid var(--admin-border);">{{ $addon->title }}</td>
                                <td style="padding: 18px 20px; color: var(--admin-primary); font-weight: 700; font-size: 1.1rem; border-bottom: 1px solid var(--admin-border);">₹{{ number_format($addon->price) }}</td>
                                <td style="padding: 18px 20px; border-bottom: 1px solid var(--admin-border);">
                                    @if($addon->badge_text)
                                        <span style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 0.8rem; font-weight: 600; border: 1px solid #cbd5e1; display: inline-block;">{{ $addon->badge_text }}</span>
                                    @else
                                        <span style="color: #94a3b8;">-</span>
                                    @endif
                                </td>
                                <td style="padding: 18px 20px; border-bottom: 1px solid var(--admin-border);">
                                    @if($addon->is_active)
                                        <span style="background: #ecfccb; color: #4d7c0f; padding: 6px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; border: 1px solid #d9f99d; display: inline-block;">Active</span>
                                    @else
                                        <span style="background: #fee2e2; color: #b91c1c; padding: 6px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; border: 1px solid #fecaca; display: inline-block;">Disabled</span>
                                    @endif
                                </td>
                                <td style="padding: 18px 20px; border-bottom: 1px solid var(--admin-border); text-align: center;">
                                    <div style="display: flex; gap: 8px; justify-content: center;">
                                        <button class="btn" style="background: #e2e8f0; color: #334155; padding: 8px 16px; border-radius: 6px;" onclick='openEditAddonModal(@json($addon))'>
                                            <i class="fa-solid fa-pen-to-square" style="margin-right: 4px;"></i> Edit
                                        </button>
                                        <form method="POST" action="{{ route('admin.addons.delete', $addon->id) }}" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="background: #fee2e2; color: #ef4444; padding: 8px 12px; border-radius: 6px;">
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
            <p style="text-align: center; color: #94a3b8; padding: 30px;">No Add-ons created yet.</p>
        @endif
    </div>

    <!-- Modals -->
    <style>
        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(17, 35, 64, 0.7); z-index: 1000; align-items: center; justify-content: center; backdrop-filter: blur(4px); }
        .modal-container { background: #fff; border-radius: 12px; width: 90%; max-width: 600px; box-shadow: 0 25px 50px rgba(0,0,0,0.15); animation: slideUp 0.3s ease; overflow: hidden;}
        .modal-header { padding: 20px 25px; border-bottom: 1px solid var(--admin-border); display: flex; justify-content: space-between; align-items: center; background: var(--admin-sidebar); color: #fff; }
        .modal-body { padding: 30px; max-height: 70vh; overflow-y: auto;}
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-weight: 600; color: var(--admin-sidebar); margin-bottom: 8px; font-size: 0.9rem; }
        .form-control { width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem; }
        .checkbox-group { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
    </style>

    <!-- Add Modal -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem;">Add Pricing Plan</h3>
                <button onclick="closeModal('addModal')" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" action="{{ route('admin.fees.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name" class="form-control" required placeholder="e.g. Student, Regular, VIP">
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Price (INR)</label>
                            <input type="text" name="price_inr" class="form-control" required placeholder="e.g. 5,000">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Features (One per line)</label>
                        <textarea name="features" class="form-control" rows="5" required placeholder="Conference Kit&#10;Lunch & Refreshments&#10;Certificate"></textarea>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="is_active" id="active1" value="1" checked>
                        <label for="active1" style="color: var(--admin-text); font-size: 0.95rem;">Active (Visible on frontend)</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="is_highlighted" id="highlight1" value="1">
                        <label for="highlight1" style="color: var(--admin-text); font-size: 0.95rem;">Highlight Card (Premium Styling)</label>
                    </div>
                </div>
                <div style="padding: 20px 30px; border-top: 1px solid var(--admin-border); text-align: right; background: #f8fafc;">
                    <button type="button" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;" onclick="closeModal('addModal')">Cancel</button>
                    <button type="submit" class="btn">Save Plan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal-overlay" id="editModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem;">Edit Pricing Plan</h3>
                <button onclick="closeModal('editModal')" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="category_name" id="edit_name" class="form-control" required>
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div class="form-group">
                            <label class="form-label">Price (INR)</label>
                            <input type="text" name="price_inr" id="edit_price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" id="edit_sort" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Features (One per line)</label>
                        <textarea name="features" id="edit_features" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="is_active" id="edit_active" value="1">
                        <label for="edit_active" style="color: var(--admin-text); font-size: 0.95rem;">Active (Visible on frontend)</label>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="is_highlighted" id="edit_highlight" value="1">
                        <label for="edit_highlight" style="color: var(--admin-text); font-size: 0.95rem;">Highlight Card (Premium Styling)</label>
                    </div>
                </div>
                <div style="padding: 20px 30px; border-top: 1px solid var(--admin-border); text-align: right; background: #f8fafc;">
                    <button type="button" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;" onclick="closeModal('editModal')">Cancel</button>
                    <button type="submit" class="btn">Update Plan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Addon Modal -->
    <div class="modal-overlay" id="addAddonModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem;">Add New Add-On</h3>
                <button onclick="closeModal('addAddonModal')" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" action="{{ route('admin.addons.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Add-on Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="e.g. Metagenomics Workshop">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Price (INR)</label>
                        <input type="number" name="price" class="form-control" required placeholder="e.g. 500">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Badge Text (Optional)</label>
                        <input type="text" name="badge_text" class="form-control" placeholder="e.g. Limited Seats">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description (Optional)</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter addon description"></textarea>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="is_active" id="activeAddon" value="1" checked>
                        <label for="activeAddon" style="color: var(--admin-text); font-size: 0.95rem;">Active (Visible on frontend)</label>
                    </div>
                </div>
                <div style="padding: 20px 30px; border-top: 1px solid var(--admin-border); text-align: right; background: #f8fafc;">
                    <button type="button" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;" onclick="closeModal('addAddonModal')">Cancel</button>
                    <button type="submit" class="btn">Save Add-on</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Addon Modal -->
    <div class="modal-overlay" id="editAddonModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3 style="margin: 0; font-size: 1.2rem;">Edit Add-On</h3>
                <button onclick="closeModal('editAddonModal')" style="background: none; border: none; color: #fff; font-size: 1.5rem; cursor: pointer;"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form method="POST" id="editAddonForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Add-on Title</label>
                        <input type="text" name="title" id="edit_addon_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Price (INR)</label>
                        <input type="number" name="price" id="edit_addon_price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Badge Text (Optional)</label>
                        <input type="text" name="badge_text" id="edit_addon_badge" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description (Optional)</label>
                        <textarea name="description" id="edit_addon_description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" name="is_active" id="edit_addon_active" value="1">
                        <label for="edit_addon_active" style="color: var(--admin-text); font-size: 0.95rem;">Active (Visible on frontend)</label>
                    </div>
                </div>
                <div style="padding: 20px 30px; border-top: 1px solid var(--admin-border); text-align: right; background: #f8fafc;">
                    <button type="button" class="btn" style="background: #e2e8f0; color: #475569; margin-right: 10px;" onclick="closeModal('editAddonModal')">Cancel</button>
                    <button type="submit" class="btn">Update Add-on</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) { document.getElementById(id).style.display = 'flex'; }
        function closeModal(id) { document.getElementById(id).style.display = 'none'; }
        
        function openEditModal(fee) {
            document.getElementById('editForm').action = '/admin/fees/' + fee.id;
            document.getElementById('edit_name').value = fee.category_name;
            document.getElementById('edit_price').value = fee.price_inr;
            document.getElementById('edit_sort').value = fee.sort_order;
            
            let features = JSON.parse(fee.features);
            document.getElementById('edit_features').value = features ? features.join('\n') : '';
            
            document.getElementById('edit_active').checked = fee.is_active ? true : false;
            document.getElementById('edit_highlight').checked = fee.is_highlighted ? true : false;
            
            openModal('editModal');
        }

        function openEditAddonModal(addon) {
            document.getElementById('editAddonForm').action = '/admin/addons/' + addon.id;
            document.getElementById('edit_addon_title').value = addon.title;
            document.getElementById('edit_addon_price').value = addon.price;
            document.getElementById('edit_addon_badge').value = addon.badge_text || '';
            document.getElementById('edit_addon_description').value = addon.description || '';
            document.getElementById('edit_addon_active').checked = addon.is_active ? true : false;
            openModal('editAddonModal');
        }
    </script>
@endsection
