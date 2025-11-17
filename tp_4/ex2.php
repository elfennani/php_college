<?php 
$notes = [
    "Ali" => 15,
    "Sara" => 18,
    "Mehdi" => 12,
];

foreach($notes as $nom => $note) {
    echo "Nom: $nom, Note: $note<br/>";
}

$moy = array_sum($notes) / count($notes);
echo "Moyenne: $moy";
?>