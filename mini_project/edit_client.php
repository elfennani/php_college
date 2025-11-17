<?php 
if(!isset($_GET['id'])) {
    header("Location: client.php");
    exit();
}

if(isset($_POST['submit'])) {
    include "init_db.php";
    $id = intval($_GET['id']);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'] === "Masculin" ? "M" : "F";
    $ville = $_POST['ville'];
    $loisirs = $_POST['loisirs'];

    $query = pg_prepare($dbconn, "update_client", "UPDATE client SET nom = $1, prenom = $2, sexe = $3, ville = $4, loisir = $5 WHERE id = $6");
    $result = pg_execute($dbconn, "update_client", array($nom, $prenom, $sexe, $ville, $loisirs, $id));
    if($result) {
        header("Location: client.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du client.";
    }
}

include "init_db.php";
$id = intval($_GET['id']);
$query = pg_prepare($dbconn, "select_client", "SELECT * FROM client WHERE id = $1");
$result = pg_execute($dbconn, "select_client", array($id));
/** 
 * @var array{ id: integer, nom: string, prenom: string, sexe: string, ville: string, loisir: string }|false
 */
$client = pg_fetch_assoc($result);
if(!$client) {
    header("Location: client.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le client</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            width: 300px;
            gap: 10px;
            margin-bottom: 20px;
        }

        td,th{
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
     <h2>Ajouter un nouveau client</h2>
    <form action="#" onsubmit="handle_submit(event)" method="POST">
        <input id="nom" name="nom" placeholder="Nom du client" required value="<?= $client['nom']; ?>" />
        <input id="prenom" name="prenom" placeholder="Prénom du client" required value="<?= $client['prenom']; ?>" />
         <select id="sexe" name="sexe" required>
            <option value="Masculin" <?= $client['sexe'] === "M" ? "selected" : ""; ?>>Masculin</option>
            <option value="Féminin" <?= $client['sexe'] === "F" ? "selected" : ""; ?>>Féminin</option>
        </select>
        <input id="ville" name="ville" placeholder="Ville du client" required value="<?= $client['ville']; ?>" />
        <input id="loisirs" name="loisirs" placeholder="Loisirs du client" required value="<?= $client['loisir']; ?>" />
        <button type="submit" name="submit">
            Mettre à jour le client
        </button>
    </form>
    <script>
        function handle_submit(event) {
            /**
             * @type {string}
             */
            const nom = document.getElementById('nom').value;
            const prenom = document.getElementById('prenom').value;
            const sexe = document.getElementById('sexe').value;
            const ville = document.getElementById('ville').value;
            const loisirs = document.getElementById('loisirs').value;

            if(nom.length <= 2){
                alert("Le nom doit contenir au moins 3 caractères.");
                event.preventDefault();
                return;
            } else if(prenom.length <= 2){
                alert("Le prénom doit contenir au moins 3 caractères.");
                event.preventDefault();
                return;
            }else if(ville.length <= 2){
                alert("La ville doit contenir au moins 3 caractères.");
                event.preventDefault();
                return;
            } else if(loisirs.length <= 2){
                alert("Les loisirs doivent contenir au moins 3 caractères.");
                event.preventDefault();
                return;
            } else if(sexe !== "Masculin" && sexe !== "Féminin"){
                alert("Veuillez sélectionner un sexe valide.");
                event.preventDefault();
                return;
            }
        }
    </script>
</body>
</html>