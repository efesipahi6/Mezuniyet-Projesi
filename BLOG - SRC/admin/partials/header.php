<?php
require '../partials/header.php';

/* giriş yapılıp yapılmadığını kontrol et */
if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}
