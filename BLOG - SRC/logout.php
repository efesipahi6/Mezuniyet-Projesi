<?php
require 'config/constants.php';
// tüm oturumu sonlandır ve kullanıcıyı anasayfaya yönlendir
session_destroy();
header('location: ' . ROOT_URL);
die();
