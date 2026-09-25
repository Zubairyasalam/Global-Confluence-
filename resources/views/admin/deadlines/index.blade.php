@extends(isset($is_included) ? 'layouts.empty' : 'layouts.admin_cms')

@section('header_title', 'Important Deadlines CMS')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Important Dates</h2>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.event_details.update') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Deadlines Section Content
            </h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['deadlines']->where('key', 'deadlines_title')->first()->label ?? 'Main Title' }}</label>
                    <input type="text" name="deadlines_title" value="{{ $settings['deadlines']->where('key', 'deadlines_title')->first()->value ?? '' }}" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
                </div>
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['deadlines']->where('key', 'deadlines_subtitle')->first()->label ?? 'Subtitle' }}</label>
                    <input type="text" name="deadlines_subtitle" value="{{ $settings['deadlines']->where('key', 'deadlines_subtitle')->first()->value ?? '' }}" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn"><i class="fa-solid fa-save"></i> Save Content</button>
            </div>
        </div>
    </form>

    <script>
        function previewSelectedImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var container = document.getElementById('image-preview-container');
                    var img = document.getElementById('image-preview');
                    img.src = e.target.result;
                    container.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Manage Individual Deadlines Section -->
    <div class="card" style="margin-top: 30px;">
        <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
            Manage Individual Deadlines
        </h3>
        
        <!-- Add New Deadline Form -->
        <div style="background: #f8fafc; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 30px;">
            <h4 style="margin-bottom: 15px; color: var(--admin-primary);"><i class="fa-solid fa-plus"></i> Add New Deadline</h4>
            <form method="POST" action="{{ route('admin.deadlines.store') }}">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 15px; align-items: end;">
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Date / Value</label>
                        <input type="text" name="deadline_date" required placeholder="e.g. 2026-09-10" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 6px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Title</label>
                        <input type="text" name="title" required placeholder="e.g. ABSTRACT SUBMISSION" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 6px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Sort Order</label>
                        <input type="number" name="sort_order" value="0" required style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 6px;">
                    </div>
                    <div>
                        <button type="submit" class="btn"><i class="fa-solid fa-plus"></i> Add</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- List of Existing Deadlines -->
        <div style="display: grid; gap: 15px;">
            @foreach($deadlines as $dl)
            <div style="background: #ffffff; padding: 20px; border-radius: 8px; border: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.02);">
                <form method="POST" action="{{ route('admin.deadlines.update', $dl->id) }}" style="flex: 1; display: grid; grid-template-columns: 1fr 1fr 100px 100px auto; gap: 15px; align-items: center; margin-right: 20px;">
                    @csrf
                    @method('PUT')
                    
                    <input type="text" name="deadline_date" value="{{ $dl->deadline_date }}" required style="width: 100%; padding: 8px; border: 1px solid var(--admin-border); border-radius: 6px;">
                    <input type="text" name="title" value="{{ $dl->title }}" required style="width: 100%; padding: 8px; border: 1px solid var(--admin-border); border-radius: 6px;">
                    
                    <div style="display: flex; align-items: center; gap: 5px;">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ $dl->is_active ? 'checked' : '' }}> Active
                    </div>
                    
                    <input type="number" name="sort_order" value="{{ $dl->sort_order }}" required style="width: 100%; padding: 8px; border: 1px solid var(--admin-border); border-radius: 6px;">
                    
                    <button type="submit" class="btn" style="background: #3b82f6; padding: 8px 15px;"><i class="fa-solid fa-save"></i> Update</button>
                </form>

                <form method="POST" action="{{ route('admin.deadlines.delete', $dl->id) }}" onsubmit="return confirm('Are you sure you want to delete this deadline?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background: #ef4444; padding: 8px 15px;"><i class="fa-solid fa-trash"></i> Delete</button>
                </form>
            </div>
            @endforeach
            
            @if(count($deadlines) == 0)
            <div style="text-align: center; padding: 30px; color: #94a3b8; font-style: italic; border: 1px dashed #cbd5e1; border-radius: 8px;">
                No deadlines added yet. Use the form above to add one.
            </div>
            @endif
        </div>
    </div>
@endsection
