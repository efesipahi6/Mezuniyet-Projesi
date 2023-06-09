<?php
require 'config/database.php';

/* Giriş yapılan kullanıcı hesabının bilgilerini getirme */
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Efe Sipahi</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    
<!-- NAVBAR BAŞLANGIÇ -->
<nav>
        <div class="container nav__container">
            <a href="<?= ROOT_URL ?>index.php" class="nav__logo">Efe Sipahi</a>
            <ul class="nav__items">
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">Hakkında</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">İletişim</a></li>
                <li class="mode">
                            
                            <div class="toggler-wrap">
                            <input type="checkbox" class="checkbox" id="dark-mode-toggler">
                            <label for="dark-mode-toggler" class="label">
                                
                                <i class="fas fa-lightbulb"></i>
                                <i class="far fa-lightbulb"></i>
                                <div class="ball"></div>
                                
                              </label>
                              <span class="mode-text text">Dark mode</span>
                            </div>
                            
                        </li>
                <?php if (isset($_SESSION['user-id'])) : ?>
                    <li class="nav__profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" alt="">
                    </div>
                    <ul>
                        <li><a href="<?= ROOT_URL ?>admin/index.php">Kontrol Paneli</a></li>
                        <li><a href="<?= ROOT_URL ?>logout.php">Çıkış Yap<i class="uil uil-signout"></i></a></li>
                        
                    </ul>
                </li>
                <?php else : ?>
                <li><a href="<?= ROOT_URL ?>signin.php">Giriş Yap</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- NAVBAR BİTİŞ -->