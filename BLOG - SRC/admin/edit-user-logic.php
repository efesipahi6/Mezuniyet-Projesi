<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // güncellenmiş form verilerini al
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    // girişi kontrol et
    if (!$firstname || !$lastname) {
        $_SESSION['edit-user'] = "Düzenleme sayfasında geçersiz form girişi.";
    } else {
        // kullanıcıyı güncelle
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', is_admin=$is_admin WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "Kullanıcı güncellenemedi.";
        } else {
            $_SESSION['edit-user-success'] = "Kullanıcı $firstname $lastname, başarıyla güncellendi";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();
