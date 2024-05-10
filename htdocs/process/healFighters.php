<?php 

include "../config/autoloader.php";
include "../config/db.php";

$HeroHPNEW = new HeroesManager($connexion);
$HeroHPNEW->healHeroLowHp();

$MonsterHPNEW = new MonstersManager($connexion);
$MonsterHPNEW->healMonsterLowHp();

header("Location: ../index.php");