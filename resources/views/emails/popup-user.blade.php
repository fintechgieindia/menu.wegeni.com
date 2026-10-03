<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thank You from Geni Menu</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4efe9; margin: 0; padding: 40px 0; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { background: #876039; padding: 30px; text-align: center; color: #ffffff; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 600; }
        .content { padding: 30px; line-height: 1.6; }
        .content p { margin: 0 0 15px; font-size: 16px; }
        .btn-box { text-align: center; margin: 30px 0; }
        .btn { display: inline-block; background: #876039; color: #ffffff; text-decoration: none; padding: 12px 25px; border-radius: 4px; font-weight: bold; }
        .footer { background: #fdfaf6; padding: 20px; text-align: center; font-size: 13px; color: #888; border-top: 1px solid #eaeaea; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Geni Menu</h1>
        </div>
        <div class="content">
            <p>Hi {{ $data['full_name'] ?? 'there' }},</p>
            <p>Thank you for reaching out to us! We have received your request regarding <strong>{{ $data['restaurant_name'] ?? 'your restaurant' }}</strong>.</p>
            <p>Our team is reviewing your details and will get back to you shortly to schedule a demo or discuss your requirements.</p>
            
            <div class="btn-box">
                <a href="{{ url('/') }}" class="btn">Visit Our Website</a>
            </div>
            
            <p>Best regards,<br>The Geni Menu Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Geni Menu. All rights reserved.
        </div>
    </div>
</body>
</html>
