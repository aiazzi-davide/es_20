<!-- form.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Inserisci Risultato Partita</title>
</head>
<body>
    <h2>Inserisci Risultato Partita</h2>
    <form action="result.php" method="post">
        <label for="squadra_casa">Squadra di Casa:</label>
        <select name="squadra_casa" id="squadra_casa">
            <!-- Opzioni delle squadre caricate dinamicamente -->
            <?php
            require_once 'conn.php';
            // Connessione al database
            $conn = Conn::connect();

            // Query per ottenere le squadre
            $query = "SELECT id, nome FROM squadre";
            $result = $conn->query($query);

            // Popola le opzioni del select con le squadre
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="squadra_ospite">Squadra Ospite:</label>
        <select name="squadra_ospite" id="squadra_ospite">
            <!-- Opzioni delle squadre caricate dinamicamente -->
            <?php
            // Popola le opzioni del select con le squadre
            $result = $conn->query($query);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
            }
            ?>
        </select>
        <br><br>
        <label for="gol_casa">Gol Squadra di Casa:</label>
        <input type="text" name="gol_casa" id="gol_casa">
        <br><br>
        <label for="gol_ospite">Gol Squadra Ospite:</label>
        <input type="text" name="gol_ospite" id="gol_ospite">
        <br><br>
        <input type="submit" value="Inserisci Risultato">
    </form>
</body>
</html>
