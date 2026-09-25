<!-- Conference Awards Section -->
<section class="awards-section" style="background-color: #ffffff; padding: 70px 0 50px 0; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 50px;">
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 14px; color: #0f172a; font-weight: 800; font-size: 2.2rem; text-transform: uppercase; tracking: -0.5px;">
                {{ $settings['awards_section_title'] ?? 'CONFERENCE AWARDS' }}
            </h2>
            <div class="header-line" style="width: 60px; height: 3px; background-color: #009688; margin: 0 auto 16px auto; border-radius: 2px;"></div>
            <p class="participants-desc" style="max-width: 750px; margin: 0 auto; color: #64748b; font-size: 1.05rem; line-height: 1.6;">
                {{ $settings['awards_section_sub'] ?? 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.' }}
            </p>
        </div>

        <!-- Awards List Container -->
        <div style="max-width: 700px; margin: 0 auto; border: 2px solid #9fb6f2; background-color: #f4f9f9; border-radius: 4px; overflow: hidden;">
            
            @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 15px; margin-bottom: 20px; border-radius: 4px; text-align: center; border: 1px solid #34d399;">
                <strong>Success!</strong> {{ session('success') }}
            </div>
            @endif
            @if($errors->any())
            <div style="background-color: #fee2e2; color: #991b1b; padding: 15px; margin-bottom: 20px; border-radius: 4px; text-align: center; border: 1px solid #f87171;">
                <strong>Error!</strong> {{ $errors->first() }}
            </div>
            @endif

            @for($i = 1; $i <= ($settings['awards_count'] ?? 20); $i++)
                @if(!empty($settings['award_' . $i . '_title']))
                <!-- Row {{ $i }} -->
                <div style="padding: 25px 30px; {{ $i < 3 ? 'border-bottom: 2px solid #9fb6f2;' : '' }}">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 25px; flex: 1;">
                            <i class="{{ $settings['award_' . $i . '_icon'] ?? 'fa-solid fa-award' }}" style="font-size: 3rem; color: #f59e0b;"></i>
                            <h4 style="margin: 0; color: #1e3250; font-size: 1.3rem; font-weight: 500; font-family: Georgia, serif; line-height: 1.5; text-align: center; flex: 1;">
                                {!! nl2br(e($settings['award_' . $i . '_title'])) !!}
                            </h4>
                        </div>
                        <div style="font-size: 1.5rem; font-weight: 800; color: #1e3250; min-width: 120px; text-align: right;">
                            {{ $settings['award_' . $i . '_amount'] ?? '' }}
                        </div>
                    </div>

                    @php
                        $awardTitle = $settings['award_' . $i . '_title'];
                        $isFacultyAward = stripos($awardTitle, 'Faculty Award') !== false;
                        $isScholarAward = stripos($awardTitle, 'Scholar Award') !== false;
                        $isInnovatorAward = stripos($awardTitle, 'Young Innovator') !== false;
                        $downloadRouteName = '';
                        if ($isFacultyAward) $downloadRouteName = 'download.proforma';
                        if ($isScholarAward) $downloadRouteName = 'download.proforma_scholar';
                        if ($isInnovatorAward) $downloadRouteName = 'download.proforma_innovator';
                    @endphp

                    @if($isFacultyAward || $isScholarAward || $isInnovatorAward)
                    <div style="margin-top: 20px; text-align: center;">
                        <button onclick="document.getElementById('award-apply-{{ $i }}').style.display = 'block'; this.style.display = 'none';" style="background: #009688; color: white; padding: 10px 25px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; text-transform: uppercase; letter-spacing: 0.5px;">Apply</button>
                    </div>
                    <div id="award-apply-{{ $i }}" style="display: none; margin-top: 20px; padding: 20px; background: #e2e8f0; border-radius: 6px;">
                        <div style="margin-bottom: 20px; text-align: center;">
                            <p style="margin-top: 0; color: #475569; font-size: 0.95rem;">Step 1: Download and fill the Proforma</p>
                            <a href="{{ route($downloadRouteName) }}" style="display: inline-block; background: #1e3250; color: white; padding: 12px 25px; text-decoration: none; border-radius: 4px; font-weight: bold;"><i class="fa-solid fa-download"></i> Download Proforma</a>
                        </div>
                        <form action="{{ route('awards.apply') }}" method="POST" enctype="multipart/form-data" style="margin: 0; padding: 20px; background: white; border-radius: 4px; border: 1px dashed #cbd5e1;">
                            @csrf
                            <input type="hidden" name="award_name" value="{{ $settings['award_' . $i . '_title'] }}">
                            <p style="margin-top: 0; color: #475569; font-size: 0.95rem; text-align: center; margin-bottom: 15px;">Step 2: Upload your completed form</p>
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #1e3250;">Upload Filled Form (.doc, .docx, .pdf)</label>
                            <input type="file" name="application_file" accept=".doc,.docx,.pdf" required style="display: block; width: 100%; margin-bottom: 15px; padding: 8px; border: 1px solid #cbd5e1; border-radius: 4px;">
                            <div style="text-align: center;">
                                <button type="submit" style="background: #f59e0b; color: white; padding: 12px 25px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;"><i class="fa-solid fa-upload"></i> Submit Application</button>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                @endif
            @endfor

            <!-- Bottom Banner -->
            @if(!empty($settings['awards_footer_note']))
            <div style="background-color: #154770; padding: 20px 30px; display: flex; align-items: center; gap: 30px; justify-content: center;">
                <img src="{{ asset('images/gold-medal.png') }}" alt="Gold Medal" style="height: 60px; width: auto; object-fit: contain;">
                <h4 style="margin: 0; color: #ffffff; font-size: 1.15rem; font-weight: 500; line-height: 1.6; text-align: center;">
                    {!! nl2br(e($settings['awards_footer_note'])) !!}
                </h4>
            </div>
            @endif

        </div>

    </div>
</section>
