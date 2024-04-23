<!-- riepilogo.php -->
<?php
// Connessione al database PDO
require_once 'conn.php';
$conn = Conn::connect();


// Query per calcolare i punti di ogni squadra
$query = "SELECT squadre.nome AS squadra, 
                 COUNT(partite.id) AS partite_giocate, 
                 SUM(CASE
                     WHEN partite.gol_casa > partite.gol_ospite AND partite.squadra_casa_id = squadre.id THEN 3
                     WHEN partite.gol_casa < partite.gol_ospite AND partite.squadra_ospite_id = squadre.id THEN 3
                     WHEN partite.gol_casa = partite.gol_ospite THEN 1
                     ELSE 0
                 END) AS punti
          FROM squadre
          LEFT JOIN partite ON squadre.id = partite.squadra_casa_id OR squadre.id = partite.squadra_ospite_id
          GROUP BY squadre.nome
          ORDER BY punti DESC";
$result = $conn->query($query);

// Visualizzazione della classifica
echo '<h2>Classifica</h2>';
echo '<table border="1">';
echo '<tr><th>Squadra</th><th>Partite Giocate</th><th>Punti</th></tr>';

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>' . $row['squadra'] . '</td>';
    echo '<td>' . $row['partite_giocate'] . '</td>';
    echo '<td>' . $row['punti'] . '</td>';
    echo '</tr>';
}

echo '</table>';
?>
