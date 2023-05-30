<?php
require 'config/database.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // veritabanından kullanıcı verilerini alma
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    // sadece 1 kullanıcıyı alma
    if (mysqli_num_rows($result) == 1) {
        $avatar_name = $user['avatar'];
        $avatar_path = '../images/' . $avatar_name;
        // kullanıcının avatar resmini silme
        if ($avatar_path) {
            unlink($avatar_path);
        }
    }

    // paylaştığı gönderilerin tamamında bulunan thumbnailleri silme
    $thumbnails_query = "SELECT thumbnail FROM posts WHERE author_id=$id";
    $thumbnails_result = mysqli_query($connection, $thumbnails_query);
    if (mysqli_num_rows($thumbnails_result) > 0) {
        while ($thumbnail = mysqli_fetch_assoc($thumbnails_result)) {
            $thumbnail_path = '../images/' . $thumbnail['thumbnail'];
            // mevcutsa resmi sil
            if ($thumbnail_path) {
                unlink($thumbnail_path);
            }
        }
    }




    // kullanıcıyı veritabanından silme
    $delete_user_query = "DELETE FROM users WHERE id=$id";
    $delete_user_result = mysqli_query($connection, $delete_user_query);
    if (mysqli_errno($connection)) {
        $_SESSION['delete-user'] = "'{$user['firstname']} '{$user['lastname']}' isimli kullacı silinemedi";
    } else {
        $_SESSION['delete-user-success'] = "{$user['firstname']} {$user['lastname']} isimli kullanıcının hesabı başarıyla silindi";
    }
}

header('location: ' . ROOT_URL . 'admin/manage-users.php');
die();
