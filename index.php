<?php

$db = new PDO(

    'mysql:host=192.168.60.144;dbname=riccardo_merlo_itis;charset=utf8mb4',
    'riccardo_merlo',
    'guidante.predicavo.',
    [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]
);
/*
$query='SELECT * FROM studenti';

try{
    $stmt=$db->prepare($query);
    $stmt->execute();

    while($user=$stmt->fetch()){
        echo"nome: ". $user->nome. "<br>";
        echo"cognome: ". $user->cognome. "<br>";
        echo"media: ". $user->media. "<br>";
        echo"data_iscrizione: ". $user->data_iscrizione. "<br>";
        echo "<hr>";
    }
    $stmt->closeCursor();
}catch (PDOException $e){
    echo"A DB error occurred. Please try again later";
}
*/

$query = 'SELECT media, cognome FROM studenti WHERE nome= :name';

try{
    $stmt=$db->prepare($query);
    $stmt->bindValue(':name','Antonio', PDO::PARAM_STR);
    $stmt->execute();

    while ($user = $stmt-> fetch()){
        echo "cognome: ". $user->cognome. "<br>";
        echo "media: ". $user->media. "<br>";
        echo "<hr>";
    }
    $stmt->closeCursor();
}catch(PDOException $e){
    echo"A dberror";
}

echo "Aggiunta modifica da locale";
