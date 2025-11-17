<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#">
        <input name="nombre1" type="number" placeholder="Saisir premier nombre..." />
        <input name="nombre2" type="number" placeholder="Saisir deuxieme nombre..." />
        <input name="operation" placeholder="Saisir l'operation (+, -, *, /)..." />
        <button type="submit" name="submit">
            Calculer
        </button>
    </form>
    <?php 
    if(isset($_GET['submit'])) {
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];
        $operation = $_GET['operation'];
        $result = 0;

        switch($operation) {
            case '+':
                $result = $nombre1 + $nombre2;
                break;
            case '-':
                $result = $nombre1 - $nombre2;
                break;
            case '*':
                $result = $nombre1 * $nombre2;
                break;
            case '/':
                if($nombre2 != 0) {
                    $result = $nombre1 / $nombre2;
                } else {
                    echo "Division par zero est impossible.";
                }
                break;
            default:
                echo "Operation invalide.";
                exit;
        }

        echo "$nombre1 $operation $nombre2 = $result";
    }
    ?>
</body>
</html>