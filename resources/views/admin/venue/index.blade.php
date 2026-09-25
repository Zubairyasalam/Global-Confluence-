@extends('layouts.admin_cms')

@section('header_title', 'Venue Page Configuration')

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
        background: linear-gradient(180deg, #2563eb 0%, #1d4ed8 100%);
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
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
    }
    .card-header h2 {
        color: #0f172a;
        font-size: 1.25rem;
        font-weight: 700;
        margin: 0;
    }

    .form-group {
        margin-bottom: 25px;
    }
    .form-label {
        display: block;
        color: #334155;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 0.95rem;
        transition: all 0.3s;
        font-family: inherit;
    }
    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
    }
    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }
    
    .btn-save {
        background: #2563eb;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
    }
    .btn-save:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }
</style>

<div class="page-title">
    <i class="fa-solid fa-map-location-dot"></i> Venue Page Content
</div>

@if(session('success'))
<div class="success-alert">
    <i class="fa-solid fa-circle-check"></i>
    {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.venue.update') }}" method="POST">
    @csrf
    
    <div class="config-card">
        <div class="card-header">
            <h2><i class="fa-solid fa-heading" style="color: #64748b; margin-right: 10px;"></i> Section 1: Discover Madras Christian College</h2>
        </div>
        
        <div class="form-group">
            <label class="form-label">Heading</label>
            <input type="text" name="venue_s1_heading" class="form-control" value="{{ $settings->where('key', 'venue_s1_heading')->first()->value ?? 'Discover Madras Christian College' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Content</label>
            <textarea name="venue_s1_content" class="form-control">{{ $settings->where('key', 'venue_s1_content')->first()->value ?? 'Founded in 1837, Madras Christian College (MCC) is one of Asia\'s oldest and most prestigious academic institutions. Set within a sprawling, lush 320-acre scrub jungle campus in Tambaram, Chennai, MCC offers a serene, intellectually stimulating environment that provides a perfect backdrop for international conferences, global collaboration, and cutting-edge scientific exchange.' }}</textarea>
        </div>
    </div>

    <div class="config-card">
        <div class="card-header">
            <h2><i class="fa-solid fa-flask" style="color: #64748b; margin-right: 10px;"></i> Section 2: Heritage & Innovation</h2>
        </div>
        
        <div class="form-group">
            <label class="form-label">Heading</label>
            <input type="text" name="venue_s2_heading" class="form-control" value="{{ $settings->where('key', 'venue_s2_heading')->first()->value ?? 'A Hub of Heritage & Innovation' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Content</label>
            <textarea name="venue_s2_content" class="form-control">{{ $settings->where('key', 'venue_s2_content')->first()->value ?? 'MCC seamlessly blends a rich historical legacy with modern scientific inquiry. With a profound history of producing renowned scholars, researchers, and global leaders, the institution continues to foster excellence. Its proximity to prominent research hubs in Chennai and its own state-of-the-art facilities make it an ideal meeting point for the BioMed Summit 2027.' }}</textarea>
        </div>
    </div>

    <div class="config-card">
        <div class="card-header">
            <h2><i class="fa-solid fa-leaf" style="color: #64748b; margin-right: 10px;"></i> Section 3: Campus Biodiversity</h2>
        </div>
        
        <div class="form-group">
            <label class="form-label">Heading</label>
            <input type="text" name="venue_s3_heading" class="form-control" value="{{ $settings->where('key', 'venue_s3_heading')->first()->value ?? 'Campus Biodiversity & Environment' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Content Prefix</label>
            <textarea name="venue_s3_content" class="form-control">{{ $settings->where('key', 'venue_s3_content')->first()->value ?? 'The MCC campus is a documented sanctuary of rare flora and fauna, providing delegates with a refreshing escape from the urban hustle. During the conference, attendees can enjoy:' }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Bullet Points (One per line)</label>
            <textarea name="venue_s3_bullets" class="form-control" style="min-height: 150px;">{{ $settings->where('key', 'venue_s3_bullets')->first()->value ?? "Exploring the expansive, protected scrub jungle ecosystem\nHistoric British-era architectural landmarks seamlessly integrated with modern halls\nA tranquil, pollution-free atmosphere ideal for focused scientific networking\nThe vibrant cultural heritage and traditional South Indian hospitality of Chennai" }}</textarea>
        </div>
    </div>

    <div class="config-card">
        <div class="card-header">
            <h2><i class="fa-solid fa-plane-arrival" style="color: #64748b; margin-right: 10px;"></i> Section 4: Easy Accessibility</h2>
        </div>
        
        <div class="form-group">
            <label class="form-label">Heading</label>
            <input type="text" name="venue_s4_heading" class="form-control" value="{{ $settings->where('key', 'venue_s4_heading')->first()->value ?? 'Easy Accessibility' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Content</label>
            <textarea name="venue_s4_content" class="form-control">{{ $settings->where('key', 'venue_s4_content')->first()->value ?? 'Located in the bustling metropolis of Chennai, MCC is exceptionally well-connected. It is easily accessible via the Chennai International Airport (MAA), which offers direct flights worldwide. Furthermore, the Tambaram Railway Station and major transit hubs are situated directly opposite the campus, ensuring seamless domestic and international travel for all delegates.' }}</textarea>
        </div>
    </div>

    <div class="config-card">
        <div class="card-header">
            <h2><i class="fa-solid fa-building" style="color: #64748b; margin-right: 10px;"></i> Section 5: Facilities</h2>
        </div>
        
        <div class="form-group">
            <label class="form-label">Heading</label>
            <input type="text" name="venue_s5_heading" class="form-control" value="{{ $settings->where('key', 'venue_s5_heading')->first()->value ?? 'World-Class Conference Facilities' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Content</label>
            <textarea name="venue_s5_content" class="form-control">{{ $settings->where('key', 'venue_s5_content')->first()->value ?? 'MCC boasts a wide array of premium venues, including historic grand auditoriums and highly equipped modern smart-halls. With advanced audio-visual technology, high-speed connectivity, and spacious seating, the campus provides a highly professional, comfortable, and accommodating environment for large-scale plenary sessions and specialized workshops alike.' }}</textarea>
        </div>
    </div>

    <div style="text-align: right; margin-bottom: 40px;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-save"></i> Save Venue Content
        </button>
    </div>
</form>
@endsection
