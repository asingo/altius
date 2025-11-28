<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$subject}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
        /* Mobile Responsive */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                border-radius: 0 !important;
            }

            .content {
                padding: 20px !important;
            }

            h2 {
                font-size: 20px !important;
            }

            .otp-code {
                font-size: 26px !important;
                padding: 12px 20px !important;
                letter-spacing: 4px !important;
            }

            .footer {
                text-align: center !important;
            }

            .footer-links a {
                display: block !important;
                margin: 5px 0 !important;
            }

            .social-icons img {
                width: 22px !important;
            }
        }
        .footer-links a {
            color: #000;
        }
    </style>
</head>

<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:20px 10px;">
    <tr>
        <td align="center">

            <!-- MAIN CONTAINER -->
            <table class="container" width="600" cellpadding="0" cellspacing="0"
                   style="max-width:600px;background:#ffffff;border-radius:12px;box-shadow:0 10px 25px rgba(0,0,0,0.08);">

                <!-- LOGO -->
                <tr>
                    <td align="center" style="padding:25px 20px 15px;">
                        <img src="{{ $logo }}"
                             alt="{{config('app.name')}}"
                             style="max-width:160px;height:auto;">
                    </td>
                </tr>

                <!-- CONTENT -->
                <tr>
                    <td class="content" style="padding:20px 20px;">

                        <h2 style="color:#24457b;font-size:22px;margin-bottom:15px;margin-top:0px;">
                            OTP Email Notification
                        </h2>

                        <p style="color:#555;font-size:15px;line-height:1.6;">
                            Thank you for choosing <strong>{{config('app.name')}}</strong>.
                            Here is your OTP verification code. It will expire in <strong>5 minutes</strong>.
                        </p>

                        <!-- OTP BOX -->
                        <div style="text-align:center;margin:30px 0;">
                            <span class="otp-code" style="
                                display:inline-block;
                                font-size:32px;
                                font-weight:bold;
                                letter-spacing:6px;
                                color:#24457b;
                                padding:15px 30px;
                                border-radius:8px;
                                background:#f1f5fb;
                                border:1px dashed #24457b;
                            ">
                                {{ $otp }}
                            </span>
                        </div>

                        <p style="color:#555;font-size:15px;">
                            Sincerely,<br>
                            <strong>Altius Hospitals</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="background:#225ca8;padding:20px 20px;">
                       <h3 style="margin-top: 0px; margin-bottom: 10px; color: #fff;">Follow Altius Hospitals</h3>
                        <div class="social-icons">
                            @foreach($socmeds as $socmed)
                                <a href="{{ $socmed['link'] }}" target="_blank"
                                   style="text-decoration:none;display:inline-block;">

                                    <div style="
        border:1px solid #ffffff;

        padding:10px;
        border-radius:50%;
        text-align:center;
        background-color:transparent;
        margin-right: 5px;
    ">
                                        <img src="{{ \Awcodes\Curator\Models\Media::find($socmed['icon'])?->url }}"
                                             alt="Social Media"
                                             style="
                width:20px;
                height:20px;
                display:block;
                margin:0 auto;
             ">
                                    </div>

                                </a>
                            @endforeach
                        </div>
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td class="footer" style="background:#d5e3f6;padding:20px;border-radius:0 0 12px 12px;">

                        <p style="font-size:13px;margin:0px; float:left">
                            © {{ date('Y') }} {{config('app.name')}}
                        </p>

                        <!-- LINKS -->
                        <div class="footer-links" style="font-size:13px; float: right;">
                            <a href="{{env('APP_URL')}}/privacy-policy" style="text-decoration:none;margin-right:10px;">Privacy
                                Policy</a>
                            <a href="{{env('APP_URL')}}/terms-conditions" style="text-decoration:none;">Terms &amp;
                                Conditions</a>
                        </div>

                        <!-- SOCIAL ICONS -->
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
