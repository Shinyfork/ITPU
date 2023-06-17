<?php
$title = "Übersicht der Spieltage";
include "header.php";
?>
<h2><?php echo $title; ?></h2>

<h3>1.Spieltag</h3>
<hr>


<?php
if (!empty($spieltag_1)) {
    ?>
        <table>
            <tr>
                <th>Gruppe</th>
                <th>Heimmannschaft</th>
                <th>Gastmannschaft</th>
                <th>Datum</th>
                <th>Uhrzeit</th>
                <th>Spielort</th>
                
               
            </tr>
            <?php
            foreach ($spieltag_1 as $spiel) {
            ?>
                <tr>
                    <td><?php echo $spiel['gruppe']; ?></td>
                    <td><?php echo $spiel['heimmannschaft']; ?></td>
                    <td><?php echo $spiel['gastmannschaft']; ?></td>
                    <td><?php echo  date_format(new DateTime($spiel['datum']), "d.m."); ?></td>
                    <td><?php echo $spiel['uhrzeit']; ?></td>
                    <td><?php echo $spiel['arena']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>2.Spieltag</h3>
<hr>


<?php
if (!empty($spieltag_2)) {
    ?>
        <table>
            <tr>
                <th>Gruppe</th>
                <th>Heimmannschaft</th>
                <th>Gastmannschaft</th>
                <th>Datum</th>
                <th>Uhrzeit</th>
                <th>Spielort</th>
                
               
            </tr>
            <?php
    
            foreach ($spieltag_2 as $spiel) {
            ?>
                <tr>
                    <td><?php echo $spiel['gruppe']; ?></td>
                    <td><?php echo $spiel['heimmannschaft']; ?></td>
                    <td><?php echo $spiel['gastmannschaft']; ?></td>
                    <td><?php echo  date_format(new DateTime($spiel['datum']), "d.m."); ?></td>
                    <td><?php echo $spiel['uhrzeit']; ?></td>
                    <td><?php echo $spiel['arena']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>3.Spieltag</h3>
<hr>


<?php
if (!empty($spieltag_3)) {
    ?>
        <table>
            <tr>
                <th>Gruppe</th>
                <th>Heimmannschaft</th>
                <th>Gastmannschaft</th>
                <th>Datum</th>
                <th>Uhrzeit</th>
                <th>Spielort</th>
                
               
            </tr>
            <?php
    
            foreach ($spieltag_3 as $spiel) {
            ?>
                <tr>
                    <td><?php echo $spiel['gruppe']; ?></td>
                    <td><?php echo $spiel['heimmannschaft']; ?></td>
                    <td><?php echo $spiel['gastmannschaft']; ?></td>
                    <td><?php echo  date_format(new DateTime($spiel['datum']), "d.m."); ?></td>
                    <td><?php echo $spiel['uhrzeit']; ?></td>
                    <td><?php echo $spiel['arena']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }

    // include ...footer.php (enthält den HTML-Rumpf </body></html>)
    include "footer.php";
    ?>