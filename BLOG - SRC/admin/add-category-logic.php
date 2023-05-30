<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    // form verilerini alma
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$title) {
        $_SESSION['add-category'] = "Bir kategori ismi girin";
    } elseif (!$description) {
        $_SESSION['add-category'] = "Bir kategori ismi girin";
    }

    // geçersiz giriş varsa tekrar yönlendirme
    if (isset($_SESSION['add-category'])) {
        $_SESSION['add-category-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    } else {
        // kategoriyi veritabanına yazdırma
        $query = "INSERT INTO categories (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)) {
            $_SESSION['add-category'] = "Kategori ekleme başarısız";
            header('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
        } else {
            $_SESSION['add-category-success'] = "$title başlıklı kategori başarıyla eklendi";
            header('location: ' . ROOT_URL . 'admin/manage-categories.php');
            die();
        }
    }
}
