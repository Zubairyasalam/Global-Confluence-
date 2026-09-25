<?php

$file = 'c:\scrach\biomed-app\resources\views\distinguished-speakers.blade.php';
$lines = file($file);

// Keep up to line 207 (index 206)
$output = array_slice($lines, 0, 207);

$newHtml = <<<HTML
    <!-- Speaker Grid matching new design -->
    <div class="distinguished-speaker-grid-new" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; justify-content: center; align-items: start; margin-top: 50px;">
        
        <!-- Speaker 1 -->
        <div style="text-align: center;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset('images/speakers/mohan.png') }}" alt="Prof. Mohan K. Balasubramanian" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">Prof. Mohan K. Balasubramanian</h3>
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">Wellcome Trust Senior Investigator & Pro-Dean (Biomedical Research), Warwick Medical School; Division of Biomedical Cell Biology, University of Warwick, United Kingdom</p>
        </div>

        <!-- Speaker 2 -->
        <div style="text-align: center;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset('images/speakers/priya_abraham.png') }}" alt="Dr. Priya Abraham" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">Dr. Priya Abraham</h3>
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">Former Director, ICMR-National Institute of Virology (NIV), Pune; Senior Professor, Department of Clinical Virology, Christian Medical College (CMC), Vellore</p>
        </div>

        <!-- Speaker 3 -->
        <div style="text-align: center;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset('images/speakers/liew_kai_bin.png') }}" alt="Prof. Ts. Dr. Liew Kai Bin" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">Prof. Ts. Dr. Liew Kai Bin</h3>
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">Professor & Head, Department of Pharmaceutical Technology & Industry, Faculty of Pharmacy, University of Cyberjaya (UoC), Malaysia</p>
        </div>

        <!-- Speaker 4 -->
        <div style="text-align: center;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset('images/speakers/ravikanth.png') }}" alt="G. Ravikanth" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">G. Ravikanth</h3>
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">Sr. Fellow and Convenor, Academy for Conservation Science and Sustainability Studies, Bengaluru, India</p>
        </div>

        <!-- Speaker 5 -->
        <div style="text-align: center;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset('images/speakers/murthy.png') }}" alt="Dr. G. S. Murthy" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">Dr. G. S. Murthy</h3>
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">Professor<br>IIT Indore, Madhya Pradesh, India</p>
        </div>

        <!-- Speaker 6 -->
        <div style="text-align: center;">
            <div style="width: 250px; height: 250px; margin: 0 auto 20px auto; border-radius: 50%; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
                <img src="{{ asset('images/speakers/suresh.png') }}" alt="Dr. Suresh Kannan S" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
            </div>
            <h3 style="font-size: 1.4rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0;">Dr. Suresh Kannan S</h3>
            <p style="font-size: 1rem; color: #334155; margin: 0; line-height: 1.5;">Prof & Head, Department of Veterinary Public Health and Epidemiology, TANUVAS</p>
        </div>

    </div>
</section>

@include('sections.footer')

@endsection
HTML;

$output[] = $newHtml . "\n";

file_put_contents($file, implode("", $output));

echo "Successfully updated standalone distinguished speakers page.\n";
