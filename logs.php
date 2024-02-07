<?php
require_once 'kontrol.php';
session_start();
# Kullanıcı giriş yapmamışsa login sayfasına yönlendir
if (!isset($_SESSION['kullanici'])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dizin Listesi</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Log Kayıtları</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="cikis.php">Çıkış Yap</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">

  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Dosya Adı</th>
        <th scope="col">İndirme Linki</th>
      </tr>
    </thead>
    <tbody>
      <form action="indir.php">

      
      <?php
      $dizin = '/signatured/'; // Dizin adını güncelleyin.

      // Dizini tarayarak dosyaları elde et
      $dosyaListesi = array_diff(scandir($dizin), array('..', '.'));
      rsort($dosyaListesi);

      foreach ($dosyaListesi as $index => $dosyaAdi) {
        $dosyaYolu = $dizin . $dosyaAdi;
        echo "<tr>";
        echo "<th scope='row'>" . ($index + 1) . "</th>";
        echo "<td>{$dosyaAdi}</td>";
        echo "<td><button name='dosyaAdi' value='{$dosyaYolu}' class='btn btn-primary' download>İndir</button></td>";
        echo "</tr>";
      }
      ?>
      </form>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS ve Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>