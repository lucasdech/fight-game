<?php
session_start();
require_once '../config/autoloader.php';
// require_once "../config/debug.php";
include "../config/message.php";


if (!empty ($_POST["pseudo"])){
    

    require_once "../config/db.php";

   
    $PlayerManager = new PlayersManager($connexion);
    $player = $PlayerManager->getPlayer($_POST["pseudo"]);
   
    if ($player) {
        
        $_SESSION["pseudo"] = $_POST["pseudo"];
    
         header('Location: ../choose.php?success=Vous êtes bien connecté !');
        //  exit();

} else {
    $PlayerManager = new PlayersManager($connexion);
    $players = $PlayerManager->addPlayer($_POST["pseudo"]);

    header('Location: ../choose.php?success=Votre pseudo a été créé !');
    // exit();
}
}

echo json_encode($players);

?>




