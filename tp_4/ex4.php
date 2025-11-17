<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_GET['submit'])) {
        $nom = $_GET['nom'];
        $age = $_GET['age'];

        echo "Bonjour $nom, vous avez $age ans.<br/>";

        if($age < 18) {
            echo "Vous êtes mineur";
        } else {
            echo "Vous êtes majeur";
        }
    }
    ?>
    <form action="#">
        <input name="nom" placeholder="Saisir votre nom..." />
        <input name="age" type="number" placeholder="Saisir votre age..." />
        <button type="submit" name="submit">
            Confirmer
        </button>
    </form>
</body>
</html>