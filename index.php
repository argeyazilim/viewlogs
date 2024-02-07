<?php
require_once 'kontrol.php';
// Session başlatma veya var olan bir session'u devam ettirme
session_start();

// Kullanıcı giriş yapmış mı kontrol etme
if(isset($_SESSION['kullanici'])) {
    header("Location: logs.php");
}

require_once 'database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new Database();

    if ($db->checkUser($username, $password)) {
        # echo "Giriş Başarılı!";
        $_SESSION['kullanici'] = TRUE;
        header("Location: logs.php");
    } else {
        echo "Hatalı Kullanıcı Adı veya Şifre!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Sayfası</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Giriş Yap
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="username" class="form-label">Kullanıcı Adı:</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Şifre:</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS ve Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
