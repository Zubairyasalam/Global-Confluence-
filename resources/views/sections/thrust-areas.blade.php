<!-- Thrust Areas Section -->
<section class="thrust-areas-section" style="background-color: #ffffff; padding: 10px 0 40px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 30px;">
            <div class="section-subtitle" style="margin-bottom: 8px; font-weight: bold; color: #009688; text-transform: uppercase; letter-spacing: 2px; font-size: 1rem;">Conference Themes</div>
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 12px; color: #333; font-weight: 800;">Thrust <span>Areas</span></h2>
            <div class="header-line" style="width: 60px; height: 4px; background-color: #009688; margin: 0 auto 15px auto;"></div>
            <p class="participants-desc" style="margin-top: 0;">
                {{ $settings['thrust_areas_desc'] ?? 'Explore the latest advancements, critical challenges, and future innovations across our core diagnostic and scientific themes.' }}
            </p>
        </div>

        <!-- TRACK-WISE PRESENTATION SCHEDULE -->
        <div class="presentation-schedule" style="margin-top: 60px; margin-bottom: 50px;">
            <div style="border: 2px solid #009688; border-radius: 12px; padding: 25px; background: #fff; position: relative;">
                
                <!-- Center Header Box -->
                <div style="background: linear-gradient(135deg, #00796B, #009688); color: #fff; text-align: center; font-weight: bold; font-size: 1.4rem; padding: 12px 30px; display: inline-block; position: absolute; top: -25px; left: 50%; transform: translateX(-50%); border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); white-space: nowrap;">
                    TRACK-WISE PRESENTATION SCHEDULE
                </div>

                <div class="schedule-grid" style="display: grid; grid-template-columns: 1fr auto 1fr; gap: 30px; margin-top: 30px; align-items: stretch;">
                    
                    <!-- Left Side: Day I -->
                    <div>
                        <div style="background: linear-gradient(135deg, #00796B, #009688); color: #fff; text-align: center; font-weight: bold; font-size: 1.2rem; padding: 12px; border-radius: 8px 8px 0 0;">
                            Day I – 3:00 PM to 6:00 PM
                        </div>
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #b2dfdb;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb; width: 45%;">Presentation Type</th>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb;">Tracks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb;">Paper Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb;">Track I, Track II, Track III</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-right: 1px solid #b2dfdb;">Poster Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600;">Track I, Track II, Track III</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Divider -->
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <div style="width: 1px; height: 80%; border-left: 2px dotted #b2dfdb;"></div>
                    </div>

                    <!-- Right Side: Day II -->
                    <div>
                        <div style="background: linear-gradient(135deg, #00796B, #009688); color: #fff; text-align: center; font-weight: bold; font-size: 1.2rem; padding: 12px; border-radius: 8px 8px 0 0;">
                            Day II – 11:15 AM to 1:15 PM
                        </div>
                        <table style="width: 100%; border-collapse: collapse; border: 1px solid #b2dfdb;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb; width: 45%;">Presentation Type</th>
                                    <th style="padding: 12px; text-align: center; color: #00796B; font-weight: bold; font-size: 1.1rem; border-bottom: 1px solid #b2dfdb;">Session</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb; border-right: 1px solid #b2dfdb;">Oral Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-bottom: 1px solid #b2dfdb;">Parallel Session</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600; border-right: 1px solid #b2dfdb;">Poster Presentation</td>
                                    <td style="padding: 12px; text-align: center; color: #333; font-weight: 600;">Parallel Session</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            
            <style>
                @media (max-width: 991px) {
                    .schedule-grid {
                        grid-template-columns: 1fr !important;
                    }
                    .schedule-grid > div:nth-child(2) {
                        display: none !important;
                    }
                }
            </style>
        </div>

        <style>
            .thrust-stack {
                display: flex;
                flex-direction: column;
                gap: 30px;
            }
            .premium-topic-card-horizontal {
                background: #ffffff;
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 10px 40px rgba(15, 23, 42, 0.04);
                border: 1px solid rgba(0, 150, 136, 0.1);
                position: relative;
                overflow: hidden;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .premium-topic-card-horizontal:hover {
                transform: translateY(-3px);
                box-shadow: 0 20px 50px rgba(0, 150, 136, 0.12);
                border-color: rgba(0, 150, 136, 0.3);
            }
            .premium-topic-card-horizontal::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: linear-gradient(90deg, #009688, #84cc16);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .premium-topic-card-horizontal:hover::before {
                opacity: 1;
            }
            .premium-topic-title-horizontal {
                margin-top: 0;
                margin-bottom: 25px;
                font-size: 1.4rem;
                color: #0f172a;
                font-weight: 800;
                line-height: 1.4;
            }

            .premium-topic-list-columns {
                list-style: none;
                padding: 0;
                margin: 0;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                column-gap: 40px;
                row-gap: 15px;
            }
            .premium-topic-list-columns li {
                display: flex;
                gap: 12px;
                font-size: 1.05rem;
                color: #475569;
                line-height: 1.5;
                align-items: flex-start;
                font-weight: 500;
                padding: 8px 0;
                border-bottom: 1px dashed rgba(0,0,0,0.06);
            }
            .premium-topic-list-columns li i {
                color: #84cc16; /* Vibrant lime green for the checks */
                margin-top: 4px;
                font-size: 0.95rem;
            }
        </style>

        @php
        $trackDescriptions = [
            0 => "The convergence of human, animal, and environmental health systems has become central to managing the growing burden of zoonotic and vector-borne disease. Recent scholarship emphasizes that antimicrobial use across human medicine, food-animal production, and aquaculture is a major driver of resistance, underscoring the need for coordinated cross-sectoral action to safeguard both disease control and health-system resilience (Qasim, Khan, & Raza, 2024), since antimicrobials used in food animals and aquaculture for therapy, prophylaxis, and growth promotion contribute significantly to resistance development, making sustainable collaboration across One Health sectors essential. Effective response further depends on integrated surveillance architecture capable of tracking pathogen movement across species and geographic boundaries. Given the complex interactions at the interfaces of environment, livestock, wildlife, and humans, along with the cross-species and regional movement of pathogens, integrated surveillance systems built on strong collaboration among governments, research institutions, and communities are essential for timely, accurate monitoring and response (Bett et al., 2024). This track invites contributions that advance diagnostics, molecular epidemiology, novel antimicrobial strategies, and metagenomic approaches to pathogen emergence within this integrated framework.",
            1 => "Translating One Health principles into durable public health outcomes requires governance architectures capable of sustaining multisectoral coordination beyond crisis-driven response. A recent systematic review of governance mechanisms found that coordinating efforts, fostering partnerships, and establishing effective policy frameworks are essential functions of governance structures in One Health initiatives, while identifying funding limitations, jurisdictional conflict, and insufficient cross-disciplinary communication as persistent obstacles to implementation (2024). Complementary analysis of governance case studies across diverse contexts similarly found that strong political will and crisis-driven momentum tend to facilitate progress, whereas siloed systems, sectoral dominance, limited accountability, and inadequate institutionalisation act as recurring barriers — a finding with particular relevance to antimicrobial resistance, where governance must be sustained outside acute outbreak periods (2025). This track welcomes research on institutional design, workforce capacity, community-led resilience, and the social determinants that shape health-system performance.",
            2 => "Climate change and biodiversity loss are increasingly understood not as parallel crises but as a single, interdependent threat to planetary and human health. A 2023 cross-journal call for global action argued that climate change and biodiversity loss constitute one indivisible crisis that must be addressed together to protect health and avert catastrophe, given the severity of the resulting environmental emergency (Zielinski et al., 2023). The pathways connecting environmental disruption to disease are wide-ranging: shifts in temperature, precipitation, and land use alter the emergence and spread of vector- and rodent-borne diseases, while deforestation and habitat loss further compound biodiversity decline and infection risk, with changes in temperature, precipitation, and seasonality influencing the emergence, incidence, and spread of diseases such as dengue, malaria, and cholera, and land-use change and deforestation contributing to both biodiversity loss and the spread of infectious diseases such as malaria and Lyme disease (Universidade de Évora, 2023). This track solicits research bridging climate science, ecology, and public health toward climate-resilient, ecosystem-based health strategies.",
            3 => "Advances in nanotechnology and green chemistry are reshaping the tools available for environmental remediation and contaminant detection. A recent editorial synthesis of the field noted that nanomaterials such as metal oxides, quantum dots, metal-organic frameworks, and graphene-based composites have markedly improved the sensitivity and specificity of contaminant detection, while rising concern over the environmental and health impacts of nanomaterial production has driven research toward greener, lower-toxicity fabrication methods (2025). This shift is occurring alongside growing attention to a broader class of emerging pollutants, with current research priorities spanning pharmaceuticals, personal care products, endocrine disruptors, microplastics, PFAS, and other persistent, bioactive contaminants that resist conventional treatment, alongside sustainable, low-energy remediation solutions responsive to climate and regulatory pressures (Benthamscience, 2025). This track invites contributions on green materials design, biosensing, remediation technology, and the regulatory pathways needed to translate laboratory innovation into field-deployable One Health solutions.",
            4 => "India's traditional medical systems represent a vast, largely undocumented reservoir of ethnopharmacological knowledge that is increasingly recognized as both a scientific and legal frontier. A recent review of India's intellectual property framework concluded that appropriate guidelines are still needed to bring the diverse medical knowledge of Indigenous communities under a coherent framework that allows these communities to exercise and benefit from their rights over that knowledge, and proposed a human-rights-based, culturally sensitive approach to documentation as a precursor to formal legal recognition (University of Lapland research repository, 2023). This complements the long-standing scholarly mandate to validate traditional claims through rigorous investigation, as reflected in the disciplinary scope of India's own traditional-knowledge literature, which encompasses ethno-biology, ethno-medicine, ethno-pharmacology, ethno-pharmacognosy, and clinical studies of efficacy as means of validating indigenous claims regarding plant-, animal-, and mineral-based traditional health-care systems such as Ayurveda, Siddha, Yoga, and Unani (Indian Journal of Traditional Knowledge, CSIR). This track invites work on ethnomedicine, medicinal plant research, and the ethical translation of traditional knowledge into modern therapeutics.",
            5 => "The pharmaceutical and life-sciences sectors face mounting pressure to align industrial practice with environmental and social governance (ESG) imperatives, given the sector's disproportionate environmental footprint relative to other major industries. Analysis of the sector notes that regulatory frameworks such as the EU's Corporate Sustainability Reporting Directive and the International Sustainability Standards Board's climate disclosure requirements are compelling pharmaceutical companies and their suppliers to measure and report greenhouse gas emissions, water use, pollution, and governance practices across the full value chain (Neuland Labs, 2025). In the Indian context specifically, supply-chain sustainability is emerging as both an environmental and operational priority, since India's pharmaceutical supply chain is among the most complex in the world, and building a sustainable chain — through decentralized manufacturing, low-emission transport, biodegradable packaging, and optimized logistics — is essential not only for environmental reasons but also to strengthen resilience against disruption and reduce cost (Indian Pharmaceutical Alliance, 2025). This track invites contributions on responsible manufacturing, sustainable veterinary and agricultural biologics, and the integration of One Health metrics into corporate ESG reporting."
        ];
        @endphp
        
        <div class="thrust-stack">
            @forelse($tracks as $index => $track)
                <div class="premium-topic-card-horizontal">
                    <h3 class="premium-topic-title-horizontal">
                        {{ $track->title }}
                    </h3>
                    
                    @if(isset($trackDescriptions[$index]))
                    <div class="track-desc-wrapper" style="margin-bottom: 25px; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div id="track{{$index}}-desc-content" style="max-height: 80px; overflow: hidden; position: relative; transition: max-height 0.4s ease-in-out;">
                            <p style="color: #475569; line-height: 1.7; font-size: 1.05rem; text-align: justify; margin: 0;">
                                {{ $trackDescriptions[$index] }}
                            </p>
                            <div id="track{{$index}}-desc-fade" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 50px; background: linear-gradient(transparent, #ffffff); pointer-events: none;"></div>
                        </div>
                        <button id="track{{$index}}-readmore-btn" onclick="toggleTrackDesc({{$index}})" style="background: none; border: none; color: #009688; font-weight: 700; cursor: pointer; padding: 12px 0 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.95rem; outline: none;">
                            <span>Read More</span> <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    @endif

                    @if($track->bullet_points && count($track->bullet_points) > 0)
                    <ul class="premium-topic-list-columns">
                        @foreach($track->bullet_points as $point)
                        <li><i class="fa-solid fa-check"></i> <span>{{ $point }}</span></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            @empty
                <div style="text-align: center; color: #64748b; font-style: italic; padding: 40px;">
                    Thrust Areas and Tracks will be announced soon.
                </div>
            @endforelse

            <div class="premium-topic-card-horizontal" style="margin-top: 10px;">
                <h3 class="premium-topic-title-horizontal" style="font-size: 1.4rem; margin-bottom: 25px; color: #009688;">
                    References
                </h3>
                <ul class="premium-topic-list-columns" style="display: flex; flex-direction: column; gap: 15px; grid-template-columns: 1fr;">
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Qasim, S., Khan, A. U., & Raza, A. (2024). Zoonotic diseases and antimicrobial resistance: a dual threat at the human–animal interface.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Bett, B., Fèvre, E. M., Ha Thi Thanh Nguyen, Sinh Dang-Xuan, Obuta, A., Mateo-Sagasta, J., & Patel, E. (2024). Enhancing public health: Five key takeaways on zoonotic disease and antimicrobial resistance surveillance. One Health Knowledge Brief. Nairobi, Kenya: ILRI.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Constructing a One Health governance architecture: a systematic review and analysis of governance mechanisms for One Health. (2024). PMC11631453.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Analyzing One Health governance and implementation challenges. (2025). BMJ Open, 16(7), e115471.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Zielinski, C., et al. (2023). Time to treat the climate and nature crisis as one indivisible global health emergency. BMC Global and Public Health, 1:29.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">One Health: Change our Paradigm, Change our Lives. (2023). Universidade de Évora.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Editorial: Advances in nanotechnology for the removal and detection of emerging contaminants from water. (2025). Frontiers in Chemistry.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Call for papers: Next-generation green remediation technologies for emerging contaminants. (2025). Bentham Science.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Traditional medicine and intellectual property rights among Indian Indigenous communities: a review. (2023). University of Lapland research repository.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Indian Journal of Traditional Knowledge. National Institute of Science Communication and Policy Research (CSIR).</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">ESG in pharma: How CDMOs drive sustainable supply chains. (2025). Neuland Labs.</span></li>
                    <li><i class="fa-solid fa-bookmark" style="color: #84cc16;"></i> <span style="font-size: 1.05rem;">Sustainability in Pharma Industry [white paper]. (2025). Indian Pharmaceutical Alliance.</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleTrackDesc(trackId) {
        var content = document.getElementById('track' + trackId + '-desc-content');
        var fade = document.getElementById('track' + trackId + '-desc-fade');
        var btn = document.getElementById('track' + trackId + '-readmore-btn');
        var btnText = btn.querySelector('span');
        var btnIcon = btn.querySelector('i');
        
        if (content.style.maxHeight === '80px') {
            content.style.maxHeight = '2000px';
            fade.style.opacity = '0';
            fade.style.transition = 'opacity 0.2s';
            btnText.innerText = 'Read Less';
            btnIcon.classList.remove('fa-chevron-down');
            btnIcon.classList.add('fa-chevron-up');
        } else {
            content.style.maxHeight = '80px';
            fade.style.opacity = '1';
            btnText.innerText = 'Read More';
            btnIcon.classList.remove('fa-chevron-up');
            btnIcon.classList.add('fa-chevron-down');
        }
    }
</script>
