<?php 
    use PHPMailer\PHPMailer\PHPMailer;

    require_once "PHPMailer.php";
    require_once "SMTP.php";
    require_once "Exception.php";

    $mail = new PHPMailer;

    $email = $emails;
    $names = "RESERVATION DETAILS";

    //SMTP Settings
    $mail->SMTPDebug = 0; 

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "pantigryanjay1@gmail.com";
    $mail->Password = "qpiv xinl boaf luou";
    $mail->Port = 587; //465 for ssl and 587 for tls
    $mail->SMTPSecure = "tls";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, $names);
    $mail->addAddress($emails);
    $mail->Subject = "Home Dreamers Realty and Development Corporation";
    $mail->Body = $messages;


    if ($mail->send())
        echo "Mail Sent";

    else
        // echo('Error sending the email');

?>
