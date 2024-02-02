<?php 

class HeroesManager {

    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    // public function addHeros($Hero)
    // {
    //     $prepareSQL = $this->connexion->prepare('INSERT INTO heros (id, name, health_points, attack, image) VALUES (?, ?, ?, ?, ?)');
    //     $prepareSQL->execute([
    //         $Hero->getId(),
    //         $Hero->getName(),
    //         $Hero->getHP(),
    //         $Hero->getAttack(),
    //         $Hero->getURL(),
    //     ]);
    // }

    public function getHero()
    {
        $prepareSQL1 = $this->connexion->prepare('SELECT * FROM heros');
        $prepareSQL1->execute();
        $Heroslist = $prepareSQL1->fetchAll(PDO::FETCH_ASSOC);

        $Heros = [];

        foreach ($Heroslist as $Herolist) {
            $Hero = new Hero($Herolist['name'], $Herolist['health_points'], $Herolist['attack'], $Herolist['image'],$Herolist['weapon']);
            $Hero->setId($Herolist['id']);
            array_push($Heros, $Hero);
        }

        return $Heros;
    }

    public function getHeroByID($id){

       $ID_Hero_Select = $this->connexion->prepare('SELECT * FROM heros WHERE heros.id = ?');
       $ID_Hero_Select->execute([$id]);
       $HeroSelect = $ID_Hero_Select->fetch(PDO::FETCH_ASSOC); 
       
       $Hero = new Hero($HeroSelect['name'], $HeroSelect['health_points'], $HeroSelect['attack'], $HeroSelect['image'],$HeroSelect['weapon']);
       $Hero->setId($HeroSelect['id']);
       return $Hero;
       
    }
}