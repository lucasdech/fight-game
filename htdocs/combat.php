<?php
session_start();
require_once './config/autoloader.php';
require_once "./config/debug.php";
require_once "./config/db.php";
include "./config/message.php";

    
if (empty($_POST['hero_id']) && empty($_POST['monster_id'])) {
    
 ?>
    <div class="H100">
    <p>choisi 2 personnages stp </p>
       <button class="btn btn-danger"> <a href="./choose.php">retour au choix </a> </button>
    </div>
<?php die; } 


$SelectHeroID = new HeroesManager($connexion);
$hero = $SelectHeroID->getHeroByID($_POST['hero_id']) ;

$SelectMonsterID = new MonstersManager($connexion);
$Monster = $SelectMonsterID->getMonsterByID($_POST['monster_id']);

// echo "<pre>";
// var_dump($hero);
// echo "</pre>";

// echo "<pre>";
// var_dump($hero->getHP());
// echo "</pre>";

// echo "<pre>";
// var_dump($hero->getAttack());
// echo "</pre>";



// echo "<pre>";
// var_dump($Monster);
// echo "</pre>";

// echo "<pre>";
// var_dump($Monster->getHealth_points());
// echo "</pre>";

// echo "<pre>";
// var_dump($Monster->getAttack());
// echo "</pre>";




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
<body>
    

    <section class="combats d-flex justify-content-evenly text-center">

        <div class="case1 h-100 col-3">



            <div class="row h-50 align-items-center" > 
                   <div class="" id="fight-hero"> </div>
            </div>

        

            <!-- COTER GENTIL -->

            <div class="row h-50 align-items-center"> 
                <div class="mb-5">
                    <p class="fs-2 text-success fw-bold"><?=$hero->getName()?></p>
                    <img class="" id="hero" src="./images/<?=$hero->getURL()?>" width="300px">
      
            <!-- FAUSSE BARRE DE VIE  -->

                <div id="lifebar"  class="row progress " role="progressbar" aria-label="Danger example" aria-valuenow="<?=$hero->getHp()?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: ><?=$hero->getHp()?>"><?=$hero->getHp()?> PV</div>
                </div>

                     <!-- boule de feu -->
                     <img id="shuriken" class="shurikenHidden shurikenfilter" src="./images/<?=$hero->getWeapon()?>" alt="" width="150px"> 
                    <!-- boule de feu FIN  -->
                        <div id="vie_Hero">

                        </div> 
                    </div>
                </div>
            </div>
        </div>


            <!-- BOUTON A NE PAS SUPRIMER POUR LES ESSAIES DATA ATTRIBUT  -->

        <div class=" col-2 H-100 d-flex justify-content-center align-items-center">
                <button class=" text-white btn btn-danger" id="fight"
                    data-hero_id="<?=$hero->getId()?>"

                    data-monster_id="<?=$Monster->getId()?>"
                    >

                </button>
                <audio id="coupDePoing" src="./sons/SF-coupoing.mp3"></audio>
       </div>

                        <!-- FIN DU BOUTTON ESSAIE  -->

            <div class="case1 h-100 col-3">

        
                <!-- COTER MECHANT  -->
        
               

            <div class="row h-50 align-items-center" > 
                   <div class="mt-2" id="fight-monster"> </div>

            </div>


        <div class="row h-50  align-items-center"> 
                <div class="">

                    <p class="fs-2 fw-bold"><?=$Monster->getName()?></p>
                    <img id="mechant_combat" src="./images/<?=$Monster->getImage()?>">

                     <!-- FAUSSE BARRE DE VIE  -->
                <div>
                    <div id="lifebar2" class="progress " role="progressbar" aria-label="Danger example" aria-valuenow="<?=$Monster->getHealth_points()?>" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-danger" style="width:<?=$Monster->getHealth_points()?>%"><?=$Monster->getHealth_points()?> PV</div>
                    </div>
                </div>


                    <!-- boule de feu -->
                    <img id="fireBall" class="fireBallHidden fireBallfilter" src="./images/<?=$Monster->getWeapon()?>" alt="" width="150px"> 
                    <!-- boule de feu FIN  -->
                       
                        <div id="vie_Monster">
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>



    <script src="./JS/script.js"></script>
</body>
</html>