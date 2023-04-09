<?php
require 'config/constants.php';
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
        <h2>Kayıt Ol</h2>
        <div class="alert__message error">
            <p>HATA MESAJI</p>
        </div>
        <form action="<?= ROOT_URL ?>signup-logic.php" class="form__selection" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" placeholder="İsim">
            <input type="text" name="lastname" placeholder="Soyisim">
            <input type="text" name="username" placeholder="Kullanıcı Adı">
            <input type="email" name="email" placeholder="E-Mail Adresi">
            <input type="password" name="createpassword" placeholder="Şifre Oluştur">
            <input type="password" name="confirmpassword" placeholder="Şifreyi Tekrarla">
            <div class="form__control">
                <label for="avatar">Profil Fotoğrafı</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn kayit-btn">Kayıt Ol</button>
            <small>Zaten bir hesabın var mı? <a href="signin.php">Giriş Yap</a></small>
        </form>
    </div>
</section>

</body>
</html>
