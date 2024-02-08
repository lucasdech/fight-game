<?php

class MonstersManager {

    private $connexion;

    public function __construct($connexion)
    {  
        $this->connexion = $connexion;
    }

    // public function addMonster($monster){

    // $prepareRequest = $this->connexion->prepare("INSERT INTO boss (name, health_points, attack, image) VALUES (?,?,?,?)");
    // $prepareRequest->execute([
    //      $monster->getmonster()]);
    // }

    public function getmonster(){
        $prepareRequest = $this->connexion->prepare('SELECT * FROM boss');    
        $prepareRequest->execute();
        $monsterArray = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);

        $monsters = [];

        foreach ($monsterArray as $keyArray1) {

            $monster = new Monster($keyArray1['name'], $keyArray1['health_points'], $keyArray1['attack'],$keyArray1['image'], $keyArray1['weapon'] );
            $monster->setId($keyArray1['id']);
            array_push($monsters, $monster);

        }

        return $monsters;

    }

    public function getMonsterByID($id){

        $ID_Monster_Select = $this->connexion->prepare('SELECT * FROM boss WHERE boss.id = ?');
        $ID_Monster_Select->execute([$id]);
        $MonsterSelect = $ID_Monster_Select->fetch(PDO::FETCH_ASSOC); 
        
        $Monster = new Monster($MonsterSelect['name'], $MonsterSelect['health_points'], $MonsterSelect['attack'], $MonsterSelect['image'], $MonsterSelect['weapon']);
        $Monster->setId($MonsterSelect['id']);
        return $Monster;
        
     }

     public function update(Monster $monster){

         $prepareRequest = $this->connexion->prepare('UPDATE monster SET health_points = ? WHERE id = ?');
         $prepareRequest->execute([
            $monster->getHealth_points(),
            $monster->getId()
         ]);
     }
    
}