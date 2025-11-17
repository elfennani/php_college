<?php 
include "init_db.php";
if(!isset($_GET['id'])) {
    die("ID du client non spécifié.");
}

$id = intval($_GET['id']);
$query = pg_prepare($dbconn, "delete_client", "DELETE FROM client WHERE id = $1");
$result = pg_execute($dbconn, "delete_client", array($id));
if($result) {
    header("Location: client.php");
} else {
    echo "Erreur lors de la suppression du client.";
}