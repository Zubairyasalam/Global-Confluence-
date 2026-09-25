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
            line-height: 1.6;
        }
        .email-wrapper {
            max-width: 650px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .header {
            background: linear-gradient(135deg, #0a192f 0%, #112240 100%);
            padding: 40px 30px;
            text-align: center;
            border-bottom: 4px solid #00A896;
        }
        .header img {
            max-width: 220px;
            height: auto;
            margin-bottom: 15px;
            /* Filter applied just in case the logo is dark text to make it pop on dark navy background */
            filter: brightness(0) invert(1);
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        .content {
            padding: 40px 30px;
            background-color: #ffffff;
        }
        .greeting {
            font-size: 18px;
            color: #1e293b;
            margin-bottom: 25px;
            font-weight: 500;
        }
        .details-card {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
        }
        .detail-row {
            margin-bottom: 15px;
            display: table;
            width: 100%;
        }
        .detail-row:last-child {
            margin-bottom: 0;
        }
        .detail-label {
            display: table-cell;
            width: 35%;
            font-weight: 600;
            color: #64748b;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            vertical-align: top;
        }
        .detail-value {
            display: table-cell;
            width: 65%;
            color: #0f172a;
            font-size: 16px;
            font-weight: 500;
            vertical-align: top;
        }
        .attachment-alert {
            background-color: #f0fdfa;
            border-left: 4px solid #00A896;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            display: flex;
            align-items: center;
        }
        .attachment-text {
            color: #047857;
            font-weight: 600;
            font-size: 15px;
        }
        .footer {
            background-color: #f8fafc;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            color: #94a3b8;
            font-size: 13px;
        }
        .footer p {
            margin: 0 0 10px 0;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="header">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="BioMed Summit 2027">
            @else
                <h2 style="color: #00A896; margin: 0 0 10px 0;">BioMed Summit</h2>
            @endif
            <h1>New Abstract Submission</h1>
        </div>
        
        <div class="content">
            <div class="greeting">
                Hello Committee Member,
                <br><br>
                <span style="color: #64748b; font-size: 15px; font-weight: normal;">A new abstract has been successfully submitted through the website portal. Below are the details of the submitter:</span>
            </div>
            
            <div class="details-card">
                @foreach($data as $label => $value)
                    @if(!empty($value))
                        <div class="detail-row">
                            <span class="detail-label">{{ $label }}</span>
                            <span class="detail-value">
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

            <div class="attachment-alert">
                <span class="attachment-text">
                    ✅ The submitter's abstract document is securely attached to this email.
                </span>
            </div>
        </div>

        <div class="footer">
            <p>This is an automated notification securely generated by the BioMed Summit 2027 Portal.</p>
            <p>&copy; {{ date('Y') }} BioMed Summit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
