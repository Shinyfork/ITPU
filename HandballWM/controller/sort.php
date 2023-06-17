<?php
$infos = array(
    array('name' => 'Jadon', 'age' => 21, 'country' => 'England'),
    array('name' => 'Marcus', 'age' => 23, 'country' => 'Wales'),
    array('name' => 'Anthony', 'age' => 24, 'country' => 'France'),
    array('name' => 'Mason', 'age' => 19, 'country' => 'England'),
    array('name' => 'Dan', 'age' => 23, 'country' => 'England'),
);

// Hole eine Liste von Spalten
// foreach ($infos as $key => $row) {
//     $band[$key]    = $row['age'];
//     $auflage[$key] = $row['country'];
// }

// statt des obigen Codes kann array_column() verwendet werden
$band  = array_column($infos, 'Band');
$auflage = array_column($infos, 'Auflage');

// Die Daten mit 'Band' absteigend, die mit 'Auflage' aufsteigend sortieren.
// Geben Sie $data als letzten Parameter an, um nach dem gemeinsamen
// Schlüssel zu sortieren.
array_multisort($band, SORT_DESC, $auflage, SORT_ASC, $infos);