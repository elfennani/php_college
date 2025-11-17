<?php 
$nums = [3, 7, 2, 9, 4, 6, 1, 8, 5, 20, 15];

if(isset($_GET['n'])) {
    $n = intval($_GET['n']);
    $trouve = false;

    foreach($nums as $num) {
        if($num === $n) {
            echo "Le nombre $n est trouvé dans le tableau.";
            $trouve = true;
            break;
        }
    }

    if(!$trouve) {
        echo "Le nombre $n n'est pas trouvé dans le tableau.";
    }
} 
?>

<form action="#" method="get">
    <input name="n" placeholder="Saisir un nombre..." />
    <button type="submit">
        Confirmer
    </button>
</form>