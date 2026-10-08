<!-- Conference Awards Section -->
<section class="awards-section" style="background-color: #ffffff; padding: 60px 0 80px 0; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 45px;">
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 12px; color: #0f172a; font-weight: 800; font-size: 2.2rem; text-transform: uppercase; letter-spacing: -0.5px;">
                {{ $settings['awards_section_title'] ?? 'DISTINGUISHED AWARDS' }}
            </h2>
            <div class="header-line" style="width: 60px; height: 3.5px; background-color: #009688; margin: 0 auto 16px auto; border-radius: 2px;"></div>
            <p class="participants-desc" style="max-width: 720px; margin: 0 auto; color: #64748b; font-size: 1.05rem; line-height: 1.6;">
                {{ $settings['awards_section_sub'] ?? 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.' }}
            </p>
        </div>

        @if(session('success'))
        <div style="max-width: 720px; margin: 0 auto 25px auto; background-color: #d1fae5; color: #065f46; padding: 16px 20px; border-radius: 8px; text-align: center; border: 1px solid #34d399; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 10px;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if(isset($errors) && $errors->any())
        <div style="max-width: 720px; margin: 0 auto 25px auto; background-color: #fee2e2; color: #991b1b; padding: 16px 20px; border-radius: 8px; text-align: center; border: 1px solid #f87171; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 10px;">
            <i class="fa-solid fa-triangle-exclamation" style="font-size: 1.3rem;"></i>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif

        <!-- Awards List Container Card -->
        <div class="distinguished-awards-card" style="max-width: 720px; margin: 0 auto; border: 2px solid #8da8f6; background-color: #f6fafe; border-radius: 6px; overflow: hidden; box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);">
            
            @php
                $awardsCount = (int)($settings['awards_count'] ?? 3);
                $renderedCount = 0;
                // Count valid items
                for($i = 1; $i <= $awardsCount; $i++) {
                    if(!empty($settings['award_' . $i . '_title'])) {
                        $renderedCount++;
                    }
                }
                $currentIndex = 0;
            @endphp

            @for($i = 1; $i <= $awardsCount; $i++)
                @if(!empty($settings['award_' . $i . '_title']))
                @php
                    $currentIndex++;
                    $awardTitle = $settings['award_' . $i . '_title'];
                    $awardAmount = $settings['award_' . $i . '_amount'] ?? '';
                    $awardIcon = $settings['award_' . $i . '_icon'] ?? 'fa-solid fa-award';
                    
                    // Proforma download route selection
                    $proformaRoute = $settings['award_' . $i . '_proforma'] ?? '';
                    if (empty($proformaRoute)) {
                        if (stripos($awardTitle, 'Faculty') !== false) {
                            $proformaRoute = 'download.proforma';
                        } elseif (stripos($awardTitle, 'Scholar') !== false) {
                            $proformaRoute = 'download.proforma_scholar';
                        } elseif (stripos($awardTitle, 'Innovator') !== false || stripos($awardTitle, 'Entrepreneur') !== false) {
                            $proformaRoute = 'download.proforma_innovator';
                        } else {
                            $proformaRoute = 'download.proforma';
                        }
                    }
                @endphp

                <!-- Row {{ $currentIndex }} -->
                <div class="award-item-row" style="padding: 28px 32px; {{ $currentIndex < $renderedCount ? 'border-bottom: 2px solid #8da8f6;' : '' }}">
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;">
                        
                        <!-- Left Icon -->
                        <div style="flex-shrink: 0; width: 55px; display: flex; align-items: center; justify-content: flex-start;">
                            <i class="{{ $awardIcon }}" style="font-size: 2.8rem; color: #f59e0b;"></i>
                        </div>

                        <!-- Center Title -->
                        <div style="flex: 1; min-width: 260px; text-align: center; padding: 0 10px;">
                            <h3 style="margin: 0; color: #1e3250; font-size: 1.32rem; font-weight: 500; font-family: 'Georgia', serif; line-height: 1.45;">
                                {!! nl2br(e($awardTitle)) !!}
                            </h3>
                        </div>

                        <!-- Right Amount -->
                        <div style="flex-shrink: 0; min-width: 120px; text-align: right;">
                            <span style="font-size: 1.45rem; font-weight: 800; color: #1e3250; font-family: 'Inter', sans-serif;">
                                {{ $awardAmount }}
                            </span>
                        </div>
                    </div>

                    <!-- Apply Button -->
                    <div id="award-btn-wrap-{{ $i }}" style="margin-top: 18px; text-align: center;">
                        <button type="button" 
                                onclick="document.getElementById('award-apply-{{ $i }}').style.display = 'block'; document.getElementById('award-btn-wrap-{{ $i }}').style.display = 'none';" 
                                style="background: #009688; color: #ffffff; padding: 9px 28px; border: none; border-radius: 4px; font-weight: 700; font-size: 0.92rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.6px; transition: all 0.2s ease; box-shadow: 0 2px 6px rgba(0, 150, 136, 0.2);">
                            APPLY
                        </button>
                    </div>

                    <!-- Inline Application Details & Form -->
                    <div id="award-apply-{{ $i }}" style="display: none; margin-top: 20px; padding: 22px; background: #e2e8f0; border-radius: 6px;">
                        
                        <!-- Step 1: Download Proforma -->
                        <div style="margin-bottom: 20px; text-align: center;">
                            <p style="margin-top: 0; color: #0f172a; font-size: 1.15rem; font-weight: 800; letter-spacing: 0.3px; margin-bottom: 12px;">
                                <i class="fa-solid fa-file-arrow-down" style="color: #009688; margin-right: 6px;"></i> Step 1: Download and fill the Proforma
                            </p>
                            <a href="{{ route($proformaRoute) }}" style="display: inline-flex; align-items: center; gap: 8px; background: #1e3250; color: white; padding: 11px 24px; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 0.95rem; box-shadow: 0 2px 5px rgba(0,0,0,0.15);">
                                <i class="fa-solid fa-download"></i> Download Proforma (.doc)
                            </a>
                        </div>

                        <!-- Step 2: Upload Completed Form -->
                        <form action="{{ route('awards.apply') }}" method="POST" enctype="multipart/form-data" style="margin: 0; padding: 20px; background: white; border-radius: 6px; border: 1px dashed #cbd5e1;">
                            @csrf
                            <input type="hidden" name="award_name" value="{{ $awardTitle }}">
                            
                            <p style="margin-top: 0; color: #0f172a; font-size: 1.15rem; text-align: center; margin-bottom: 15px; font-weight: 800; letter-spacing: 0.3px;">
                                <i class="fa-solid fa-file-arrow-up" style="color: #f59e0b; margin-right: 6px;"></i> Step 2: Upload your completed form
                            </p>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #1e3250; font-size: 0.9rem;">Upload Filled Form (.doc, .docx, .pdf)</label>
                            <input type="file" name="application_file" accept=".doc,.docx,.pdf" required style="display: block; width: 100%; margin-bottom: 15px; padding: 8px; border: 1px solid #cbd5e1; border-radius: 4px; box-sizing: border-box; font-size: 0.9rem;">
                            
                            <div style="display: flex; gap: 10px; justify-content: center; align-items: center; flex-wrap: wrap;">
                                <button type="button" onclick="document.getElementById('award-apply-{{ $i }}').style.display = 'none'; document.getElementById('award-btn-wrap-{{ $i }}').style.display = 'block';" style="background: #94a3b8; color: white; padding: 10px 20px; border: none; border-radius: 4px; font-weight: 600; cursor: pointer;">
                                    Cancel
                                </button>
                                <button type="submit" style="background: #009688; color: white; padding: 10px 24px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(0, 150, 136, 0.3);">
                                    <i class="fa-solid fa-upload"></i> Submit Application
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                @endif
            @endfor

            <!-- Bottom Dark Blue Banner Note -->
            @if(!empty($settings['awards_footer_note']))
            <div style="background-color: #154770; padding: 22px 30px; display: flex; align-items: center; gap: 24px; justify-content: center; text-align: center; border-top: 2px solid #8da8f6;">
                <div style="flex-shrink: 0;">
                    <i class="{{ $settings['awards_footer_icon'] ?? 'fa-solid fa-medal' }}" style="font-size: 2.5rem; color: #f59e0b;"></i>
                </div>
                <h4 style="margin: 0; color: #ffffff; font-size: 1.15rem; font-weight: 600; line-height: 1.5; font-family: 'Inter', sans-serif;">
                    {!! nl2br(e($settings['awards_footer_note'])) !!}
                </h4>
            </div>
            @endif

        </div>

    </div>
</section>
