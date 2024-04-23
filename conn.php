<?php

class Conn{
// Metodo per la connessione al database con PDO
static function connect(){
    try {
        $conn = new PDO("mysql:host=localhost;dbname=calcio", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Errore di connessione al database: " . $e->getMessage();
        die();
    }
}
}
?>
