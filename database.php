<?php

class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3("yonetim.db");
    }

    public function checkUser($username, $password) {
        // Kullanıcıyı veritabanında kontrol et
        $query = "SELECT * FROM users WHERE username = :username AND passwd = :password";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':username', $username, SQLITE3_TEXT);
        $statement->bindValue(':password', $password, SQLITE3_TEXT);
        $result = $statement->execute();

        // Eğer kullanıcı bulunursa true, bulunmazsa false döndür
        return $result->fetchArray() !== false;
    }
}
?>
