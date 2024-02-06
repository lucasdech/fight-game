<?php
 
// include "../config/debug.php";
require_once '../config/autoloader.php';

    require_once '../config/db.php';
    
    $preparedRequest = $connexion->prepare("SELECT * FROM player WHERE pseudo = ?");
    $preparedRequest->execute([
        
        $user = $preparedRequest->fetch(PDO::FETCH_ASSOC)
        
    ]);
    
    if ($user = $_POST['pseudo']){;

        header('Location: ../choose.php?success=Vous êtes connecté.');

    } else {

        $preparedRequest = $connexion->prepare("INSERT INTO player (pseudo) VALUES (?)");
        $preparedRequest->execute([

            $_POST['pseudo'],

        ]);
        
        header('Location: ../choose.php?success=Pseudo creer.');
    }

