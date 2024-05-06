<?php

include "../config/autoloader.php";
include "../config/db.php";

    var_dump($_POST);
    die;

    $HeroesManager = new HeroesManager($connexion);
    // $heros = $HeroesManager->getHeroByID($_POST['hero_id']);
    $heros = $HeroesManager->getHeroByID(1);

    $MonstersManager = new MonstersManager($connexion);
    // $monsters = $MonstersManager->getMonsterByID($_POST['monster_id']);
    $monsters = $MonstersManager->getMonsterByID(1);

    $addfight2 = new CombatManager($connexion);
    $fight2 = $addfight2->fightAJAX($heros, $monsters);

    $HeroesManager->update($heros);
    $MonstersManager->update($monsters);

    // var_dump(json_encode($fight2));
    // die;

    return json_encode($fight2); 

