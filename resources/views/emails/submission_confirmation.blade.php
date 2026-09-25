<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 40px 20px;
            color: #334155;
            line-height: 1.7;
        }
        .email-wrapper {
            max-width: 650px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.07);
        }
        /* Header */
        .header {
            background: linear-gradient(135deg, #0a192f 0%, #112240 100%);
            padding: 40px 30px 30px;
            text-align: center;
            border-bottom: 4px solid #00A896;
        }
        .header img {
            max-width: 200px;
            height: auto;
            margin-bottom: 15px;
            filter: brightness(0) invert(1);
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        /* Success badge */
        .success-badge {
            background: #00A896;
            display: inline-block;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            padding: 5px 16px;
            border-radius: 20px;
            margin-top: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        /* Content */
        .content {
            padding: 40px 35px;
        }
        .greeting {
            font-size: 20px;
            font-weight: 700;
            color: #0a192f;
            margin-bottom: 15px;
        }
        .intro-text {
            font-size: 15px;
            color: #475569;
            margin-bottom: 30px;
        }
        /* Summary card */
        .summary-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .summary-title {
            font-size: 13px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 16px;
        }
        .summary-row {
            display: table;
            width: 100%;
            margin-bottom: 12px;
        }
        .summary-label {
            display: table-cell;
            width: 38%;
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            vertical-align: top;
            padding-right: 10px;
        }
        .summary-value {
            display: table-cell;
            width: 62%;
            font-size: 15px;
            color: #0f172a;
            font-weight: 500;
            vertical-align: top;
        }
        /* Steps */
        .steps-section {
            margin-bottom: 30px;
        }
        .steps-title {
            font-size: 16px;
            font-weight: 700;
            color: #0a192f;
            margin-bottom: 16px;
        }
        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 14px;
        }
        .step-num {
            background: #00A896;
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 12px;
            margin-top: 1px;
        }
        .step-text {
            font-size: 14px;
            color: #475569;
            line-height: 1.6;
        }
        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid #e2e8f0;
            margin: 30px 0;
        }
        /* CTA Button */
        .cta-wrap {
            text-align: center;
            margin-bottom: 30px;
        }
        .cta-btn {
            background: linear-gradient(135deg, #00A896, #007a6f);
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 36px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 15px;
            display: inline-block;
        }
        /* Footer */
        .footer {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 25px 30px;
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
        }
        .footer p { margin: 0 0 6px 0; }
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
                <div style="color: #00A896; font-size: 22px; font-weight: 800; margin-bottom: 10px;">BioMed Summit 2027</div>
            @endif
            <h1>Abstract Submission Received</h1>
            <span class="success-badge">✓ Successfully Submitted</span>
        </div>

        <!-- Content -->
        <div class="content">

            @php
                $nameKey = '';
                $titleKey = '';
                foreach ($data as $key => $val) {
                    if (strtolower($key) === 'name') $nameKey = $key;
                    if (strtolower($key) === 'title') $titleKey = $key;
                }
                $submitterName = ($titleKey ? $data[$titleKey] . ' ' : '') . ($nameKey ? $data[$nameKey] : 'Submitter');
            @endphp
            <div class="greeting">Dear {{ $submitterName }},</div>

            <div class="intro-text">
                Thank you for submitting your abstract to <strong>BioMed Summit 2027</strong>. We have successfully received your submission and it is currently under review by our scientific committee.
                <br><br>
                We appreciate the time and effort you have invested in preparing your work, and we look forward to reviewing your contribution.
            </div>

            <!-- Submission Summary -->
            <div class="summary-card">
                <div class="summary-title">📋 Your Submission Summary</div>

                @foreach($data as $label => $value)
                    @if(!empty($value))
                        <div class="summary-row">
                            <span class="summary-label">{{ $label }}</span>
                            <span class="summary-value">
                                @if(strtolower($label) === 'email' || strtolower($label) === 'email address')
                                    <a href="mailto:{{ $value }}" style="color: #00A896; text-decoration: none;">{{ $value }}</a>
                                @else
                                    {{ $value }}
                                @endif
                            </span>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- What happens next -->
            <div class="steps-section">
                <div class="steps-title">🔔 What Happens Next?</div>

                <div class="step">
                    <div class="step-num">1</div>
                    <div class="step-text"><strong>Review Process:</strong> Our scientific committee will carefully review your abstract over the coming weeks.</div>
                </div>
                <div class="step">
                    <div class="step-num">2</div>
                    <div class="step-text"><strong>Notification:</strong> You will receive an email notification regarding the acceptance or revision of your abstract.</div>
                </div>
                <div class="step">
                    <div class="step-num">3</div>
                    <div class="step-text"><strong>Confirmation:</strong> If accepted, you will receive further instructions regarding presentation preparation and registration.</div>
                </div>
            </div>

            <hr class="divider">

            <!-- CTA -->
            <div class="cta-wrap">
                <a href="https://mcc.edu.in/" class="cta-btn">Visit Conference Website</a>
            </div>

            <p style="font-size: 14px; color: #64748b; text-align: center;">
                Need help? Contact us at <a href="mailto:gohc2026@gmail.com" style="color: #009688; text-decoration: none;">gohc2026@gmail.com</a>
            </p>

        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong style="color: #0a192f;">BioMed Summit 2027</strong></p>
            <p>Madras Christian College, Tambaram, Chennai</p>
            <p style="margin-top: 10px;">&copy; {{ date('Y') }} BioMed Summit. All rights reserved.</p>
        </div>

    </div>
</body>
</html>
