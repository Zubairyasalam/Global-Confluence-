<!-- Pre-Conference Workshop Section -->
<section class="workshop-section" style="background-color: #f8fbfa; padding: 40px 0;">
    <div class="container" style="max-width: 95%; margin: 0 auto; padding: 0 20px;">
        
        <div class="workshop-grid workshop-box">
            
            <!-- Decorative Accent Removed -->
            <div style="position: absolute; right: -50px; bottom: -50px; opacity: 0.03; z-index: 0;">
                <i class="fa-solid fa-laptop-code" style="font-size: 300px; color: #009688;"></i>
            </div>

            <!-- Left Content -->
            <div style="position: relative; z-index: 1;">
                <div class="section-subtitle" style="margin-bottom: 12px; font-weight: bold; color: #009688; text-transform: uppercase; letter-spacing: 2px; font-size: 1.1rem;">Pre-Conference</div>
                <h2 class="section-title" style="margin-top: 0; color: #333; font-weight: 800; line-height: 1.2; margin-bottom: 25px;">{{ $settings['workshop_title'] ?? 'Hands-On Metagenomics' }} <span>Workshop</span></h2>
                
                <div class="about-text" style="margin-bottom: 35px; text-align: justify;">
                    {!! nl2br(e($settings['workshop_desc'] ?? 'Join us for an exclusive one-day hands-on workshop...')) !!}
                </div>

                <!-- Action Area -->
                <div class="workshop-action" style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
                    <a href="#registration-plans" onclick="document.getElementById('registration-plans').scrollIntoView({behavior: 'smooth', block: 'start'}); return false;" style="display: inline-block; background: linear-gradient(135deg, #009688, #26a69a); color: #fff; padding: 12px 28px; border-radius: 30px; text-decoration: none; font-weight: bold; font-size: 0.95rem; box-shadow: 0 6px 20px rgba(0, 150, 136, 0.3); transition: transform 0.3s, box-shadow 0.3s;">Register Early</a>
                    <div style="color: #e53935; font-weight: bold; font-size: 0.9rem; display: flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-fire"></i> Limited Seats Available!
                    </div>
                </div>
            </div>

            <!-- Right Side Features -->
            <div style="position: relative; z-index: 1; display: flex; flex-direction: column; gap: 20px;">
                
                <div class="workshop-feature">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(0, 150, 136, 0.1); display: flex; justify-content: center; align-items: center; flex-shrink: 0;">
                        @php $wf1 = $settings['workshop_f1_icon'] ?? 'fa-solid fa-laptop-medical'; @endphp
                        @if(str_starts_with($wf1, 'fa-'))
                            <i class="{{ $wf1 }}" style="font-size: 1.5rem; color: #009688;"></i>
                        @else
                            <img src="{{ asset($wf1) }}" alt="Icon" style="max-width: 30px; max-height: 30px; object-fit: contain;">
                        @endif
                    </div>
                    <div>
                        <h4 style="margin: 0 0 5px 0; color: #333; font-size: 1.2rem;">{{ $settings['workshop_f1_title'] ?? 'Practical Skills' }}</h4>
                        <p style="margin: 0; color: #666; font-size: 0.95rem; line-height: 1.5;">{{ $settings['workshop_f1_desc'] ?? 'Learn quality control, community profiling, and assembly.' }}</p>
                    </div>
                </div>

                <div class="workshop-feature">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(0, 150, 136, 0.1); display: flex; justify-content: center; align-items: center; flex-shrink: 0;">
                        @php $wf2 = $settings['workshop_f2_icon'] ?? 'fa-solid fa-database'; @endphp
                        @if(str_starts_with($wf2, 'fa-'))
                            <i class="{{ $wf2 }}" style="font-size: 1.5rem; color: #009688;"></i>
                        @else
                            <img src="{{ asset($wf2) }}" alt="Icon" style="max-width: 30px; max-height: 30px; object-fit: contain;">
                        @endif
                    </div>
                    <div>
                        <h4 style="margin: 0 0 5px 0; color: #333; font-size: 1.2rem;">{{ $settings['workshop_f2_title'] ?? 'Industry Tools' }}</h4>
                        <p style="margin: 0; color: #666; font-size: 0.95rem; line-height: 1.5;">{{ $settings['workshop_f2_desc'] ?? 'Hands-on visualization using tools like QIIME2 and real datasets.' }}</p>
                    </div>
                </div>

                <div class="workshop-feature">
                    <div style="width: 50px; height: 50px; border-radius: 12px; background-color: rgba(0, 150, 136, 0.1); display: flex; justify-content: center; align-items: center; flex-shrink: 0;">
                        @php $wf3 = $settings['workshop_f3_icon'] ?? 'fa-solid fa-toolbox'; @endphp
                        @if(str_starts_with($wf3, 'fa-'))
                            <i class="{{ $wf3 }}" style="font-size: 1.5rem; color: #009688;"></i>
                        @else
                            <img src="{{ asset($wf3) }}" alt="Icon" style="max-width: 30px; max-height: 30px; object-fit: contain;">
                        @endif
                    </div>
                    <div>
                        <h4 style="margin: 0 0 5px 0; color: #333; font-size: 1.2rem;">{{ $settings['workshop_f3_title'] ?? 'Bioinformatics Toolkit' }}</h4>
                        <p style="margin: 0; color: #666; font-size: 0.95rem; line-height: 1.5;">{{ $settings['workshop_f3_desc'] ?? 'Designed specifically for students, researchers, and faculty.' }}</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
