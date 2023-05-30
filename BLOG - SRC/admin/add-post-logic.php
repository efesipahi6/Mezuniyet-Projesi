<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // eğer kontrol edilmemişse önerilen butonuna 0 değerini ver
    $is_featured = $is_featured == 1 ?: 0;

    // validate işlemleri
    if (!$title) {
        $_SESSION['add-post'] = "Gönderi başlığını girin";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Gönderi kategorisini seçin";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Gönderi metni";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "Gönderi fotoğrafı seçin";
    } else {
        // Thumbnail işlemleri
        // resmi yeniden adlandırma
        $time = time(); // benzersiz bir resim adı vermek için
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // kabul edilen dosyalar
        $allowed_files = ['png', 'jpg', 'jpeg', 'gif'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            // Resim boyutu sınırlandırma. (20mb+)
            if ($thumbnail['size'] < 20000000) {
                // Thumbnaili yükleme
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-post'] = "Seçtiğiniz resmin boyutu 20mb'den düşük olmalı.";
            }
        } else {
            $_SESSION['add-post'] = "Seçtiğiniz dosya yalnızca .png, .jpg, .jpeg, .gif uzantılı olabilir";
        }
    }

    // bir sorun olursa form verileriyle post ekleme sayfasına yönlendir
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-post.php');
        die();
    } else {
        // post eklerken önerilen kutucuğu işaretlenmişse diğer tüm postlardaki is_featured değerini 0 atama
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // gönderiyi veritabanına ekleme
        $query = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) VALUES ('$title', '$body', '$thumbnail_name', $category_id, $author_id, $is_featured)";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "Yeni gönderiniz başarıyla eklendi";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/add-post.php');
die();
