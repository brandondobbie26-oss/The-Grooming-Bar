<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Collect Form Data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    // 2. Email Configuration
    $to = "hello@thegroomingbar.com"; // Replace with actual shop email
    $subject = "New Appointment Request: $name";
    
    $email_content = "
    <h2>New Appointment Request</h2>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Phone:</strong> $phone</p>
    <p><strong>Service:</strong> $service</p>
    <p><strong>Requested Time/Notes:</strong><br>$message</p>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: website@thegroomingbar.com" . "\r\n";

    // 3. Send Email
    // Note: This requires a configured mail server (e.g., SMTP or local mail) on the server.
    mail($to, $subject, $email_content, $headers);

    // 4. WhatsApp Redirection
    // Format: https://wa.me/<number>?text=<encoded_message>
    // Shop Number: 071 489 3052 -> 27714893052
    $shop_number = "27714893052"; 
    
    $wa_message = "Hi TGB, I'd like to confirm my booking:%0a";
    $wa_message .= "Name: $name%0a";
    $wa_message .= "Service: $service%0a";
    $wa_message .= "Phone: $phone%0a";
    $wa_message .= "Request: $message";

    $whatsapp_url = "https://wa.me/$shop_number?text=$wa_message";

    // Redirect user to WhatsApp to finish the booking
    header("Location: $whatsapp_url");
    exit();
}
?>
