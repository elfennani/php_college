<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: monospace;
        }
    </style>
</head>
<body>
    <?php 
    $taille = 10;
    for($i = $taille; $i >= 1; $i--) {
        for($j = 1; $j <= $taille; $j++) {
            if($j <= $taille - $i) 
                echo "&nbsp;";
            else
                echo "**";
        }
        echo "<br/>";
    }
    ?>
</body>
</html>