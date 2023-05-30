<?php
require 'config/database.php';

// butona tıklandığını kontrol etme
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // işaretlenmemişse is_featured değerini 0 olarak ayarla
    $is_featured = $is_featured == 1 ?: 0;

    // girişi onaylama
    if (!$title) {
        $_SESSION['edit-post'] = "Gönderi güncellenemedi. Gönderi düzenleme sayfasında geçersiz form verileri.";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Gönderi güncellenemedi. Gönderi düzenleme sayfasında geçersiz form verileri.";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Gönderi güncellenemedi. Gönderi düzenleme sayfasında geçersiz form verileri.";
    } else {
        // yeni küçük resim varsa mevcut küçük resmi sil
        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }

            // yeni thumbnail
            // yeniden adlandırma
            $time = time();
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if (in_array($extension, $allowed_files)) {
                // avatar dosya boyutu maks. 20mb
                if ($thumbnail['size'] < 2000000) {
                    // avatarı yükle
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else {
                    $_SESSION['edit-post'] = "Gönderi güncellenemedi. Küçük resim boyutu çok büyük. 20mb'den az olmalı";
                }
            } else {
                $_SESSION['edit-post'] = "Gönderi güncellenemedi. Küçük resim png, jpg veya jpeg olmalıdır";
            }
        }
    }


    if ($_SESSION['edit-post']) {
        // form geçersizse
        header('location: ' . ROOT_URL . 'admin/');
        die();
    } else {
        // öne çıkan gönderi olarak ayarlanmışsa diğer tüm gönderilerin is_featured değerini 0 olarak ayarla
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // yeni bir tane yüklendiyse küçük resim adını ayarla yoksa eski küçük resim adını koru
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        $query = "UPDATE posts SET title='$title', body='$body', thumbnail='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
    }


    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Gönderi başarıyla güncellendi";
    }
}

header('location: ' . ROOT_URL . 'admin/');
die();
