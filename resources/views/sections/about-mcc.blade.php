<!-- About MCC Section -->
<section class="about-organizers-section" style="background-color: #f8fbfa; padding: 70px 0 50px 0;">
    <div class="container" style="max-width: 1400px; width: 95%; margin: 0 auto; padding: 0 20px;">
        
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 45px;">
            <span class="section-subtitle" style="font-weight: 800; color: #009688; text-transform: uppercase; letter-spacing: 1.8px; font-size: 0.92rem; display: inline-block; margin-bottom: 8px;">
                {{ $settings['organizers_badge'] ?? 'ABOUT THE ORGANIZERS' }}
            </span>
            <h2 class="section-title" style="margin: 0; font-size: 2.4rem; color: #0f172a; font-weight: 800; letter-spacing: -0.5px;">
                {{ $settings['organizers_title'] ?? 'Host Institution & Departments' }}
            </h2>
            <div style="width: 65px; height: 4px; background: linear-gradient(90deg, #009688, #00e676); margin: 16px auto 0; border-radius: 2px;"></div>
        </div>

        <!-- Dashboard Wrapper (Expanded Full-Width Container) -->
        <div class="organizer-dashboard" style="display: flex; gap: 0; background: #ffffff; border-radius: 20px; box-shadow: 0 15px 50px rgba(15, 23, 42, 0.06); overflow: hidden; border: 1.5px solid #e2e8f0; min-height: 480px;">
            
            <!-- Sidebar Navigation -->
            <div class="dashboard-sidebar" style="width: 350px; background: #f8fafc; border-right: 1.5px solid #edf2f7; padding: 35px 24px; display: flex; flex-direction: column; gap: 14px; flex-shrink: 0;">
                <div style="font-size: 0.8rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 1.2px; padding-left: 10px; margin-bottom: 4px;">
                    Institution
                </div>
                
                <button class="nav-tab-btn active" onclick="switchOrganizerTab(event, 'tab-mcc')" style="display: flex; align-items: center; gap: 14px; padding: 16px 20px; border: none; background: #009688; border-radius: 12px; cursor: pointer; text-align: left; transition: all 0.3s ease; width: 100%; box-shadow: 0 4px 15px rgba(0, 150, 136, 0.15);">
                    <div class="tab-icon" style="width: 10px; height: 10px; border-radius: 50%; background: #ffffff; transition: all 0.3s ease; flex-shrink: 0;"></div>
                    <div>
                        <div style="font-weight: 800; font-size: 1rem; color: #ffffff;" class="tab-title-text">Madras Christian College</div>
                        <div style="font-size: 0.78rem; color: #e0f2f1; margin-top: 3px;">MCC • Chennai</div>
                    </div>
                </button>

                <div style="font-size: 0.8rem; font-weight: 800; color: #64748b; text-transform: uppercase; letter-spacing: 1.2px; padding-left: 10px; margin-top: 22px; margin-bottom: 4px;">
                    Departments (MCC)
                </div>

                <button class="nav-tab-btn" onclick="switchOrganizerTab(event, 'tab-microbiology')" style="display: flex; align-items: center; gap: 14px; padding: 16px 20px; border: none; background: transparent; border-radius: 12px; cursor: pointer; text-align: left; transition: all 0.3s ease; width: 100%;">
                    <div class="tab-icon" style="width: 10px; height: 10px; border-radius: 50%; background: #94a3b8; transition: all 0.3s ease; flex-shrink: 0;"></div>
                    <div>
                        <div style="font-weight: 800; font-size: 1rem; color: #334155;" class="tab-title-text">Dept. of Microbiology (SFS)</div>
                        <div style="font-size: 0.78rem; color: #64748b; margin-top: 3px;">Est. 2002 • Research Unit</div>
                    </div>
                </button>

                <button class="nav-tab-btn" onclick="switchOrganizerTab(event, 'tab-chemistry')" style="display: flex; align-items: center; gap: 14px; padding: 16px 20px; border: none; background: transparent; border-radius: 12px; cursor: pointer; text-align: left; transition: all 0.3s ease; width: 100%;">
                    <div class="tab-icon" style="width: 10px; height: 10px; border-radius: 50%; background: #94a3b8; transition: all 0.3s ease; flex-shrink: 0;"></div>
                    <div>
                        <div style="font-weight: 800; font-size: 1rem; color: #334155;" class="tab-title-text">Dept. of Chemistry (SFS)</div>
                        <div style="font-size: 0.78rem; color: #64748b; margin-top: 3px;">Est. 2003 • M.Sc. Program</div>
                    </div>
                </button>
            </div>

            <!-- Content Area (Spacious Full-Width Body) -->
            <div class="dashboard-content" style="flex-grow: 1; padding: 45px 55px; display: flex; flex-direction: column; justify-content: center; background: #ffffff;">
                
                <!-- Tab Panels -->
                <div>
                    <!-- MCC Panel -->
                    <div id="tab-mcc" class="tab-panel active" style="display: block;">
                        <span style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; font-weight: 800; display: inline-block; margin-bottom: 4px;">
                            Madras Christian College
                        </span>
                        <h3 style="font-size: 2.1rem; margin: 6px 0 22px; color: #0f172a; font-weight: 800; letter-spacing: -0.3px;">
                            {{ $settings['mcc_title'] ?? 'A Legacy of Academic Excellence' }}
                        </h3>
                        
                        <div style="width: 100%; color: #334155; font-size: 1.05rem; line-height: 1.85;">
                            <p style="margin-bottom: 20px; text-align: justify;">
                                <strong>Madras Christian College (MCC)</strong>, established in 1837, stands as a premier institution of higher learning with a distinguished legacy of 189 years of academic excellence, character formation, and nation-building.
                            </p>
                            <p style="margin-bottom: 20px; text-align: justify;">
                                Accredited with an <strong>'A' Grade by NAAC</strong>, MCC is globally recognized for quality and institutional excellence. As an <strong>autonomous institution affiliated to the University of Madras</strong>, MCC offers a vibrant environment for holistic education, nurturing intellect, character, and leadership across diverse disciplines.
                            </p>
                            <p style="margin-bottom: 0; text-align: justify;">
                                The college actively fosters <strong>research &amp; innovation</strong>, encouraging faculty and students to undertake impactful, interdisciplinary research for a better world.
                            </p>
                        </div>
                    </div>

                    <!-- Microbiology Panel -->
                    <div id="tab-microbiology" class="tab-panel" style="display: none;">
                        <span style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; font-weight: 800; display: inline-block; margin-bottom: 4px;">
                            Madras Christian College
                        </span>
                        <h3 style="font-size: 2.1rem; margin: 6px 0 22px; color: #0f172a; font-weight: 800; letter-spacing: -0.3px;">
                            {{ $settings['micro_title'] ?? 'Department of Microbiology (SFS)' }}
                        </h3>
                        
                        <div style="width: 100%; color: #334155; font-size: 1.05rem; line-height: 1.85;">
                            <p style="margin-bottom: 20px; text-align: justify;">
                                The <strong>Department of Microbiology (Self-Financed Stream)</strong> at Madras Christian College was established in 2002 and is committed to excellence in microbiology education, scientific inquiry, and research.
                            </p>
                            <p style="margin-bottom: 20px; text-align: justify;">
                                Since 2018, the department has been a full-fledged research unit offering a <strong>Ph.D. programme recognised by the University of Madras</strong> for doctoral research. It is a research-driven department with a strong focus on applied, clinical, food, and industrial microbiology.
                            </p>
                            <p style="margin-bottom: 0; text-align: justify;">
                                The department features well-equipped laboratories supported by sophisticated instrumentation and modern research facilities. With a strong emphasis on <strong>student-centred learning</strong>, hands-on training, project work, innovation, and scientific skill development, it prepares graduates for leading roles in academia and industry.
                            </p>
                        </div>
                    </div>

                    <!-- Chemistry Panel -->
                    <div id="tab-chemistry" class="tab-panel" style="display: none;">
                        <span style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; font-weight: 800; display: inline-block; margin-bottom: 4px;">
                            Madras Christian College
                        </span>
                        <h3 style="font-size: 2.1rem; margin: 6px 0 22px; color: #0f172a; font-weight: 800; letter-spacing: -0.3px;">
                            {{ $settings['chem_title'] ?? 'Department of Chemistry (SFS)' }}
                        </h3>
                        
                        <div style="width: 100%; color: #334155; font-size: 1.05rem; line-height: 1.85;">
                            <p style="margin-bottom: 20px; text-align: justify;">
                                The <strong>Department of Chemistry (Self-Financed Stream)</strong> at Madras Christian College was established in 2003, offering high-quality postgraduate education in Chemical Sciences.
                            </p>
                            <p style="margin-bottom: 20px; text-align: justify;">
                                The department provides interdisciplinary chemical sciences expertise spanning organic, inorganic, physical, analytical, environmental, and medicinal chemistry. It offers strong laboratory training emphasizing practical skills, experimentation, and scientific methodology.
                            </p>
                            <p style="margin-bottom: 0; text-align: justify;">
                                Through its career-oriented education, the department prepares students for higher studies, competitive examinations, teaching, and successful professional careers across chemical and scientific domains.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Scoped Styles & Tab Script -->
