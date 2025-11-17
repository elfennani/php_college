<?php 
$nom = "Nizar";
$age = 23;
$ville = "Alhoceima";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <!-- Par tableau -->
    <table>
        <tr>
            <th>Nom</th>
            <th>Age</th>
            <th>Ville</th>
        </tr>
        <tr>
            <td><?=$nom; ?></td>
            <td><?=$age; ?></td>
            <td><?=$ville; ?></td>
        </tr>
    </table>
    <!-- Par <ul> -->
    <ul>
        <li>Nom: <?=$nom; ?></li>
        <li>Age: <?=$age; ?></li>
        <li>Ville: <?=$ville; ?></li>
    </ul>
</body>
</html>