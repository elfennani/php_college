<?php 
$actuel = "1234";

// Normalement, il faut utiliser POST pour les mots de passe,
// mais pour la simplicité de l'exercice, j'utilise GET ici.
if(isset($_GET["password"])){
    $password = $_GET["password"];

    if($password === $actuel){
        echo "Accès autorisé.";
    }else{
        echo "Accès refusé.";
    }
}

?>

<form action="#" method="get">
    <input name="password" type="password" placeholder="Saisir le mot de passe..." />
    <button type="submit">
        Confirmer
    </button>
</form>