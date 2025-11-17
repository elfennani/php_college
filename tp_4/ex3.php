<?php 

$produit = [
    ["nom" => "PC", "prix" => 5000],
    ["nom" => "Smartphone", "prix" => 3000],
    ["nom" => "Tablette", "prix" => 2000],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th{
            text-align: start;
        }
        table{
            border-collapse: collapse;
        }
        th,td{
            padding: 4px;
        }
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Prix</th>
        </tr>
        <?php 
        foreach($produit as $item) {
            ?>
            <tr>
                <td><?= $item['nom']; ?></td>
                <td><?= $item['prix']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>