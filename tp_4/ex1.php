<?php
$texte = "Bonjour le monde";
$longueur = strlen($texte);
$maj = strtoupper($texte);
$inverse = strrev($texte);

echo "Texte: $texte<br/>";
echo "Longueur: $longueur<br/>";
echo "En majuscules: $maj<br/>";
echo "Inverse: $inverse<br/>";
?>