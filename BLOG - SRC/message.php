<?php
ini_set('SMTP', 'smtp.gmail.com');
ini_set('smtp_port', 587);
$name = $_POST['name'];
$email = $_POST['email'];
$konu = $_POST['konu'];
$message = $_POST['message'];

if(!empty($email) && !empty($message)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $reciever = "efesipahi18@gmail.com";
        $subject = "From: $name <$email>";
        $body = "İsim: $name\nE-Posta: $email\nKonu: $konu\n\nMesaj: $message\n\nSaygılarımızla,\n$name";
        $sender = "From: $email";

        if(mail($reciever, $subject, $body, $sender)) {
            echo "Mesajınız başarıyla gönderildi!";
        } else {
            echo "Üzgünüz, mesajınız gönderilemedi.";
        }

    } else {
        echo "Lütfen geçerli bir e-posta adresi girin!";
    }
} else {
    echo "Formdaki tüm bilgiler girilmelidir!";
}
?>