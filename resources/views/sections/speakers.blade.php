<!-- Speakers Section -->
<section class="speakers-section" id="speakers">

    <div class="section-header-center">
        <h2 class="section-title">Plenary <span>Speakers</span></h2>
        <div class="header-line"></div>
        <p class="highlights-subtitle">The Minds Behind the Momentum</p>
    </div>

    <div class="speakers-grid-new">
        @php
            $speakers = \App\Models\Speaker::where('type', 'plenary')->orderBy('sort_order')->get();
        @endphp

        @foreach($speakers as $speaker)
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
        <a href="{{ route('plenary-speakers') }}" class="btn btn-navy">View More</a>
    </div>
</section>
