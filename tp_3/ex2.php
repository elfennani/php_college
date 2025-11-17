<?php 
if(isset($_GET['num1']) && isset($_GET['num2'])) {
    $num1 = intval($_GET['num1']);
    $num2 = intval($_GET['num2']);
    
    if($num1 > $num2) {
        echo "Le plus grand nombre est: $num1.";
    } elseif($num2 > $num1) {
        echo "Le plus grand nombre est: $num2.";
    } else {
        echo "Les deux nombres sont égaux.";
    }
}
?>

<form action="#" method="get">
    <input name="num1" placeholder="Saisir le premier nombre..." />
    <input name="num2" placeholder="Saisir le deuxième nombre..." />
    <button type="submit">
        Confirmer
    </button>
</form>