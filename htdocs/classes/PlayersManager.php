<?php


class PlayersManager {

    private $connexion;

    public function __construct($connexion)
    {  
        $this->connexion = $connexion;
    }

    public function addPlayer($player){

    $prepareRequest = $this->connexion->prepare("INSERT INTO player (pseudo) VALUES (?)");
    $prepareRequest->execute([
         $player->getpseudo()]);
    }

    public function getPlayer(){
        $prepareRequest = $this->connexion->prepare('SELECT * FROM player');    
        $prepareRequest->execute();
        $playerArray = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);

        $players = [];

        foreach ($playerArray as $keyArray1) {

            $player = new Player($keyArray1['pseudo']);
            $player->setId($keyArray1['id']);
            array_push($players, $player);

        }

        return $players;

    }



}