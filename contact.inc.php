<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// Load Composer's autoloader
require 'PHPMailer/PHPMailerAutoload.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.ionos.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@ayurvedaarana.com';                     // SMTP username
        $mail->Password   = 'Arana33!';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('info@ayurvedaarana.com', 'Kontaktform');
       // $mail->addReplyTo('sriayurvedaarana@gmail.com', 'Information');
        $mail->addAddress('info@ayurvedaarana.com');
        
        $emailtext = 'Neue Anfrage!
        <br>Name: ' ;
        $emailtext .= $name;
        $emailtext .= '<br>Email: ';
        $emailtext .= $email;
        $emailtext .= '<br> Telefon: ';
        $emailtext .= $phone;
        $emailtext .= '<br><hr>Nachricht: ';
        $emailtext .= $message;
        $emailtext .= '<hr>';
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Neue Anfrage via ContactForm';
        $mail->Body    = $emailtext;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $is_send = $mail->send();
            if ($is_send){
                                $mail->isSMTP();                                            // Send using SMTP
                                $mail->Host       = 'smtp.ionos.com';                    // Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                $mail->Username   = 'info@ayurvedaarana.com';                     // SMTP username
                                $mail->Password   = 'Arana33!';                               // SMTP password
                                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                $mail->Port       = 587;                                    // TCP port to connect to
                                $mail->CharSet = 'UTF-8';
                                //Recipients
                                $mail->setFrom('info@ayurvedaarana.com', 'Franziska & Villa Arana‘s Team');
                               // $mail->addReplyTo('sriayurvedaarana@gmail.com', 'Information');
                                $mail->addAddress($email);
                
              
                
                
                                $emailtext = 'Hello ' ;
                                $emailtext .= $name;
                                $emailtext .= ',<br><br>Thank you so much for your message!<br> We will get back to you as soon as possible. ';
                                $emailtext .= '<br><br> Have a great day ';
                                $emailtext .= '<br>Franziska and the team of <a href="www.ayurvedaarana.com">Villa Arana</a> ';
                
                
                                $emailtext .= '<br><hr>Hallo ' ;
                                $emailtext .= $name;
                                $emailtext .= ',<br><br>vielen Dank für Ihre Nachricht. <br>Wir melden uns so schnell wie möglich zurück.  ';
                                $emailtext .= '<br><br>Beste Grüße und einen schönen Tag wünscht ';
                                $emailtext .= '<br>Franziska und das Team der <a href="www.villasriayurveda.com">Villa Arana</a> ';
                               
                                // Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = 'Your contact with Villa Arana';
                                $mail->Body    = $emailtext;
                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                $is_sending = $mail->send();
                                    if ($is_sending){
                                        echo '<meta http-equiv="refresh" content="0; URL=thank.php">';
                                                    }
            }
} catch (Exception $e) {
    header("Location: index.php?emailError");
                        exit();
}