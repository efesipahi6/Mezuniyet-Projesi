<?php
require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
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
        <?php if(isset($_SESSION['signup-success'])) : ?>
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-success']);
                         ?>
                </p>
            </div>
        <?php elseif (isset($_SESSION['signin'])) : ?>
        <div class="alert__message error">
                <p>
                    <?= $_SESSION['signin'];
                        unset($_SESSION['signin']);
                         ?>
                </p>
            </div>
        <?php endif ?>

        <form class="form__selection" action="<?= ROOT_URL ?>signin-logic.php" method="POST">
            <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Kullanıcı adı veya E-Posta">
            <input type="password" name="password" value="<?= $password ?>" placeholder="Şifre">
            <button type="submit" name="submit" class="btn kayit-btn">Giriş Yap</button>
            <small>Henüz bir hesabın yok mu? <a href="signup.php">Kayıt Ol</a></small>
        </form>
    </div>
</section>

</body>
</html>