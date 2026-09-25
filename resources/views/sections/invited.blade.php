<!-- Invited Speakers Section -->
<section class="invited-section">
    <div class="section-header-center">
        <h2 class="section-title">Invited <span>Speaker</span></h2>
        <div class="header-line"></div>
        <p class="highlights-subtitle">The Minds Behind The Momentum</p>
    </div>

    <div class="invited-grid">
        @php
            $invitedSpeakers = \App\Models\Speaker::where('type', 'invited')->orderBy('sort_order')->get();
        @endphp

        @foreach($invitedSpeakers as $speaker)
            <div class="speaker-card-new">
                <div class="speaker-photo-wrap">
                    <img src="{{ asset($speaker->image_path) }}" alt="{{ $speaker->name }}">
                </div>
                <div class="speaker-body">
                    <h4>{{ $speaker->name }}</h4>
                    @if($speaker->h_index)
                        <p class="speaker-hindex">H-Index: {{ $speaker->h_index }}</p>
                    @endif
                    <p class="speaker-uni">{{ $speaker->university }}</p>
                    <p class="speaker-country-text">{{ $speaker->country }}</p>
                    @if($speaker->title)
                        <div class="speaker-title-block">
                            <span class="speaker-title-label">Presentation Title</span>
                            <p class="speaker-title-content">{{ $speaker->title }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-30">
        <a href="{{ route('invited-speakers') }}" class="btn btn-navy">View More</a>
    </div>
</section>
