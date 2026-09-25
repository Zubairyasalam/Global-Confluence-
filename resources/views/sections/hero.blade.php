<!-- Hero Section -->
<section class="hero" style="padding-top: 30px; {{ !empty($settings['hero_bg_image']) ? "background-image: url('" . asset($settings['hero_bg_image']) . "');" : '' }}">
    <div class="hero-content" style="padding: 0 0 20px 0;">
        
        <!-- Collaboration Header -->
        <div class="hero-collab" style="margin-bottom: 16px;">
            <div style="font-family: 'Georgia', serif; font-size: clamp(1.8rem, 3.5vw, 2.4rem); font-weight: 800; color: var(--navy-dark); line-height: 1.1;">
                {{ $settings['hero_institution'] ?? 'Madras Christian College' }}
            </div>
            <div style="font-size: 1.1rem; color: var(--text-body); font-weight: 500; margin-top: 4px; letter-spacing: 0.5px;">
                {{ $settings['hero_institution_type'] ?? 'Autonomous' }}
            </div>
            <div style="font-size: 0.95rem; color: var(--text-body); margin-top: 4px;">
                {{ $settings['hero_institution_address'] ?? 'Tambaram East, Chennai – 600059, Tamil Nadu, India' }}
            </div>
        </div>

        <!-- Action Connector -->
        <div style="margin-bottom: 16px; font-size: 0.9rem; font-weight: 700; color: var(--teal-accent); text-transform: lowercase; letter-spacing: 1px; display: flex; align-items: center; gap: 8px;">
            <span style="width: 24px; height: 2px; background: var(--teal-accent); display: inline-block;"></span>
            {{ $settings['hero_pre_title'] ?? 'organizes' }}
        </div>

        <!-- Main Title -->
        <h1 class="hero-title" style="margin-bottom: 16px; text-transform: uppercase; font-weight: 800; line-height: 1.15; color: var(--navy-dark);">
            {{ $settings['hero_title_part1'] ?? 'GLOBAL' }} <span style="color: #009688;">{{ $settings['hero_title_highlight'] ?? 'ONE HEALTH' }}</span><br>
            {{ $settings['hero_title_part2'] ?? 'CONFLUENCE 2026' }}
        </h1>

        <!-- Subtitle / Tagline -->
        <div style="font-size: clamp(1.05rem, 1.8vw, 1.25rem); font-weight: 600; font-style: italic; color: #334155; margin-bottom: 22px; max-width: 680px; line-height: 1.45;">
            {{ $settings['hero_subtitle'] ?? 'Bridging Microbes, Molecules & Mankind for Sustainability' }}
        </div>

        <!-- Date & Hybrid Mode Badges -->
        <div style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-bottom: 24px;">
            <div style="font-size: 0.95rem; font-weight: 700; color: var(--navy-dark); background: #ffffff; padding: 7px 16px; border-radius: 4px; border: 1px solid var(--border-light); box-shadow: 0 1px 3px rgba(0,0,0,0.05); display: inline-flex; align-items: center;">
                {{ $settings['hero_dates'] ?? 'DECEMBER 21-22, 2026' }}
            </div>
            <div style="font-size: 0.88rem; font-weight: 700; color: #ffffff; background: var(--navy-dark); padding: 7px 16px; border-radius: 4px; display: inline-flex; align-items: center; letter-spacing: 0.5px;">
                {{ $settings['hero_mode'] ?? 'HYBRID MODE' }}
            </div>
        </div>

        <!-- Organizers (Departments) -->
        <div class="hero-organizers" style="margin-bottom: 28px; line-height: 1.5;">
            <div style="font-size: 0.8rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 4px;">
                BY
            </div>
            @if(isset($organizers) && count($organizers) > 0)
                @foreach($organizers as $org)
                <div style="font-size: 1.05rem; font-weight: 700; color: var(--navy-dark);">
                    {{ $org->name }}
                </div>
                @endforeach
            @else
                <div style="font-size: 1.05rem; font-weight: 700; color: var(--navy-dark);">
                    DEPARTMENT OF MICROBIOLOGY (SFS), MCC
                </div>
                <div style="font-size: 1.05rem; font-weight: 700; color: var(--navy-dark);">
                    DEPARTMENT OF CHEMISTRY (SFS), MCC
                </div>
            @endif
        </div>

        <!-- Call to Action -->
        <div class="hero-actions">
            @if(!empty($settings['hero_btn1_text']))
            <a href="{{ url($settings['hero_btn1_link'] ?? route('registration')) }}" class="btn btn-navy">{{ $settings['hero_btn1_text'] }}</a>
            @else
            <a href="{{ route('registration') }}" class="btn btn-navy">REGISTER NOW</a>
            @endif
        </div>
    </div>
</section>


