@extends('layouts.admin_cms')

@section('header_title', 'Page Banners')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Global Page Banners</h2>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #10b981;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card" style="margin-bottom: 30px;">
        <p style="color: var(--admin-text); margin-bottom: 20px;">Manage the top banner image and header title for all frontend pages here. If no image is uploaded, the default geometric blue pattern will be used.</p>
        
        <form method="POST" action="{{ route('admin.page_banners.update') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="reg-accordions">
                @foreach($groupedSettings as $page => $settings)
                    @php
                        $titleKey = 'banner_' . $page . '_title';
                        $imageKey = 'banner_' . $page . '_image';
                        $titleSetting = $settings['title'] ?? null;
                        $imageSetting = $settings['image'] ?? null;
                        $pageLabel = ucwords(str_replace('_', ' ', $page));
                    @endphp
                    
                    <div class="accordion-item" style="border: 1px solid var(--admin-border); margin-bottom: 15px; border-radius: 6px; overflow: hidden; background: #fff;">
                        <button type="button" class="accordion-header" style="width: 100%; text-align: left; padding: 18px 20px; background: #f8f9fa; border: none; font-weight: 600; color: var(--navy-dark); font-size: 1.05rem; display: flex; justify-content: space-between; align-items: center; cursor: pointer; transition: background 0.3s ease;" onclick="toggleBannersAccordion(this)">
                            {{ $pageLabel }} Page
                            <i class="fa-solid fa-chevron-down" style="color: var(--admin-primary);"></i>
                        </button>
                        <div class="accordion-content" style="padding: 20px; display: none; border-top: 1px solid var(--admin-border);">
                            
                            @if($titleSetting)
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Banner Title</label>
                                    <input type="text" name="{{ $titleKey }}" value="{{ old($titleKey, $titleSetting->value) }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;">
                                </div>
                            @endif

                            @if($imageSetting)
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">Banner Image</label>
                                    <div id="preview_{{ $imageKey }}_container" style="margin-bottom: 10px; {{ $imageSetting->value ? '' : 'display: none;' }}">
                                        <img id="preview_{{ $imageKey }}" src="{{ $imageSetting->value ? asset($imageSetting->value) : '' }}" style="max-width: 100%; height: 120px; object-fit: cover; border-radius: 8px; border: 1px solid var(--admin-border);">
                                    </div>
                                    <input type="file" name="{{ $imageKey }}" accept="image/*" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;" onchange="previewImage(this, 'preview_{{ $imageKey }}_container', 'preview_{{ $imageKey }}')">
                                    <small style="color: #64748b; display: block; margin-top: 5px;">Leave blank to keep current image. Recommended size: 1920x400px.</small>
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-top: 30px; text-align: right;">
                <button type="submit" class="btn" style="padding: 12px 30px; font-size: 1rem;"><i class="fa-solid fa-save"></i> Save All Banners</button>
            </div>
        </form>
    </div>

    <script>
        function toggleBannersAccordion(btn) {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector('i');
            const isOpen = content.style.display === 'block';
            
            if (!isOpen) {
                content.style.display = 'block';
                btn.style.background = '#eaf8f6';
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                content.style.display = 'none';
                btn.style.background = '#f8f9fa';
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        }

        function previewImage(input, containerId, imageId) {
            var container = document.getElementById(containerId);
            var image = document.getElementById(imageId);
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    image.src = e.target.result;
                    container.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                image.src = '';
                container.style.display = 'none';
            }
        }
    </script>
@endsection
