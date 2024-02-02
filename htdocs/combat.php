<?php
session_start();
require_once './config/autoloader.php';
// require_once "./config/debug.php";
require_once "./config/db.php";
include "./config/message.php";

$SelectHeroID = new HeroesManager($connexion);
$hero = $SelectHeroID->getHeroByID($_POST['hero_id']) ;

$SelectMonsterID = new MonstersManager($connexion);
$Monster = $SelectMonsterID->getMonsterByID($_POST['monster_id']);

$addfight = new CombatManager($connexion);
$fight = $addfight->fight($hero,$Monster);

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

        <div class="case1 h-100 col-4">
            <div class="row h-50 align-items-center"> 
                <h1>action heros</h1>

                    <?php
                    foreach ($fight['hero'] as $key) {?> 
                    <div class="bg-success">
                        <?=$key . "<br>";?>
                    </div>   
                <?php } 
                    ?>

            </div>

            <!-- COTER GENTIL -->

            <div class="row h-50  align-items-center"> 
                <div class="mb-5">
                    <p class=" text-success fs-3 fw-bold"><?=$hero->getName()?></p>
                    <img id="hero" src="./images/<?=$hero->getURL()?>" width="300px"> 
                    <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="<?=$hero->getHP()?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-success" style="width: <?=$hero->getHP()?>%"><?=$hero->getHP()?> PV</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-2 H-100 d-flex justify-content-center align-items-center" >
            <button type="button" id="fight" class="btn btn-danger">Danger</button>
        </div>

        <div class="case2 h-100 col-4">

        
                <!-- COTER MECHANT  -->
            <div class="row h-50  align-items-center"> 
                <div class="mt-5">
                <div class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="<?=$Monster->getHealth_points()?>" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-danger" style="width: <?=$Monster->getHealth_points()?>%"><?=$Monster->getHealth_points()?> PV</div>
                    </div>

                    <p class="fs-2 fw-bold"><?=$Monster->getName()?></p>
                    <img id="mechant_combat" src="./images/<?=$Monster->getImage()?>">
                </div>
            </div>


            <div class="row h-50  align-items-center"> 
                <h1>action mechant</h1>

                <?php
                foreach ($fight['monster'] as $key) {?> 
                <div class="bg-danger">
                    <?=$key . "<br>";?>
                </div>   
                <?php } 
                    ?>

            </div>
        </div>

    </section>

    <script src="./JS/script.js"></script>
</body>
</html>