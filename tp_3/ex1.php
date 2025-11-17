<?php
if(isset($_GET['num'])) {
    $num = intval($_GET['num']);
    $pair = ($num % 2 == 0) ? "pair" : "impair";
    echo "Le nombre $num est $pair.";
}
?>

<form action="#" method="get">
    <input name="num" placeholder="Saisir un nombre..." />
    <button type="submit">
        Confirmer
    </button>
</form>