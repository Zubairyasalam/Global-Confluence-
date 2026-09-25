@extends('layouts.app')

@section('content')

@include('sections.topbar')
@include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_invited_speakers_title')->value('value') ?? 'INVITED SPEAKERS';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_invited_speakers_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1>{{ $bannerTitle }}</h1>
        </div>
    </div>

<!-- Speakers Grid -->
<section class="plenary-section" style="padding: 60px 0; background: #fafafa;">
    <div class="container">
        
        <div class="invited-protection-text" style="text-align: center; margin-bottom: 40px; color: var(--text-body); font-size: 1.05rem;">
            The speakers page you are trying to access is protected by Biomed Summit. If you are a registered participant, please use the speaker access link provided by the Program Manager to view all confirmed speakers.
        </div>
        
        <div class="section-header-center" style="margin-bottom: 40px;">
            <h2 class="section-title">Invited <span>Speaker</span></h2>
            <div class="header-line"></div>
            <p class="highlights-subtitle">The Minds Behind The Momentum</p>
        </div>
        
        <div class="plenary-grid">

            @forelse($speakers as $speaker)
            <div class="speaker-card-extended">
                <div class="speaker-photo-wrap">
                    <img src="{{ asset('images/speakers/' . $speaker->image) }}" alt="{{ $speaker->name }}">
                </div>
                <div class="speaker-body-extended">
                    <h4>{{ $speaker->name }}</h4>
                    @if($speaker->h_index)<p class="speaker-hindex">H-Index: {{ $speaker->h_index }}</p>@endif
                    <p class="speaker-uni">{{ $speaker->university }}</p>
                    <p class="speaker-country-text">{{ $speaker->country }}</p>
                    
                    @if($speaker->presentation_title)
                    <div class="speaker-title-block">
                        <span class="speaker-title-label">Presentation Title</span>
                        <p class="speaker-title-content">{{ $speaker->presentation_title }}</p>
                    </div>
                    @endif
                    
                    <p class="speaker-bio">{{ Str::limit($speaker->biography, 150) }}</p>
                    <div class="full-bio" style="display:none;">{{ $speaker->biography }}</div>
                    
                    <a href="javascript:void(0)" onclick="openBioModal(this)" class="btn-show-more">SHOW MORE</a>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #555; background: #fff; border-radius: 8px; font-size: 1.1rem;">
                <i class="fa-solid fa-microphone-lines" style="font-size: 2rem; color: #ccc; margin-bottom: 15px; display: block;"></i>
                Speaker announcements coming soon.
            </div>
            @endforelse

        </div>
        
        <div class="invited-bottom-action" style="margin-top: 50px;">
            <p style="color: var(--text-body); font-size: 1.05rem; margin-bottom: 25px;">
                If you are a new visitor, kindly fill in your basic details below. This verification step helps us maintain the privacy and security of our speakers. Our Program Manager will review your request and provide access if approved.
            </p>
            <div style="text-align: right;">
                <a href="#" class="btn-teal" style="border-radius: 30px; text-decoration: none; font-weight: 600; text-transform: uppercase;">EXPLORE MORE</a>
            </div>
        </div>
        
    </div>
</section>

<!-- Biography Modal -->
<div id="bioModal" class="bio-modal">
    <div class="bio-modal-content">
        <h3 class="bio-modal-title">Biography</h3>
        <div id="bioModalText" class="bio-modal-text"></div>
        <div class="bio-modal-footer">
            <button onclick="closeBioModal()" class="btn-close-modal">Close</button>
        </div>
    </div>
</div>

<style>
.bio-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    align-items: center;
    justify-content: center;
}
.bio-modal-content {
    background-color: #fff;
    width: 90%;
    max-width: 650px;
    border-radius: 4px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.4);
    padding: 30px;
    position: relative;
    animation: modalFadeIn 0.3s;
}
@keyframes modalFadeIn {
    from {opacity: 0; transform: translateY(-20px);}
    to {opacity: 1; transform: translateY(0);}
}
.bio-modal-title {
    font-size: 1.6rem;
    font-weight: 400;
    color: #333;
    margin-top: 0;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee;
}
.bio-modal-text {
    font-size: 1.05rem;
    color: #444;
    line-height: 1.7;
    margin-bottom: 30px;
}
.bio-modal-footer {
    text-align: right;
}
.btn-close-modal {
    background: transparent;
    border: 1px solid #ccc;
    padding: 8px 25px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.95rem;
    color: #333;
    transition: all 0.2s;
}
.btn-close-modal:hover {
    background: #f0f0f0;
}
</style>

<script>
function openBioModal(btn) {
    var fullBio = btn.parentElement.querySelector('.full-bio').innerHTML;
    document.getElementById('bioModalText').innerHTML = fullBio;
    document.getElementById('bioModal').style.display = 'flex';
}
function closeBioModal() {
    document.getElementById('bioModal').style.display = 'none';
}
window.onclick = function(event) {
    var modal = document.getElementById('bioModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>

@include('sections.footer')

@endsection
