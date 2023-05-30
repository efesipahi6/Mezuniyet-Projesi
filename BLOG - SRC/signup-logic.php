<?php 
require 'config/database.php';


/* Kayıt ol butonuna basınca kayıt bilgilerini alma */
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    /* İnputların kontrolleri */
    if(!$firstname) {
        $_SESSION['signup'] = "Lütfen isminizi giriniz.";
    } else if (!$lastname) {
        $_SESSION['signup'] = "Lütfen soyisim giriniz.";
    } else if (!$username) {
        $_SESSION['signup'] = "Lütfen kullanıcı adınızı giriniz.";
    } else if (!$email) {
        $_SESSION['signup'] = "E-Mail adresinizi doğru girdiğinizden emin olunuz.";
    } else if (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Şifreniz 8 karakterden fazla olmalı.";
    } else if (!$avatar["name"]) {
        $_SESSION['signup'] = "Lütfen profil fotoğrafınız için bir resim seçiniz.";
    } else {
        /* Şifre uyuşmazlığı testi */
        if($createpassword !== $confirmpassword) {
            $_SESSION["signup"] = "Şifreler uyuşmuyor.";
        } else {
            /* Şifreleri şifreleme */
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            /* Kullanıcı adı veya eposta zaten kayıtlıysa testi */
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "Kullanıcı adı veya E-Mail zaten kayıtlı.";
            } else {
                /* avatar fotoğrafını kullanıcı ismiyle eşleştirme */
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                /* Yüklenen dosyanın resim olup olmadığını kontrol etme */
                $allowed_files = ['png', 'jpg', 'jpeg', 'gif'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);

                if(in_array($extention, $allowed_files)) {
                    /* resmin boyutunu sınırlandırma (10mb) */
                    if($avatar['size'] < 10000000) {
                        /* Avatarı yükleme */
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = 'Dosya boyutu çok büyük. Dosya boyutu 10MB(10240KB)`den az olmalıdır.';
                    }
                } else {
                    $_SESSION['signup'] = "Dosya uzantısı yalnızca .png, .jpg, .jpeg veya .gif olabilir.";
                }
            }
        }
    }

    /* herhangi bir problem yaşandığında kayıt sayfasına yönlendirme */
    if (isset($_SESSION['signup'])) {
        /* kayıt sayfasına verileri geri getirme */
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        $insert_user_query = "INSERT INTO users SET firstname = '$firstname', lastname = '$lastname', username = '$username' , email = '$email', password = '$hashed_password', avatar = '$avatar_name', is_admin = 0";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            /* kayıt işlemi başarılı olursa giriş sayfasına yönlendirme */
            $_SESSION['signup-success'] = "Kayıt işlemi başarılı. Lütfen giriş yapınız.";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }

} else {
    /* butona basılmazsa, sayfaya geri dön */
    header('location: ' . ROOT_URL . 'signup.php');
    die();
}

?>