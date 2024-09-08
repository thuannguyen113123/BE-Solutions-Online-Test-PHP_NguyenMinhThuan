<?php

    //Send mail
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/PHPMailer-master/src/Exception.php';
    require '../vendor/PHPMailer-master/src/PHPMailer.php';
    require '../vendor/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = htmlspecialchars($_GET['name']);
    $phone = htmlspecialchars($_GET['phone']);
    $email = htmlspecialchars($_GET['email']);
    $company = htmlspecialchars($_GET['company']);

    // Gửi email cảm ơn

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '20004209@st.vlute.edu.vn';                     //SMTP username
        $mail->Password   = 'wfurkfixwilevkay';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('20004209@st.vlute.edu.vn', 'testing');
        $mail->addAddress($email, $name);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Thank you for contacting us';
        $mail->Body    = "Hi $name,\n\nThank you for reaching out. We will contact you shortly.";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


} else {
    die("Invalid request.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you</title>
    <link rel="stylesheet" href="thankYou.css">
</head>

<body>
    <div class="container grid">
        <div class="header">
            <h1 class="header-title">Thank you for contacting us</h1>
        </div>
        <div class="body">
            <p class="body-content">We will be back in touch with you within one business day using the information you
                just provided below:</p>
            <div class="body-info">
                <div class="body-info-details">
                    <span class="text-bold">Name:</span>
                    <span><?php echo $name; ?></span>
                </div>
                <div class="body-info-details">
                    <span class="text-bold">Phone:</span>
                    <span><?php echo $phone; ?></span>
                </div>
                <div class="body-info-details">
                    <span class="text-bold">Email Address:</span>
                    <span><?php echo $email; ?></span>
                </div>
                <div class="body-info-details">
                    <span class="text-bold">Company:</span>
                    <span><?php echo $company; ?></span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>