<?php
session_start();

require_once './config/autoloader.php';
// require_once "./config/debug.php";
require_once "./config/db.php";
// include "./config/message.php";


$HeroesManager = new HeroesManager($connexion);
$heros = $HeroesManager->getHero();

$MonstersManager = new MonstersManager($connexion);
$monsters = $MonstersManager->getmonster();

$PlayerManager = new PlayersManager($connexion);
$players = $PlayerManager->getPlayer();

// var_dump($heros)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose your destiny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/style_choose.css">

</head>
<!-- 
<form action="./process/logout.php">
    <button class="btn btn-danger" type="submit"><p>deconnexion de session</p></button>

</form> -->

<body class="d-flex justify-content-center">

    <section class="container d-flex align-items-center justify-content-center">    

        <div id="bloc_selection" class="col-11">
            
                    <form action="./combat.php" method="post" class=" col-12 d-flex justify-content-around">
                     
                    <!-- la div des heros-->
                    <div class="d-flex flex-column">

                                
                            <label class="" for="deadpool_radio">
                                <input type="radio" id="deadpool_radio" name="hero_id" value="<?=$heros[0]->getId()?>"/>
                                <img id="deadpool" src="./images/<?=$heros[0]->getURL()?>" alt="">
                            </label>
                            

                            <label for="ironman_radio">
                                <input type="radio" id="ironman_radio" name="hero_id" value="<?=$heros[1]->getId()?>" />
                                <img id="ironman" src="./images/<?=$heros[1]->getURL()?>" width="100px" alt="">
                            </label>

                    </div>

                    <!-- la boutton de fight-->  

                        
                            <div class="col-3 d-flex align-items-center m-5">
                                <button id="bouton_choose" class="" type="submit"></button>
                            </div>  
                            
                                
                    <!-- la div des mechants-->       
                    <div class="d-flex flex-column">
                            
                            <label class="" for="contactChoice5">
                                <input type="radio" id="contactChoice5" name="monster_id" value="<?=$monsters[1]->getId()?>" />
                                <img id="bowser" src="./images/<?=$monsters[1]->getImage()?>" width="100px" alt=""> 
                            </label>
                            
                            <label class="mt-5" for="tanos_radio">
                                <input type="radio" id="tanos_radio" name="monster_id" value="<?=$monsters[0]->getId()?>" />
                                <img id="tanos" src="./images/<?=$monsters[0]->getImage()?>" alt="">
                            </label>
                        </div>

                    </form>
                
            
        </div>


    </section>

</body>

</html>