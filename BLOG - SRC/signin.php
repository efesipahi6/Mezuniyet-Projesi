<?php
require 'config/constants.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efe Sipahi</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body class="kayit-body">


<section class="form__section">
    <div class="container form__section-container">
        <h2>Giriş Yap</h2>
        <div class="alert__message success">
            <p>HATA MESAJI</p>
        </div>
        <form class="form__selection" action="">
            <input type="text" placeholder="Kullanıcı adı veya E-Posta">
            <input type="password" placeholder="Şifre">
            <button type="submit" class="btn kayit-btn">Giriş Yap</button>
            <small>Henüz bir hesabın yok mu? <a href="signup.php">Kayıt Ol</a></small>
        </form>
    </div>
</section>

</body>
</html>