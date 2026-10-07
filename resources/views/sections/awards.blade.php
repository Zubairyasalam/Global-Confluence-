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

        <!-- Awards List Container Card (Matches Reference Image 1) -->
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
                    <div style="margin-top: 18px; text-align: center;">
                        <button type="button" 
                                onclick="openAwardModal('{{ addslashes($awardTitle) }}', '{{ route($proformaRoute) }}')" 
                                style="background: #009688; color: #ffffff; padding: 9px 28px; border: none; border-radius: 4px; font-weight: 700; font-size: 0.92rem; cursor: pointer; text-transform: uppercase; letter-spacing: 0.6px; transition: all 0.2s ease; box-shadow: 0 2px 6px rgba(0, 150, 136, 0.2);">
                            APPLY
                        </button>
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

<!-- Award Application Modal -->
<div id="awardApplicationModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.7); z-index: 9999; backdrop-filter: blur(4px); align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #ffffff; border-radius: 12px; max-width: 550px; width: 100%; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); overflow: hidden; animation: modalFadeIn 0.3s ease;">
        
        <!-- Modal Header -->
        <div style="background: linear-gradient(135deg, #1e3250 0%, #0f172a 100%); padding: 20px 25px; display: flex; justify-content: space-between; align-items: center; color: white;">
            <div>
                <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; color: #38bdf8; font-weight: 700;">Nomination Proforma</span>
                <h3 id="modalAwardTitle" style="margin: 4px 0 0 0; font-size: 1.25rem; font-weight: 700; color: white;">Apply for Award</h3>
            </div>
            <button onclick="closeAwardModal()" style="background: none; border: none; color: #94a3b8; font-size: 1.5rem; cursor: pointer; padding: 0 5px; line-height: 1;">&times;</button>
        </div>

        <div style="padding: 25px;">
            
            <!-- Step 1: Download Proforma -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 18px; margin-bottom: 20px; text-align: center;">
                <div style="font-size: 0.9rem; font-weight: 700; color: #0f172a; margin-bottom: 6px;">
                    <i class="fa-solid fa-file-arrow-down" style="color: #009688; margin-right: 6px;"></i> STEP 1: Download & Fill the Proforma Form
                </div>
                <p style="font-size: 0.85rem; color: #64748b; margin: 0 0 12px 0;">
                    Download the official nomination Word document, fill out your details and research profile.
                </p>
                <a id="modalDownloadBtn" href="#" style="display: inline-flex; align-items: center; gap: 8px; background: #1e3250; color: white; padding: 10px 22px; border-radius: 6px; text-decoration: none; font-weight: 700; font-size: 0.9rem; transition: background 0.2s;">
                    <i class="fa-solid fa-download"></i> Download Proforma (.doc)
                </a>
            </div>

            <!-- Step 2: Upload Form -->
            <form action="{{ route('awards.apply') }}" method="POST" enctype="multipart/form-data" style="margin: 0;">
                @csrf
                <input type="hidden" name="award_name" id="modalAwardInput" value="">
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 700; color: #0f172a; font-size: 0.9rem; margin-bottom: 6px;">
                        <i class="fa-solid fa-file-arrow-up" style="color: #f59e0b; margin-right: 6px;"></i> STEP 2: Upload Completed Application (.doc, .docx, .pdf)
                    </label>
                    <input type="file" name="application_file" accept=".doc,.docx,.pdf" required style="width: 100%; padding: 10px; border: 1.5px dashed #cbd5e1; border-radius: 6px; background: #fdfdfd; box-sizing: border-box; font-size: 0.9rem;">
                    <span style="font-size: 0.78rem; color: #94a3b8; margin-top: 4px; display: block;">Maximum file size: 10MB</span>
                </div>

                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <button type="button" onclick="closeAwardModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 10px 20px; border-radius: 6px; font-weight: 600; cursor: pointer;">
                        Cancel
                    </button>
                    <button type="submit" style="background: #009688; color: white; border: none; padding: 10px 24px; border-radius: 6px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(0, 150, 136, 0.3);">
                        <i class="fa-solid fa-paper-plane"></i> Submit Application
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
@keyframes modalFadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}
</style>

<script>
function openAwardModal(awardTitle, downloadUrl) {
    document.getElementById('modalAwardTitle').innerText = awardTitle;
    document.getElementById('modalAwardInput').value = awardTitle;
    document.getElementById('modalDownloadBtn').href = downloadUrl;
    const modal = document.getElementById('awardApplicationModal');
    modal.style.display = 'flex';
}

function closeAwardModal() {
    document.getElementById('awardApplicationModal').style.display = 'none';
}

// Close modal when clicking outside
window.addEventListener('click', function(e) {
    const modal = document.getElementById('awardApplicationModal');
    if (e.target === modal) {
        closeAwardModal();
    }
});
</script>
