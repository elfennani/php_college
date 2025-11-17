<?php 
include 'init_db.php';

if(isset($_SESSION['username'])) {
    header("Location: client.php");
    exit();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // https://www.php.net/manual/en/function.pg-prepare.php
    $query = pg_prepare($dbconn, "select_user", "SELECT * FROM utilisateur WHERE username = $1 AND password = $2");
    $result = pg_execute($dbconn, "select_user", array($username, $password));

    if(pg_num_rows($result) > 0) {
        echo "Login successful!";
        $_SESSION['username'] = $username;
        header("Location: client.php");
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="#" method="POST">
        <input name="username" placeholder="Username" />
        <input name="password" type="password" placeholder="Password" />
        <button type="submit">
            Login
        </button>
    </form>
    <br />
    <a href="/mini_project/signup.php">
        Créer un compte
    </a>
</body>
</html>