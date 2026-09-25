<!-- Important Deadlines Section -->
<section class="deadlines-section">
    <div class="deadlines-bg-wrapper">
        <div class="section-header-center">
            <h2 class="section-title">{!! $settings['deadlines_title'] ?? 'Important <span>Deadlines</span>' !!}</h2>
            <div class="header-line"></div>
            <p class="highlights-subtitle">{{ $settings['deadlines_subtitle'] ?? 'Key Dates To Mark In Your Calendar' }}</p>
        </div>

        <div style="max-width: 900px; margin: 50px auto 0;">
            <div class="deadlines-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                
                <div class="dl-card dl-card-1" style="flex-direction: column; text-align: center; padding: 40px 20px; margin-bottom: 0;">
                    <div class="dl-card-num" style="position: absolute; top: -10px; left: -10px; font-size: 6rem; opacity: 0.05;">01</div>
                    <div class="dl-icon-circle" style="width: 75px; height: 75px; font-size: 2rem; margin-bottom: 15px; position: relative; z-index: 1;"><i class="fa-solid fa-file-arrow-up"></i></div>
                    <div class="dl-text" style="position: relative; z-index: 1;">
                        <div class="dl-date" style="font-size: 1.8rem; margin-bottom: 12px;">Oct 07, 2026</div>
                        <div class="dl-label" style="font-size: 1.05rem; line-height: 1.5;">Submission of Abstract</div>
                    </div>
                </div>

                <div class="dl-card dl-card-2" style="flex-direction: column; text-align: center; padding: 40px 20px; margin-bottom: 0;">
                    <div class="dl-card-num" style="position: absolute; top: -10px; left: -10px; font-size: 6rem; opacity: 0.05;">02</div>
                    <div class="dl-icon-circle" style="width: 75px; height: 75px; font-size: 2rem; margin-bottom: 15px; position: relative; z-index: 1;"><i class="fa-solid fa-envelope-open-text"></i></div>
                    <div class="dl-text" style="position: relative; z-index: 1;">
                        <div class="dl-date" style="font-size: 1.8rem; margin-bottom: 12px;">Oct 15, 2026</div>
                        <div class="dl-label" style="font-size: 1.05rem; line-height: 1.5;">Acceptance of Abstract</div>
                    </div>
                </div>

                <div class="dl-card dl-card-3" style="flex-direction: column; text-align: center; padding: 40px 20px; margin-bottom: 0;">
                    <div class="dl-card-num" style="position: absolute; top: -10px; left: -10px; font-size: 6rem; opacity: 0.05;">03</div>
                    <div class="dl-icon-circle" style="width: 75px; height: 75px; font-size: 2rem; margin-bottom: 15px; position: relative; z-index: 1;"><i class="fa-solid fa-book"></i></div>
                    <div class="dl-text" style="position: relative; z-index: 1;">
                        <div class="dl-date" style="font-size: 1.8rem; margin-bottom: 12px;">Nov 15, 2026</div>
                        <div class="dl-label" style="font-size: 1.05rem; line-height: 1.5;">Full Paper</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
