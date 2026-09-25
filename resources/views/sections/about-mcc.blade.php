<!-- About MCC Section -->
<section class="about-organizers-section" style="background-color: #f8fbfa; padding: 60px 0 30px 0;">
    <div class="container" style="max-width: 90%; margin: 0 auto;">
        
        <!-- Header -->
        <div style="text-align: center; margin-bottom: 40px;">
            <span class="section-subtitle" style="font-weight: bold; color: #009688; text-transform: uppercase; letter-spacing: 1.5px; font-size: 0.9rem;">
                About The Organizers
            </span>
            <h2 class="section-title" style="margin-top: 10px; font-size: 2.2rem; color: #111; font-weight: 800;">
                Host Institution &amp; Departments
            </h2>
            <div style="width: 60px; height: 4px; background: #009688; margin: 15px auto 0; border-radius: 2px;"></div>
        </div>

        <!-- Dashboard Wrapper -->
        <div class="organizer-dashboard" style="display: flex; gap: 30px; background: #ffffff; border-radius: 24px; box-shadow: 0 15px 50px rgba(0,0,0,0.04); overflow: hidden; border: 1px solid #eaeaea; min-height: 480px;">
            
            <!-- Sidebar Navigation -->
            <div class="dashboard-sidebar" style="width: 320px; background: #fcfdfe; border-right: 1px solid #f0f0f0; padding: 30px 20px; display: flex; flex-direction: column; gap: 12px; flex-shrink: 0;">
                <div style="font-size: 0.8rem; font-weight: 700; color: #888; text-transform: uppercase; letter-spacing: 1px; padding-left: 10px; margin-bottom: 5px;">Institution</div>
                
                <button class="nav-tab-btn active" onclick="switchOrganizerTab(event, 'tab-mcc')" style="display: flex; align-items: center; gap: 12px; padding: 14px 18px; border: none; background: none; border-radius: 12px; cursor: pointer; text-align: left; transition: all 0.3s ease; width: 100%;">
                    <div class="tab-icon" style="width: 8px; height: 8px; border-radius: 50%; background: #ffffff; transition: all 0.3s ease;"></div>
                    <div>
                        <div style="font-weight: 700; font-size: 0.95rem; color: #333;" class="tab-title-text">Madras Christian College</div>
                        <div style="font-size: 0.75rem; color: #777; margin-top: 2px;">MCC • Chennai</div>
                    </div>
                </button>

                <div style="font-size: 0.8rem; font-weight: 700; color: #888; text-transform: uppercase; letter-spacing: 1px; padding-left: 10px; margin-top: 20px; margin-bottom: 5px;">Departments (MCC)</div>

                <button class="nav-tab-btn" onclick="switchOrganizerTab(event, 'tab-microbiology')" style="display: flex; align-items: center; gap: 12px; padding: 14px 18px; border: none; background: none; border-radius: 12px; cursor: pointer; text-align: left; transition: all 0.3s ease; width: 100%;">
                    <div class="tab-icon" style="width: 8px; height: 8px; border-radius: 50%; background: #ccc; transition: all 0.3s ease;"></div>
                    <div>
                        <div style="font-weight: 700; font-size: 0.95rem; color: #555;" class="tab-title-text">Dept. of Microbiology (SFS)</div>
                        <div style="font-size: 0.75rem; color: #777; margin-top: 2px;">Est. 2002 • Research Unit</div>
                    </div>
                </button>

                <button class="nav-tab-btn" onclick="switchOrganizerTab(event, 'tab-chemistry')" style="display: flex; align-items: center; gap: 12px; padding: 14px 18px; border: none; background: none; border-radius: 12px; cursor: pointer; text-align: left; transition: all 0.3s ease; width: 100%;">
                    <div class="tab-icon" style="width: 8px; height: 8px; border-radius: 50%; background: #ccc; transition: all 0.3s ease;"></div>
                    <div>
                        <div style="font-weight: 700; font-size: 0.95rem; color: #555;" class="tab-title-text">Dept. of Chemistry (SFS)</div>
                        <div style="font-size: 0.75rem; color: #777; margin-top: 2px;">Est. 2003 • M.Sc. Program</div>
                    </div>
                </button>
            </div>

            <!-- Content Area -->
            <div class="dashboard-content" style="flex-grow: 1; padding: 40px; display: flex; flex-direction: column; justify-content: flex-start; background: #ffffff;">
                
                <!-- Tab Panels -->
                <div>
                    <!-- MCC Panel -->
                    <div id="tab-mcc" class="tab-panel active" style="display: block;">
                        <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; font-weight: 700;">
                            Madras Christian College
                        </span>
                        <h3 style="font-size: 1.8rem; margin: 8px 0 20px; color: #112340; font-weight: 800;">
                            A Legacy of Academic Excellence
                        </h3>
                        
                        <div style="max-width: 800px;">
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 18px; text-align: justify;">
                                <strong>Madras Christian College (MCC)</strong>, established in 1837, stands as a premier institution of higher learning with a distinguished legacy of 189 years of academic excellence, character formation, and nation-building.
                            </p>
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 18px; text-align: justify;">
                                Accredited with an <strong>'A' Grade by NAAC</strong>, MCC is globally recognized for quality and institutional excellence. As an <strong>autonomous institution affiliated to the University of Madras</strong>, MCC offers a vibrant environment for holistic education, nurturing intellect, character, and leadership across diverse disciplines.
                            </p>
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 0; text-align: justify;">
                                The college actively fosters <strong>research &amp; innovation</strong>, encouraging faculty and students to undertake impactful, interdisciplinary research for a better world.
                            </p>
                        </div>
                    </div>

                    <!-- Microbiology Panel -->
                    <div id="tab-microbiology" class="tab-panel" style="display: none;">
                        <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; font-weight: 700;">
                            Madras Christian College
                        </span>
                        <h3 style="font-size: 1.8rem; margin: 8px 0 20px; color: #112340; font-weight: 800;">
                            Department of Microbiology (SFS)
                        </h3>
                        
                        <div style="max-width: 800px;">
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 18px; text-align: justify;">
                                The <strong>Department of Microbiology (Self-Financed Stream)</strong> at Madras Christian College was established in 2002 and is committed to excellence in microbiology education, scientific inquiry, and research.
                            </p>
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 18px; text-align: justify;">
                                Since 2018, the department has been a full-fledged research unit offering a <strong>Ph.D. programme recognised by the University of Madras</strong> for doctoral research. It is a research-driven department with a strong focus on applied, clinical, food, and industrial microbiology.
                            </p>
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 0; text-align: justify;">
                                The department features well-equipped laboratories supported by sophisticated instrumentation and modern research facilities. With a strong emphasis on <strong>student-centred learning</strong>, hands-on training, project work, innovation, and scientific skill development, it prepares graduates for leading roles in academia and industry.
                            </p>
                        </div>
                    </div>

                    <!-- Chemistry Panel -->
                    <div id="tab-chemistry" class="tab-panel" style="display: none;">
                        <span style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1.5px; color: #009688; font-weight: 700;">
                            Madras Christian College
                        </span>
                        <h3 style="font-size: 1.8rem; margin: 8px 0 20px; color: #112340; font-weight: 800;">
                            Department of Chemistry (SFS)
                        </h3>
                        
                        <div style="max-width: 800px;">
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 18px; text-align: justify;">
                                The <strong>Department of Chemistry (Self-Financed Stream)</strong> at Madras Christian College was established in 2003, offering high-quality postgraduate education in Chemical Sciences.
                            </p>
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 18px; text-align: justify;">
                                The department provides interdisciplinary chemical sciences expertise spanning organic, inorganic, physical, analytical, environmental, and medicinal chemistry. It offers strong laboratory training emphasizing practical skills, experimentation, and scientific methodology.
                            </p>
                            <p style="color: #475569; line-height: 1.8; font-size: 1.02rem; margin-bottom: 0; text-align: justify;">
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
        box-shadow: 0 4px 15px rgba(0, 150, 136, 0.15);
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
            border-bottom: 1px solid #f0f0f0 !important;
            flex-direction: row !important;
            overflow-x: auto !important;
            white-space: nowrap !important;
            padding: 20px !important;
            gap: 10px !important;
        }
        .dashboard-sidebar > div {
            display: none !important; /* Hide headings on mobile scrollbar */
        }
        .nav-tab-btn {
            width: auto !important;
            flex-shrink: 0 !important;
            padding: 10px 16px !important;
        }
        .dashboard-content {
            padding: 30px 20px !important;
        }
    }
</style>

<script>
    function switchOrganizerTab(event, tabId) {
        // Prevent default action
        event.preventDefault();
        
        // Deactivate all buttons
        const buttons = document.querySelectorAll('.nav-tab-btn');
        buttons.forEach(btn => {
            btn.classList.remove('active');
            // reset icon color
            const icon = btn.querySelector('.tab-icon');
            if (icon) icon.style.background = '#ccc';
        });
        
        // Deactivate all panels
        const panels = document.querySelectorAll('.tab-panel');
        panels.forEach(panel => {
            panel.style.display = 'none';
        });
        
        // Activate current button
        const currentBtn = event.currentTarget;
        currentBtn.classList.add('active');
        const currentIcon = currentBtn.querySelector('.tab-icon');
        if (currentIcon) currentIcon.style.background = '#ffffff';
        
        // Activate corresponding panel
        const targetPanel = document.getElementById(tabId);
        if (targetPanel) {
            targetPanel.style.display = 'block';
        }
    }
</script>
