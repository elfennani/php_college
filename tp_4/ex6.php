<?php 
// le fonction time() retourne le timestamp actuel en epoque secondes comme `Date.now()` mais en milliseconds en JavaScript
echo "A cet instant le timestamp est : " . time() . "<br/>";
echo "Dans 23 jours, le timestamp sera : " . (time() + 23 * 24 * 60 * 60) . "<br/>";
echo "Il y'a 12 jours le timestamp etait : " . (time() - 12 * 24 * 60 * 60) . "<br/>";

echo "Le nombre d'heure depuis 1/1/1970 est : " . floor(time() / 3600) . "heures <br/>";
echo "Le nombre de jour depuis 1/1/1970 est : " . floor(time() / (3600 * 24)) . " jours<br/>";
echo "La date et l'heure actuelle est : " . date("d/m/Y H:i:s") . "<br/>";