<?php
require_once 'kontrol.php';
// cikis.php
session_start();
session_destroy();
header("Location: index.php");
?>