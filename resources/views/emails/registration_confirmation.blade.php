<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f3f4f6; margin: 0; padding: 40px 20px; color: #334155; line-height: 1.7; }
        .email-wrapper { max-width: 650px; margin: 0 auto; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.07); }
        .header { background: linear-gradient(135deg, #0a192f 0%, #112240 100%); padding: 40px 30px 30px; text-align: center; border-bottom: 4px solid #00A896; }
        .header img { max-width: 200px; height: auto; margin-bottom: 15px; filter: brightness(0) invert(1); }
        .header h1 { color: #fff; margin: 0; font-size: 22px; font-weight: 600; }
        .success-badge { background: #00A896; display: inline-block; color: #fff; font-size: 12px; font-weight: 700; padding: 5px 16px; border-radius: 20px; margin-top: 12px; text-transform: uppercase; letter-spacing: 1px; }
        .content { padding: 40px 35px; }
        .greeting { font-size: 20px; font-weight: 700; color: #0a192f; margin-bottom: 12px; }
        .intro-text { font-size: 15px; color: #475569; margin-bottom: 30px; }
        .summary-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 25px; margin-bottom: 28px; }
        .summary-title { font-size: 12px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 16px; }
        .summary-row { display: table; width: 100%; margin-bottom: 12px; }
        .summary-row:last-child { margin-bottom: 0; }
        .summary-label { display: table-cell; width: 38%; font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.4px; vertical-align: top; }
        .summary-value { display: table-cell; width: 62%; font-size: 15px; color: #0f172a; font-weight: 500; vertical-align: top; }
        .total-box { background: linear-gradient(135deg, #0a192f, #112240); border-radius: 12px; padding: 20px 25px; text-align: center; margin-bottom: 28px; }
        .total-label { color: rgba(255,255,255,0.65); font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px; }
        .total-amount { color: #00A896; font-size: 32px; font-weight: 800; }
        .step { display: flex; align-items: flex-start; margin-bottom: 14px; }
        .step-num { background: #00A896; color: #fff; font-size: 12px; font-weight: 700; width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; margin-right: 12px; margin-top: 1px; }
        .step-text { font-size: 14px; color: #475569; line-height: 1.6; }
        .divider { border: none; border-top: 1px solid #e2e8f0; margin: 28px 0; }
        .cta-wrap { text-align: center; margin-bottom: 25px; }
        .cta-btn { background: linear-gradient(135deg, #00A896, #007a6f); color: #fff !important; text-decoration: none; padding: 14px 36px; border-radius: 10px; font-weight: 700; font-size: 15px; display: inline-block; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 25px 30px; text-align: center; color: #94a3b8; font-size: 13px; }
        .footer p { margin: 0 0 6px; }
        .footer a { color: #00A896; text-decoration: none; }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header -->
        <div class="header">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="BioMed Summit 2027">
            @else
                <div style="color:#00A896;font-size:22px;font-weight:800;margin-bottom:10px;">BioMed Summit 2027</div>
            @endif
            <h1>Registration Confirmed!</h1>
            <span class="success-badge">✓ Registration Successful</span>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">Dear {{ $registration->name }},</div>
            <div class="intro-text">
                We are thrilled to confirm your registration for <strong>BioMed Summit 2027</strong>! Your spot is secured and we look forward to welcoming you to one of the most exciting biomedical conferences of the year.
            </div>

            <!-- Summary -->
            <div class="summary-card">
                <div class="summary-title">📋 Your Registration Summary</div>
                <div class="summary-row">
                    <span class="summary-label">Name</span>
                    <span class="summary-value">{{ $registration->name }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Email</span>
                    <span class="summary-value">{{ $registration->email }}</span>
                </div>
                @if($registration->organization)
                <div class="summary-row">
                    <span class="summary-label">Organization</span>
                    <span class="summary-value">{{ $registration->organization }}</span>
                </div>
                @endif
                <div class="summary-row">
                    <span class="summary-label">Category</span>
                    <span class="summary-value" style="color:#0369a1;font-weight:700;">{{ $registration->category_name }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Payment</span>
                    <span class="summary-value">{{ $registration->payment_method }}</span>
                </div>
                @if($registration->addons && count($registration->addons) > 0)
                <div class="summary-row">
                    <span class="summary-label">Add-Ons</span>
                    <span class="summary-value">
                        @foreach($registration->addons as $addon => $price)
                            <div>• {{ $addon }} (+₹{{ number_format($price, 0) }})</div>
                        @endforeach
                    </span>
                </div>
                @endif
            </div>

            <!-- Total Amount -->
            <div class="total-box">
                <div class="total-label">Total Amount Paid</div>
                <div class="total-amount">₹ {{ number_format($registration->total_amount, 0) }} INR</div>
            </div>

            <!-- What next -->
            <div style="margin-bottom:28px;">
                <div style="font-size:16px;font-weight:700;color:#0a192f;margin-bottom:16px;">🔔 What to Expect Next</div>
                <div class="step">
                    <div class="step-num">1</div>
                    <div class="step-text"><strong>Badge & Kit:</strong> Your conference badge and welcome kit will be available at the registration desk on the day of the event.</div>
                </div>
                <div class="step">
                    <div class="step-num">2</div>
                    <div class="step-text"><strong>Schedule:</strong> The full conference program and schedule will be shared with you via email closer to the event date.</div>
                </div>
                <div class="step">
                    <div class="step-num">3</div>
                    <div class="step-text"><strong>Venue:</strong> The summit will be held at Madras Christian College, Tambaram, Chennai. More details will be sent soon.</div>
                </div>
            </div>

            <hr class="divider">

            <!-- CTA -->
            <div class="cta-wrap">
                <a href="https://mcc.edu.in/" class="cta-btn">Visit Conference Website</a>
            </div>

            <p style="font-size:14px;color:#64748b;text-align:center;">
                <p>Need help? Contact us at <a href="mailto:gohc2026@gmail.com" style="color: #009688; text-decoration: none;">gohc2026@gmail.com</a></p>
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong style="color:#0a192f;">BioMed Summit 2027</strong></p>
            <p>Madras Christian College, Tambaram, Chennai</p>
            <p style="margin-top:10px;">&copy; {{ date('Y') }} BioMed Summit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
