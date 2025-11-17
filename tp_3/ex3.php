<?php 
if(isset($_GET['note'])){
    $note = intval($_GET['note']);

    echo "Note Saisi: $note <br/>";

    if($note < 0 OR $note > 100){
        echo "Note invalid";
    }elseif($note < 60){
        echo "F";
    }elseif($note < 70){
        echo "D";
    }elseif($note < 80){
        echo "C";
    }elseif($note < 90){
        echo "B";
    }else{
        echo "A";
    }
}
?>

<form action="#" method="get">
    <input name="note" placeholder="Saisir une note..." />
    <button type="submit">
        Confirmer
    </button>
</form>