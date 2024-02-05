<?php
 
// include "../config/debug.php";
require_once '../config/autoloader.php';

if (!empty($_POST['pseudo'])) {
    
    require_once '../config/db.php';

    $_SESSION['pseudo'] = $_POST['pseudo'];

    $preparedRequest = $connexion->prepare("SELECT * FROM player WHERE pseudo = ?");
    $preparedRequest->execute([
        $_POST['pseudo'],
    ]);


    $PlayersManager = new PlayersManager($connexion);
    $Player = new Player($_POST['pseudo'],);
    $PlayersManager->addPlayer($Player);
    
    
        header('Location: ../choose.php?');
        die;
    } else {
    header('Location: ../index.php?success=Pseudo enregistré !');
    die;
}