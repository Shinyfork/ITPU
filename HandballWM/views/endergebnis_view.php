<?php
$title = "Vorrunde";
include "header.php";
?>
<h2><?php echo $title; ?></h2>

<h3>Gruppe A</h3>
<hr>


<?php
if (!empty($endstand_a)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_a as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe B</h3>
<hr>

<?php
if (!empty($endstand_b)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_b as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe C</h3>
<hr>

<?php
if (!empty($endstand_c)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_c as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe D </h3>
<hr>

<?php
if (!empty($endstand_d)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_d as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe E </h3>
<hr>

<?php
if (!empty($endstand_e)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_e as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe F </h3>
<hr>

<?php
if (!empty($endstand_f)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_f as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe G</h3>
<hr>

<?php
if (!empty($endstand_g)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_g as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>

<h3>Gruppe H </h3>
<hr>

<?php
if (!empty($endstand_h)) {
    ?>
        <table>
            <tr>
                <th>Mannschaft</th>
                <th>Platz</th>
                <th>Spiele</th>
                <th>S</th>
                <th>U</th>
                <th>N</th>
                <th>Tore</th>
                <th>Diffrenz</th>
                <th>Punkte</th>
                
               
            </tr>
            <?php
            foreach ($endstand_h as $mannschaft) {
            ?>
                <tr>
                    <td><?php echo $mannschaft['mannschaft']; ?></td>
                    <td><?php echo $mannschaft['platz']; ?></td>
                    <td><?php echo $mannschaft['spiele']; ?></td>
                    <td><?php echo $mannschaft['siege']; ?></td>
                    <td><?php echo $mannschaft['unentschieden']; ?></td>
                    <td><?php echo $mannschaft['niederlagen']; ?></td>
                    <td><?php echo $mannschaft['tore_plus'] . ':' . $mannschaft['tore_minus']; ?></td>
                    <td><?php echo $mannschaft['differenz']; ?></td>
                    <td><?php echo $mannschaft['punkte']; ?></td>
                    </tr>
            <?php } ?>
        </table>
    



        
    <?php
    } else {
        // echo "Es sind noch keine Mannschaften vorhanden!";
    }
?>