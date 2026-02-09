<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;">
        <div style="background-color: #4F46E5; padding: 20px; text-align: center;">
            <h1 style="color: white; margin: 0;">New Contact Form Submission</h1>
        </div>
        
        <div style="background-color: white; padding: 30px; margin-top: 20px; border-radius: 8px;">
            <h2 style="color: #4F46E5; margin-top: 0;">Contact Details</h2>
            
            <p><strong>Name:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
            
            <hr style="border: none; border-top: 1px solid #e5e5e5; margin: 20px 0;">
            
            <h3 style="color: #4F46E5;">Message:</h3>
            <p style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #4F46E5;">
                {{ $data['message'] }}
            </p>
        </div>
        
        <div style="text-align: center; padding: 20px; color: #666; font-size: 12px;">
            <p>This email was sent from your photography studio website contact form.</p>
        </div>
    </div>
</body>
</html>
