<!-- salva_risultato.php -->
<?php
require_once 'conn.php';
// Connessione al database
$conn = Conn::connect();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Metodo non valido.";
    exit();
}
// Ricevi i dati dal form
$squadra_casa = $_POST['squadra_casa'];
$squadra_ospite = $_POST['squadra_ospite'];
$gol_casa = $_POST['gol_casa'];
$gol_ospite = $_POST['gol_ospite'];

// Query per inserire il risultato nella tabella partite (PDO)
$query = "INSERT INTO partite (squadra_casa_id, squadra_ospite_id, gol_casa, gol_ospite) 
          VALUES (:squadra_casa, :squadra_ospite, :gol_casa, :gol_ospite)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':squadra_casa', $squadra_casa, PDO::PARAM_INT);
$stmt->bindParam(':squadra_ospite', $squadra_ospite, PDO::PARAM_INT);
$stmt->bindParam(':gol_casa', $gol_casa, PDO::PARAM_INT);
$stmt->bindParam(':gol_ospite', $gol_ospite, PDO::PARAM_INT);
$stmt->execute();

// Reindirizza alla pagina di riepilogo
header("Location: riepilogo.php");
exit();
?>
