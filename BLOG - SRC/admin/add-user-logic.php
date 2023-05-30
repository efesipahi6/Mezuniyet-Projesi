<?php
require 'config/database.php';

// gönder düğmesi tıklandıysa form verilerini alma
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // input verilerini doğrula
    if (!$firstname) {
        $_SESSION['add-user'] = "Lütfen bir isim giriniz";
    } elseif (!$lastname) {
        $_SESSION['add-user'] = "Lütfen bir soyisim giriniz";
    } elseif (!$username) {
        $_SESSION['add-user'] = "Lütfen bir kullanıcı adı giriniz";
    } elseif (!$email) {
        $_SESSION['add-user'] = "Doğru bir E-posta ekleyin";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "Şifre en az 8 karakterden oluşmalı";
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = "Lütfen profiliniz için bir profil fotoğrafı ekleyin";
    } else {
        // Girilen şifreleri karşılaştır
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Şifreler uyuşmuyor";
        } else {
            // şifre şifreleme
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // kullanıcı adı veya e-posta veritabanında zaten varsa kayıt olma işlemini geçersiz kıl
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['add-user'] = "Kullanıcı adı veya E-Posta zaten kullanılıyor";
            } else {
                // Avatar hakkında
                // avatar fotoğrafını yeniden adlandırma
                $time = time(); // dosyaya benzersiz bir isim vermek için time özelliğini kullandım
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                // kabul edilen dosya tüleri
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // dosya boyutu max. 10mb olsun
                    if ($avatar['size'] < 10000000) {
                        // avatarı yükleme
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = "Dosya boyutu maksimum 10mb olabilir";
                    }
                } else {
                    $_SESSION['add-user'] = "Desteklenen dosya uzantıları .png, .jpg, .jpeg";
                }
            }
        }
    }

    // bir problem olursa kullanıcı ekleme
    if (isset($_SESSION['add-user'])) {
        // form verilerini kayıt sayfasına gönderme
        $_SESSION['add-user-data'] = $_POST;
        header('location: ' . ROOT_URL . '/admin/add-user.php');
        die();
    } else {
        // yeni kullanıcıyı veritabanına yazdırma
        $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=$is_admin";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // onay mesajından sonra giriş sayfasına yönlendirme
            $_SESSION['add-user-success'] = "$firstname $lastname kullanıcısı başarıyla kayıt edildi.";
            header('location: ' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }
} else {
    // buton tıklanmadıysa kullanıcı ekleme sayfasına yönlendirme
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}
