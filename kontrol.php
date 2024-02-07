<?php
// Gelen isteğin IP adresini al
$ipAdresi = $_SERVER['REMOTE_ADDR'];

// İstenen ağ aralığı
$istenilenAglar = array(
    '192.168.10',
    '95.70.170.51',
);

// İstemcinin IP adresinin ağa ait olup olmadığını kontrol et
$istekAgi = false;
foreach ($istenilenAglar as $agi) {
    if (strpos($ipAdresi, $agi) === 0) {
        $istekAgi = true;
        break;
    }
}

// İstek ağa aitse devam et, değilse erişim reddedilir
if ($istekAgi) {
   # echo "Hoş geldiniz, istemci IP adresi: " . $ipAdresi;
} else {
    echo "Erişim reddedildi!";
    http_response_code(403);
    exit;
}
?>
