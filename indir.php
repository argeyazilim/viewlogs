<?php
require_once 'kontrol.php';
session_start();
# Kullanıcı giriş yapmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici'])) {
  header("Location: index.php");
}
$dosyaAdi = $_GET['dosyaAdi'];
//$dosyaAdi = "dosya.zip"; // İndirilecek dosyanın adı
$dosyaYolu = "/"; // İndirilecek dosyanın yolu

if(file_exists($dosyaYolu . $dosyaAdi)) {
    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=$dosyaAdi");
    readfile($dosyaYolu . $dosyaAdi);
} else {
    echo "İndirilecek dosya bulunamadı.";
}
?>
