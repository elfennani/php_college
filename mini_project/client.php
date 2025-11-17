<?php 
include "init_db.php";

if(isset($_POST["submit"])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'] === "Masculin" ? "M" : "F";
    $ville = $_POST['ville'];
    $loisirs = $_POST['loisirs'];

    $query = pg_prepare($dbconn, "insert_client", "INSERT INTO client (nom, prenom, sexe, ville, loisir) VALUES ($1, $2, $3, $4, $5)");
    $result = pg_execute($dbconn, "insert_client", array($nom, $prenom, $sexe, $ville, $loisirs));

    if($result) {
        echo "Client ajouté avec succès!";
    } else {
        echo "Erreur lors de l'ajout du client.";
    }
}

$query = pg_prepare($dbconn, "select_clients", "SELECT * FROM client");
$result = pg_execute($dbconn, "select_clients", array());

/**
 * @var array{id: integer, nom: string, prenom: string, sexe: string, ville: string, loisir: string}[]|false
 */
$clients = pg_fetch_all($result);

if($clients === false) {
    $clients = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des clients</title>
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
    <h1>
        Bienvenue, <?php echo $_SESSION['username']; ?>!
    </h1>

    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Ville</th>
            <th>Loisirs</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php foreach($clients as $client){ ?>
        <tr>
            <td><?php echo $client['nom']; ?></td>
            <td><?php echo $client['prenom']; ?></td>
            <td><?php echo $client['sexe'] === "M" ? "Masculin" : "Féminin"; ?></td>
            <td><?php echo $client['ville']; ?></td>
            <td><?php echo $client['loisir']; ?></td>
            <td>
                <a href="/mini_project/edit_client.php?id=<?php echo $client['id']; ?>">
                    Modifier
                </a>
            </td>
            <td>
                <a href="/mini_project/delete_client.php?id=<?php echo $client['id']; ?>">
                    Supprimer
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br />
    <h2>Ajouter un nouveau client</h2>
    <form action="#" onsubmit="handle_submit(event)" method="POST">
        <input id="nom" name="nom" placeholder="Nom du client" required />
        <input id="prenom" name="prenom" placeholder="Prénom du client" required />
         <select id="sexe" name="sexe" required>
            <option value="" disabled selected>Sexe du client</option>
            <option value="Masculin">Masculin</option>
            <option value="Féminin">Féminin</option>
        </select>
        <input id="ville" name="ville" placeholder="Ville du client" required />
        <input id="loisirs" name="loisirs" placeholder="Loisirs du client" required />
        <button type="submit" name="submit">
            Ajouter un client
        </button>
    </form>

    <a href="logout.php">
        Se déconnecter
    </a>

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