<style>
    .nav-tab-btn:hover {
        background-color: #f1f8f6 !important;
    }
    .nav-tab-btn.active {
        background-color: #009688 !important;
        box-shadow: 0 4px 15px rgba(0, 150, 136, 0.2) !important;
    }
    .nav-tab-btn.active .tab-title-text {
        color: #ffffff !important;
    }
    .nav-tab-btn.active div div {
        color: #e0f2f1 !important;
    }
    .nav-tab-btn.active .tab-icon {
        background: #ffffff !important;
        transform: scale(1.3);
    }
    
    @media (max-width: 991px) {
        .organizer-dashboard {
            flex-direction: column !important;
            min-height: auto !important;
        }
        .dashboard-sidebar {
            width: 100% !important;
            border-right: none !important;
            border-bottom: 1.5px solid #edf2f7 !important;
            flex-direction: row !important;
            overflow-x: auto !important;
            white-space: nowrap !important;
            padding: 20px !important;
            gap: 12px !important;
        }
        .dashboard-sidebar > div {
            display: none !important;
        }
        .nav-tab-btn {
            width: auto !important;
            flex-shrink: 0 !important;
            padding: 12px 18px !important;
        }
        .dashboard-content {
            padding: 30px 24px !important;
        }
    }
</style>

<script>
    function switchOrganizerTab(event, tabId) {
        event.preventDefault();
        
        const buttons = document.querySelectorAll('.nav-tab-btn');
        buttons.forEach(btn => {
            btn.classList.remove('active');
            btn.style.backgroundColor = 'transparent';
            const title = btn.querySelector('.tab-title-text');
            if (title) title.style.color = '#334155';
            const sub = btn.querySelector('div div:last-child');
            if (sub) sub.style.color = '#64748b';
            const icon = btn.querySelector('.tab-icon');
            if (icon) icon.style.background = '#94a3b8';
        });
        
        const panels = document.querySelectorAll('.tab-panel');
        panels.forEach(panel => {
            panel.style.display = 'none';
        });
        
        const currentBtn = event.currentTarget;
        currentBtn.classList.add('active');
        currentBtn.style.backgroundColor = '#009688';
        const curTitle = currentBtn.querySelector('.tab-title-text');
        if (curTitle) curTitle.style.color = '#ffffff';
        const curSub = currentBtn.querySelector('div div:last-child');
        if (curSub) curSub.style.color = '#e0f2f1';
        const currentIcon = currentBtn.querySelector('.tab-icon');
        if (currentIcon) currentIcon.style.background = '#ffffff';
        
        const targetPanel = document.getElementById(tabId);
        if (targetPanel) {
            targetPanel.style.display = 'block';
        }
    }
</script>
