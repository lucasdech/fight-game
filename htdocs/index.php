<?php
session_start();
require_once './config/autoloader.php';
// require_once "./config/debug.php";
require_once "./config/db.php";
include "./config/message.php";

// $PlayerManager = new PlayersManager($connexion);
// $players = $PlayerManager->getPlayer();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GO GAME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style_index.css">
</head>
 

<form action="./process/logout.php">
    <button class="btn btn-danger" type="submit"><p>deconnexion de session</p></button>

</form> 

<body id="fond">


    <section class="container bigBox d-flex justify-content-center align-items-center">

    <div class="col col-6 box">

        <div class="title row mb-5 ">
            <div class="tittle d-flex justify-content-center text-white">
            <h1>HERO FIGHT</h1>
            </div>        
        </div>

        <div class="formConnexion connexion col d-flex justify-content-center align-items-center">
            <form action="./process/process_login.php" method="post">
                <div class="mb-2 d-flex justify-content-center">
                    <h2 class="text-white">Pseudo</h2>
                </div>
                <div class="mb-5 row">
                    <input type="pseudo" class="form-control" name="pseudo" id="pseudo" placeholder="tape your name">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-outline-light">START</button> 
                </div>
            </form>
        </div>

    </div>   

    </section>




<script src="./JS/script.js"></script>
</body>
</html>