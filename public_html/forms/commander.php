<?php
require_once '../core/commandeM.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once '../PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$commandeM = new CommandeM();
$mail = new PHPMailer();
$config = parse_ini_file('../../config-mailer.ini', true);
if (isset($_POST['nom'])) {
    $commande = new Commande($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['telephone'], $_POST['adresse'], $_POST['quantite'], $_POST['poids']);
    $commandeM->ajoutCommande($commande);

    $sujet = "Nouvelle commande de ".$_POST['prenom']." ".$_POST['nom'];
    $corp = "Nom: ".$_POST['nom']."\n"."Prenom: ".$_POST['prenom']."\n"."Email: ".$_POST['email']."\n"."Téléphone: ".$_POST['telephone']."\n"."Adresse: ".$_POST['adresse']."\n"."Quantité: ".$_POST['quantite']." * ".$_POST['poids']." grammes";
    $corpHtml = "<p>Nom: ".$_POST['nom']."<br>"."Prenom: ".$_POST['prenom']."<br>"."Email: ".$_POST['email']."<br>"."Téléphone: ".$_POST['telephone']."<br>"."Adresse: ".$_POST['adresse']."<br>"."Quantité: ".$_POST['quantite']." * ".$_POST['poids']." grammes</p>";

    $mail->isSMTP();
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username = $config['email']['username'];
    $mail->Password = $config['email']['password'];
    $mail->setFrom($config['email']['username'], 'Service de commandes');
    $mail->addAddress($config['email']['to'], 'Service de commandes');
    $mail->Subject = "Nouvelle commande de ".$_POST['prenom']." ".$_POST['nom'];
    $mail->msgHTML($corpHtml);
    $mail->AltBody = $corp;

    if (!$mail->send()) {
        echo 'Mailer Error: '. $mail->ErrorInfo;
        return http_response_code(500);
    } else {
        echo 'Message sent!';
        return http_response_code(201);
        //Section 2: IMAP
        //Uncomment these to save your message in the 'Sent Mail' folder.
        #if (save_mail($mail)) {
        #    echo "Message saved!";
        #}
    }
    return http_response_code(500);

    /* if (mail($dest, $sujet, $corp, $headers)) {
        return http_response_code(201);
    } else {
        return http_response_code(500);
    }
    return http_response_code(500); */
    
}
