
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Page</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .header {
            text-align: center;
            padding: 30px;
            background-color: cadetblue;
            color: white;
        }
        .faq-section {
            margin-top: 30px;
        }
        .faq-item {
            margin-bottom: 20px;
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .faq-item h5 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .faq-item p {
            font-size: 16px;
            color: #555;
        }
        .foot{ height:80px;background-color:gray; color:lightcyan;text-align:center;padding:2px 4px;}
    </style>
</head>
<body>

    
    <div class="header">
        <h1>Customer Support</h1>
        <p>We're here to help. Find answers to your questions or contact our support team.</p>
    </div>

   
    <div class="container">
        <div class="faq-section">
            <h3>Frequently Asked Questions (FAQs)</h3>
            
            <div class="faq-item">
                <h5>1. How do I reset my password?</h5>
                <p>If you've forgotten your password, go to the login page and click on "Forgot Password?". You'll be sent a link to reset your password.</p>
            </div>

            <div class="faq-item">
                <h5>2. How do I contact customer support?</h5>
                <p>You can reach our customer support by emailing <strong>support@blaquebudget.com</strong> or by calling <strong>+234 8118456747</strong>.</p>
            </div>

            <div class="faq-item">
                <h5>3. Where can I find my account settings?</h5>
                <p>Your account settings are located under your profile icon in the top right corner of the dashboard. Click on it to access your personal details, password settings, and more.</p>
            </div>

            <div class="faq-item">
                <h5>4. How do I report a bug or issue?</h5>
                <p>If you encounter a bug or issue, please fill email us at <strong>blaquebuget@gmail.com</strong>.</p>
            </div>
        </div>

      
        <div class="contact-section">
            <h3>Contact Us</h3>
            <form action="process/process_complaint.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="btncomp">Submit</button>
            </form>
        </div>
    </div>

    <?php  include "partials/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
