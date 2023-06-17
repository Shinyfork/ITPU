<?php

include "./../inc/functions/connection.php";

// Das ist der Controller für die tabellenvorrunde

// Folgende Funktion löscht alle Einträge in tabellenvorrunde, die dem Parameter gruppe gehören.


function tabellenvorrunde_löschen($gruppe){
    // Löscht alle Einträge (Mannschaften) aus tabellenvorrunde der Gruppe $gruppe
    // gibt true zurück bei Erfolg, sonst false
    // Die Funktion muss unsere Datenbankverbindung mitgeteilt bekommen.
    global $pdo;
    $sql = "DELETE t
            FROM tabellenvorrunde AS t
            INNER JOIN mannschaften AS m ON t.id_mannschaft = m.id_mannschaft
            WHERE m.gruppe = :gruppe";

    // Alternative
    // $sql = "DELETE FROM tabellenvorrunde WHERE id_mannschaft IN (SELECT id_mannschaft FROM mannschaften WHERE gruppe = :gruppe)";   
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':gruppe', $gruppe);
    if($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function tabellenvorrunde_eintragen($gruppe){
    // die id_mannschaft jeder manschaft aus $gruppe wird in tabellenvorrunde eintragen.
    global $pdo;
    // Alte Einträge löschen
    tabellenvorrunde_löschen($gruppe);
    $sql = "INSERT INTO tabellenvorrunde (id_mannschaft) 
    SELECT id_mannschaft FROM mannschaften 
    WHERE gruppe = :gruppe";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':gruppe', $gruppe);
    
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }

}

// function tabellenvorrunde_eintragen_alternativ($gruppe) {
//     global $pdo;
//     // Alte Einträge löschen
//     tabellenvorrunde_löschen($gruppe);
//     $sql = "SELECT id_mannschaft FROM mannschaften WHERE gruppe = :gruppe";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindParam(':gruppe', $gruppe);
//     $stmt->execute();
//     while ($id = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $id_mannschaft = $id['id_mannschaft'];
//         $sql = "INSERT INTO tabellenvorrunde (id_mannschaft)
//                 VALUE ($id_mannschaft)";
//         $stmtinsert = $pdo->query($sql);
        
//     }
// }

