<?php
session_start();
require_once './config/autoloader.php';
require_once "./config/debug.php";
require_once "./config/db.php";
include "./config/message.php";

    if ((empty($_POST['hero_id']) && empty($_POST['monster_id'])) || empty($_POST['hero_id']) || empty($_POST['monster_id'])) {
    ?>
        
        <div id="Choix_perso" class="" style="height: 100vh; background-size: cover; background-repeat: no-repeat; background-image: url(./images/decors-jeu-combat-1212.gif);">
        
        <button style="text-align: center; color: white;" class="bouttonretour"> <a href="./choose.php">retour au choix des combattants</a> </button>
        
        <br>
        <div style="color: white; font-family: 'Protest Guerrilla', sans-serif; font-size: 30pt; text-align: center;"><p >Choisissez 2 personnages</p></div>
        <p style="color: white; font-family: 'Protest Guerrilla', sans-serif; font-size: 30pt; text-align: center;">pour combattre !</p>
        
        </div>

    <?php die; } 


$SelectHeroID = new HeroesManager($connexion);
$hero = $SelectHeroID->getHeroByID($_POST['hero_id']) ;

$SelectMonsterID = new MonstersManager($connexion);
$Monster = $SelectMonsterID->getMonsterByID($_POST['monster_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIGHT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style/combats_style.css">
</head>
<body class="m-3 mt-5">
    

    <section id="bodynew" class="d-flex justify-content-evenly text-center">

        <div class="col-3">



            <div class="row align-items-center" > 
                   <div class="" id="fight-hero"></div>
            </div>

        

            <!-- COTER GENTIL -->

             <!-- boule de feu -->
             <img id="shuriken" class="z-1 shurikenHidden shurikenfilter" src="./images/<?=$hero->getWeapon()?>" alt="" width="90px"> 
                    <!-- boule de feu FIN  -->
                        <div id="vie_Hero"></div> 



            <div class="row"> 
                <div class="">
                    <p class="fs-2"><?=$hero->getName()?></p>
                    <img class="z-3" id="hero" src="./images/<?=$hero->getURL()?>" width="300px">
      
            <!-- FAUSSE BARRE DE VIE  -->

                <div id="lifebar" >


                </div>

                    
                    </div>
                </div>
            </div>
        </div>


            <!-- BOUTON A NE PAS SUPRIMER POUR LES ESSAIES DATA ATTRIBUT  -->

        <div class=" col-2 H-100 d-flex justify-content-center align-items-center m-5 mb-5">
                <button class=" text-white btn btn-danger" id="fight"
                    data-hero_id="<?=$hero->getId()?>"

                    data-monster_id="<?=$Monster->getId()?>"
                    >

                </button>
                <audio id="coupDePoing" src="./sons/SF-coupoing.mp3"></audio>

                <form action="./process/healFighters.php" class="bntFIN">
                    <button type="submit">Suite</button>
                </form>
       </div>

                        <!-- FIN DU BOUTTON ESSAIE  -->

            <div class="case1 h-100 col-3">

        
                <!-- COTER MECHANT  -->
        
            <div class="row h-50 align-items-end" > 
                   <div class="" id="fight-monster"> </div>
            </div>


        <div class="row h-50  align-items-center"> 
                <div class="">

                    <p class="fs-2"><?=$Monster->getName()?></p>
                    <img id="mechant_combat" src="./images/<?=$Monster->getImage()?>">

                     <!-- FAUSSE BARRE DE VIE  -->
                <div>
                    <div id="lifebar2">

                    </div>
                </div>


                    <!-- boule de feu -->
                    <img id="fireBall" class="fireBallHidden fireBallfilter" src="./images/<?=$Monster->getWeapon()?>" alt="" width="50px"> 
                    <!-- boule de feu FIN  -->
                       
                        <div id="vie_Monster"></div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <script src="./JS/script.js"></script>
</body>
</html>