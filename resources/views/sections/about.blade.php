<!-- About Section -->
<section class="about-section" style="padding: 60px 0; background-color: #f8fbfa;">
    <div class="container" style="max-width: 95%; margin: 0 auto; padding: 0 20px;">
        
        <!-- Preamble & Countdown Grid -->
        <div class="about-container" style="display: flex; gap: 40px; flex-wrap: wrap; align-items: flex-start; margin-bottom: 60px;">
            
            <!-- Left Side: Preamble -->
            <div class="about-content" style="flex: 1; min-width: 320px; display: flex; flex-direction: column; justify-content: flex-start; padding-top: 10px;">
                <h2 class="section-title" style="font-size: clamp(2rem, 4vw, 2.6rem); font-weight: 800; color: #112340; margin: 0 0 20px 0; line-height: 1.2;">
                    About the <span style="color: #009688;">Conference</span>
                </h2>
                <div class="about-text" style="text-align: justify; font-size: 0.95rem; color: #475569; line-height: 1.65; display: flex; flex-direction: column; gap: 15px;">
                    {!! nl2br(e($settings['about_conference'] ?? 'The Global One Health Confluence 2026 is envisioned as a flagship international interdisciplinary forum...')) !!}
                </div>
            </div>
            
            <!-- Right Side: Countdown and Core Aims -->
            <div class="about-countdown" style="flex: 1; min-width: 320px; background: #ffffff; padding: 40px; border-radius: 20px; box-shadow: 0 15px 40px rgba(17, 35, 64, 0.05); border: 1px solid #e2e8f0; display: flex; flex-direction: column; justify-content: flex-start; gap: 40px;">
                <div>
                    <div class="countdown-header" style="font-size: 1.4rem; font-weight: 700; text-align: center; margin-bottom: 25px; color: #112340;">
                        Conference <span style="color: #009688;">Starts In</span>
                    </div>
                    <div class="countdown-timer" style="display: flex; justify-content: space-between; gap: 15px; margin-bottom: 35px;">
                        <div class="cd-box" style="background: #f8fbfa; padding: 15px; border-radius: 12px; text-align: center; border: 1px solid #e2e8f0; flex: 1;"><div id="cd-days" class="cd-val" style="font-size: 2.2rem; font-weight: 800; color: #112340;">{{ $settings['conf_stat1_number'] ?? '89' }}</div><div class="cd-lbl" style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; margin-top: 5px;">{{ $settings['conf_stat1_label'] ?? 'DAYS' }}</div></div>
                        <div class="cd-box" style="background: #f8fbfa; padding: 15px; border-radius: 12px; text-align: center; border: 1px solid #e2e8f0; flex: 1;"><div id="cd-hours" class="cd-val" style="font-size: 2.2rem; font-weight: 800; color: #112340;">{{ $settings['conf_stat2_number'] ?? '11' }}</div><div class="cd-lbl" style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; margin-top: 5px;">{{ $settings['conf_stat2_label'] ?? 'HOURS' }}</div></div>
                        <div class="cd-box" style="background: #f8fbfa; padding: 15px; border-radius: 12px; text-align: center; border: 1px solid #e2e8f0; flex: 1;"><div id="cd-mins" class="cd-val" style="font-size: 2.2rem; font-weight: 800; color: #112340;">{{ $settings['conf_stat3_number'] ?? '52' }}</div><div class="cd-lbl" style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; margin-top: 5px;">{{ $settings['conf_stat3_label'] ?? 'MINS' }}</div></div>
                        <div class="cd-box" style="background: #f8fbfa; padding: 15px; border-radius: 12px; text-align: center; border: 1px solid #e2e8f0; flex: 1;"><div id="cd-secs" class="cd-val" style="font-size: 2.2rem; font-weight: 800; color: #112340;">{{ $settings['conf_stat4_number'] ?? '31' }}</div><div class="cd-lbl" style="font-size: 0.75rem; font-weight: 600; color: #64748b; text-transform: uppercase; margin-top: 5px;">{{ $settings['conf_stat4_label'] ?? 'SECS' }}</div></div>
                    </div>
                </div>
                
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="mission-box" style="background: #f8fbfa; padding: 22px; border-radius: 12px; border-left: 4px solid #009688; border-top: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
                        <h4 style="font-size: 1.15rem; font-weight: 700; color: #112340; margin-bottom: 8px;">Our Mission</h4>
                        <p style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">{!! nl2br(e($settings['about_mission'] ?? 'To connect researchers, thought leaders, and institutions through impactful events that inspire knowledge-sharing and real-world solutions.')) !!}</p>
                    </div>
                    <div class="mission-box" style="background: #f8fbfa; padding: 22px; border-radius: 12px; border-left: 4px solid #84cc16; border-top: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
                        <h4 style="font-size: 1.15rem; font-weight: 700; color: #112340; margin-bottom: 8px;">Our Vision</h4>
                        <p style="margin: 0; font-size: 0.95rem; color: #475569; line-height: 1.6;">{!! nl2br(e($settings['about_vision'] ?? 'To build a global platform that showcases research, fosters collaboration, and drives innovation across disciplines.')) !!}</p>
                    </div>

                </div>
            </div>
            

    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set the date we're counting down to (Dec 21, 2026 09:00:00)
            var countDownDate = new Date("Dec 21, 2026 09:00:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("cd-days").innerHTML = "0";
                    document.getElementById("cd-hours").innerHTML = "0";
                    document.getElementById("cd-mins").innerHTML = "0";
                    document.getElementById("cd-secs").innerHTML = "0";
                    return;
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("cd-days").innerHTML = days;
                document.getElementById("cd-hours").innerHTML = hours;
                document.getElementById("cd-mins").innerHTML = minutes;
                document.getElementById("cd-secs").innerHTML = seconds;
            }, 1000);
        });
    </script>
</section>


