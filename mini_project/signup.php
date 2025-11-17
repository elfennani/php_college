<?php 
    include "init_db.php";
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        
        $query = pg_prepare($dbconn, "insert_user", "INSERT INTO utilisateur (username, password) VALUES ($1, $2)");

        // Pour des raisons de simplicité, je n'ai pas haché le mot de passe ici.
        $result = pg_execute($dbconn, "insert_user", array($username, $password));
        if($result) {
            echo "Compte créé avec succès!";
            header("Location: index.php");
        } else {
            echo "Erreur lors de la création du compte.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation de compte</title>
</head>
<body>
    <h1>Créer un compte</h1>

    <form action="#" method="POST">
        <input name="username" placeholder="Nom d'utilisateur" />
        <input name="password" type="password" placeholder="Mot de passe" />
        <button type="submit">
            Creer un compte
        </button>
    </form>
</body>
</html>