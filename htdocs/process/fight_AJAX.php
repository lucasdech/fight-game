<?php

include "../config/autoloader.php";
include "../config/db.php";

if (!empty($_POST['hero_id']) && !empty($_POST['monster_id'])){

    $HeroesManager = new HeroesManager($connexion);
    $heros = $HeroesManager->getHeroByID($_POST['hero_id']);

    $MonstersManager = new MonstersManager($connexion);
    $monsters = $MonstersManager->getMonsterByID($_POST['monster_id']);

    $addfight2 = new CombatManager($connexion);
    $fight2 = $addfight2->fightAJAX($heros,$monsters);


    $HeroesManager->update($heros);
    $MonsterManager->update($monsters);

        
    $HeroesManager->update($heros);
    $MonstersManager->update($monsters);

    echo json_encode($fight2);
}
