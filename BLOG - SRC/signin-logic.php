<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // form bilgilerini alma
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$username_email) {
        $_SESSION['signin'] = "Kullanıcı adı veya E-Posta gerekli";
    } elseif (!$password) {
        $_SESSION['signin'] = "Şifre gerekli";
    } else {
        // kullanıcı bilgilerini veritabanından alma
        $fetch_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            // kaydı assoc dizisine dönüştür
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];
            // form şifresini veritabanı şifresiyle karşılaştırma
            if (password_verify($password, $db_password)) {
                $_SESSION['user-id'] = $user_record['id'];
                // kullanıcı yönetici ise
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                }
                // kullanıcı girişi
                header('location: ' . ROOT_URL . 'admin/');
            } else {
                $_SESSION['signin'] = "Bilgileri kontrol edin";
            }
        } else {
            $_SESSION['signin'] = "Kullanıcı bulunamadı";
        }
    }

    // herhangi bir sorun varsa giriş verileriyle oturum açma sayfasına geri yönlendirme
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}
