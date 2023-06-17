<p>hier wird die Tabelle tabellenvorrunde erstellt</p>
<?php
include "./../inc/functions/connection.php";

$sql = "CREATE TABLE tabellenvorrunde (
    id_mannschaft INTEGER(11) NOT NULL PRIMARY KEY,
    platz INTEGER(11), 
    spiel INTEGER(11), 
    siege INTEGER(11), 
    unentschieden INTEGER(11), 
    niederlagen INTEGER(11), 
    tore_plus INTEGER(11), 
    tore_minus INTEGER(11), 
    differenz INTEGER(11), 
    punkte INTEGER(11)
)";

if ($stmt = $pdo->query($sql)) {
    echo "Die Tabelle wurde erfolgreich angelegt.<br>";
   

};