function tabellenvorrunde_eintragen_Daten($gruppe) {
    // trägt für eine Gruppe alle Daten der vier Mannschaften ein, so dass wir eine Tabelle ausgeben können
    global $pdo;
    tabellenvorrunde_eintragen($gruppe);
    // Wir holen uns aus der Gruppe alle Mannschaften in $stmt
    $sql = "SELECT id_mannschaft FROM mannschaften WHERE gruppe = :gruppe";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':gruppe', $gruppe);
    $stmt->execute();
    // Für Gruppe A enthält das $stmt die vier Primärschlüssel, d.h. 4 Datensätze mit je einem Schlüssel der Mannschaft
    // in unserem Fall für Gruppe A:
    // 1
    // 2
    // 3
    // 4
    while ($id = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id_mannschaft = $id['id_mannschaft'];
        // Alles was ab hier kommt wird für genau EINE Mannschaft errechnet.
        // Und diese Mannschaft erhält sämtliche Daten in tabellenvorrunde
        // Wir untersuchen die Daten in der unsere Mannschaft als Heimmanschaft auftritt
            // A) Wir errechnen die geworfenen Tore (heimtore) und die Gegentore (gasttore)
            //   Und die Anzahl der Spiele
        $sql = "SELECT count(id_spiele) AS spiele, SUM(heimtore) AS ht, SUM(gasttore) AS gt FROM spiele WHERE heim_id = $id_mannschaft";
        $stmtselect = $pdo->query($sql);
        $ergebnis = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($spiele = $ergebnis['spiele']) {} else $spiele =0;
        if($ht = $ergebnis['ht']) {} else $ht =0;
        if($gt = $ergebnis['gt']) {} else $gt =0;
        $sql = "UPDATE tabellenvorrunde 
                SET spiele = $spiele, tore_plus = $ht, tore_minus = $gt
                WHERE id_mannschaft = $id_mannschaft";
        $stmtupdate = $pdo->query($sql);

        // Aktion 2. Wir untersuchen die Daten in der unsere Mannschaft als Gastmannschaft auftritt.
            // B) wir addieren die geworfenen Tore (gasttore), die Gegentore (heimtore),
            // wir errechen die Differenz der Tore und ergänzen die Anzahl der Spiele
        $sql = "SELECT COUNT(id_spiele) AS spiele, SUM(heimtore) AS ht, SUM(gasttore) AS gt FROM spiele WHERE gast_id = $id_mannschaft";
        $stmtselect = $pdo->query($sql);
        $ergebnis = $stmtselect->fetch(PDO::FETCH_ASSOC);
        if($spiele = $ergebnis['spiele']) {} else $spiele =0;
        if($ht = $ergebnis['ht']) {} else $ht =0;
        if($gt = $ergebnis['gt']) {} else $gt =0;
        $sql = "UPDATE tabellenvorrunde 
                SET spiele = spiele + $spiele, tore_plus = tore_plus + $gt, tore_minus = tore_minus + $ht, differenz = tore_plus-tore_minus
                WHERE id_mannschaft = $id_mannschaft";
        $stmtupdate = $pdo->query($sql);
        
        // Aktion 3. Wir untersuchen alle Spiele der Mannnschaft
        $siege = 0;
        $unentschieden = 0;
        $niederlagen = 0;
        $punkte = 0;
        
        $sql = "SELECT heim_id, heimtore, gasttore
        FROM spiele WHERE heim_id = $id_mannschaft OR gast_id = $id_mannschaft";
        $stmtselect = $pdo->query($sql);
        while ($spielergebnis = $stmtselect->fetch(PDO::FETCH_ASSOC)){
            // Fall 1. Unserer gerade betrachtete Mannschaft (id_mannschaft) ist die Heimmanschaft   
            $heim_id = $spielergebnis['heim_id'];
            $heimtore = $spielergebnis['heimtore'];
            $gasttore = $spielergebnis['gasttore'];
            if($heim_id == $id_mannschaft){
                    if($heimtore > $gasttore){
                        $siege++;
                        $punkte = $punkte +2;
                        // $punkte += 2;
                    }elseif ($heimtore < $gasttore) {
                        $niederlagen++;
                    } else{
                        $unentschieden++;
                        $punkte++;
                    }
                }else{ // Fall 2. Unserer gerade betrachtete Mannschaft (id_mannschaft) ist die Gastmanschaft  
                    if($gasttore > $heimtore ){
                        $siege++;
                        $punkte = $punkte +2;
                    }elseif ($gasttore < $heimtore){
                        $niederlagen++;
                    }else{
                        $unentschieden++;
                        $punkte++;
                    }
                }
        }
        $sql = "UPDATE tabellenvorrunde 
                SET siege =$siege, niederlagen = $niederlagen, unentschieden = $unentschieden, punkte = $punkte
                WHERE id_mannschaft = $id_mannschaft";
        $stmtupdate = $pdo->query($sql);
            

        // $sql = "INSERT INTO tabellenvorrunde (id_mannschaft)
        //         VALUE ($id_mannschaft)";
        // $stmtinsert = $pdo->query($sql);
        echo "<br><br><br>";
    }
}


// if (tabellenvorrunde_eintragen($gruppe)) echo "Super";

tabellenvorrunde_eintragen_Daten("A");
tabellenvorrunde_eintragen_Daten("B");
tabellenvorrunde_eintragen_Daten("C");
tabellenvorrunde_eintragen_Daten("D");
tabellenvorrunde_eintragen_Daten("E");
tabellenvorrunde_eintragen_Daten("F");
tabellenvorrunde_eintragen_Daten("G");
tabellenvorrunde_eintragen_Daten("H");
?>

<?php

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='A'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_a = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='B'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_b = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='C'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_c = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='D'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_d = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='E'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_e = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='F'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_f = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='G'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_g = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT mannschaft, platz, spiele, siege, unentschieden, niederlagen, tore_plus, tore_minus, differenz, punkte
            FROM tabellenvorrunde AS T, mannschaften AS M
            WHERE M.id_mannschaft = T.id_mannschaft AND gruppe ='H'
            ORDER BY punkte DESC";

if ($stmt = $pdo->query($sql)){
    $endstand_h = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



include "./../views/endergebnis_view.php";;









