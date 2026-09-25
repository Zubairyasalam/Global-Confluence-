@extends('layouts.admin_cms')

@section('header_title', 'Submit Paper Form Builder')

@section('content')
    <style>
        .reg-form-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 20px;
            background: #f8fafc;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }
        .form-group-preview {
            display: flex;
            flex-direction: column;
            position: relative;
            background: white;
            padding: 15px;
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
            transition: all 0.2s;
        }
        .form-group-preview:hover {
            border-color: var(--admin-primary);
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .form-control-preview {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 4px;
            font-size: 0.9rem;
            color: #64748b;
            background: #f8fafc;
            pointer-events: none; /* so they don't type in the preview */
        }
        .actions {
            position: absolute;
            top: -10px;
            right: -10px;
            display: flex;
            gap: 5px;
            
            
        }
        .form-group-preview:hover .actions {
            
        }
        .action-btn {
            color: white;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.7rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .edit-btn { background: var(--admin-primary); }
        .delete-btn { background: #ef4444; }
    .field-label {
        font-weight: 600;
        color: var(--admin-sidebar);
        font-size: 0.85rem;
        margin-bottom: 8px;
        display: flex;
        justify-content: space-between;
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
        .form-group-preview {
            grid-column: 1 / -1 !important;
        }
    }
</style>

<div class="responsive-grid">
        
        <!-- Live Form Preview -->
        <div>
            <div class="card" style="margin-bottom: 30px;">
                <h3 style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Live Form Preview</h3>
                <p style="color: #64748b; margin-bottom: 20px; font-size: 0.9rem;">This is exactly how your Submit Paper form looks to users. Hover over a field to edit or delete it.</p>
                
                @if(count($fields) > 0)
                    <div class="reg-form-grid">
                        @foreach($fields as $field)
                            <div class="form-group-preview" style="grid-column: {{ $field->grid_column === 'span 12' ? '1 / -1' : $field->grid_column }};">
                                <div class="field-label">
                                    <span>{{ $field->label }} @if($field->is_required)<span style="color: #ef4444;">*</span>@endif</span>
                                    <span style="color: #94a3b8; font-size: 0.7rem; font-weight: 400;">{{ $field->type }}</span>
                                </div>
                                
                                @if($field->type === 'select' || $field->type === 'dynamic_select')
                                    <select class="form-control-preview">
                                        <option>{{ $field->placeholder ?? 'Select' }}</option>
                                    </select>
                                @elseif($field->type === 'textarea')
                                    <textarea class="form-control-preview" placeholder="{{ $field->placeholder }}" rows="2"></textarea>
                                @else
                                    <input type="{{ $field->type }}" class="form-control-preview" placeholder="{{ $field->placeholder }}">
                                @endif

                                <div class="actions">
                                    <button type="button" class="action-btn edit-btn" title="Edit Field" onclick="editField({{ json_encode($field) }})"><i class="fa-solid fa-pencil"></i></button>
                                    <form action="{{ route('admin.submit_paper_fields.destroy', $field->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this field?');" style="margin: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn" title="Delete Field"><i class="fa-solid fa-xmark"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 40px; background: #f8fafc; border-radius: 10px; border: 1px dashed #cbd5e1;">
                        <p style="color: #64748b; margin: 0;">No fields added yet. Add some fields using the panel on the right.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Add Field Form -->
        <div>
            <div class="card" style="position: sticky; top: 20px; max-height: calc(100vh - 40px); overflow-y: auto;">
                <h3 id="form-title" style="font-size: 1.2rem; color: var(--admin-sidebar); margin-bottom: 20px;">Add New Field</h3>
                
                <form id="field-form" action="{{ route('admin.submit_paper_fields.store') }}" method="POST">
                    @csrf
                    <div id="method-spoofing"></div>
                    
                    <input type="hidden" name="name" id="field_name">
                    <input type="hidden" name="placeholder" id="field_placeholder">
                    <input type="hidden" name="sort_order" id="field_sort_order" value="{{ count($fields) + 1 }}">

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Field Label</label>
                        <input type="text" name="label" id="field_label" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;" placeholder="e.g. Phone Number">
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Input Type</label>
                        <select name="type" id="field_type" required style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;" onchange="toggleOptions()">
                            <option value="text">Text (Single Line)</option>
                            <option value="email">Email</option>
                            <option value="select">Dropdown (Select)</option>
                            <option value="textarea">Textarea (Multi-line)</option>
                        </select>
                    </div>

                    <div class="form-group" id="options_group" style="margin-bottom: 15px; display: none;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Dropdown Options (Comma separated)</label>
                        <input type="text" name="options" id="field_options" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;" placeholder="e.g. Yes, No, Maybe">
                    </div>
                    
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--admin-sidebar); font-size: 0.9rem;">Field Width</label>
                        <select name="grid_column" id="field_grid_column" style="width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.95rem; font-family: inherit;">
                            <option value="span 12">Full Width</option>
                            <option value="span 6">Half Width</option>
                            <option value="span 4">One Third Width</option>
                        </select>
                    </div>

                    <div class="form-group" style="margin-bottom: 25px;">
                        <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-weight: 600; color: var(--admin-sidebar);">
                            <input type="checkbox" name="is_required" id="field_is_required" value="1" checked style="width: 18px; height: 18px;">
                            Make this field mandatory
                        </label>
                    </div>

                    <button type="submit" id="submit-btn" class="btn btn-primary" style="width: 100%; background: var(--admin-primary); color: white; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer;">Save Field</button>
                    <button type="button" id="cancel-btn" style="display: none; width: 100%; background: #e2e8f0; color: #475569; border: none; padding: 12px; border-radius: 6px; font-weight: 700; cursor: pointer; margin-top: 10px;" onclick="window.location.reload();">Cancel Edit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleOptions() {
            let type = document.getElementById('field_type').value;
            document.getElementById('options_group').style.display = (type === 'select' || type === 'dynamic_select') ? 'block' : 'none';
        }

        // Auto generate name and placeholder
        document.getElementById('field_label').addEventListener('input', function(e) {
            let label = e.target.value;
            if(!document.getElementById('form-title').innerText.includes('Edit')) {
                document.getElementById('field_name').value = label.toLowerCase().replace(/[^a-z0-9]/g, '_').replace(/_+/g, '_').replace(/^_|_$/g, '');
                document.getElementById('field_placeholder').value = 'Enter your ' + label;
            }
        });

        function editField(field) {
            document.getElementById('form-title').innerText = 'Edit Field';
            
            let form = document.getElementById('field-form');
            form.action = `/admin/settings/submit-paper/fields/${field.id}`;
            
            document.getElementById('method-spoofing').innerHTML = '<input type="hidden" name="_method" value="PUT">';
            
            document.getElementById('field_label').value = field.label;
            document.getElementById('field_name').value = field.name;
            
            let typeSelect = document.getElementById('field_type');
            if (field.type === 'dynamic_select') {
                let optionExists = Array.from(typeSelect.options).some(opt => opt.value === 'dynamic_select');
                if (!optionExists) {
                    typeSelect.add(new Option('Dynamic Select (System)', 'dynamic_select'));
                }
            }
            typeSelect.value = field.type;
            toggleOptions();
            
            document.getElementById('field_placeholder').value = field.placeholder || '';
            document.getElementById('field_options').value = field.options ? field.options.join(', ') : '';
            document.getElementById('field_grid_column').value = field.grid_column;
            document.getElementById('field_sort_order').value = field.sort_order;
            document.getElementById('field_is_required').checked = field.is_required;
            
            document.getElementById('submit-btn').innerText = 'Update Field';
            document.getElementById('cancel-btn').style.display = 'block';
            
            // Scroll to the form
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
@endsection
