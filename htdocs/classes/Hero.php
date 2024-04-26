<?php

class Hero {

    private $id;
    private string $name;
    private int $healts_points;
    private int $attack;
    private string $URL_image;
    private string $weapon;

    public function __construct(string $name, int $healts_points, int $attack, string $URL_image, string $weapon)
    {
        $this->name = $name;
        $this->healts_points = $healts_points;
        $this->attack = $attack;
        $this->URL_image = $URL_image;
        $this->weapon = $weapon;
    }

    public function info(){
        echo $this->URL_image . " " . $this->name . " " . $this->healts_points . " " . $this->attack . " " . $this->weapon;
    }

    public function hit($Monster){

        $Monster->setHealth_points($Monster->getHealth_points() - $this->getAttack());
    }
    // getter 

    public function getId() {
        return $this->id;
    } 
    public function getName() {
        return $this->name;
    }
    public function getHP() {
        return $this->healts_points;
    }
    public function getAttack() {
        return $this->attack;
    }
    public function getURL() {
        return $this->URL_image;
    }
    public function getWeapon() {
        return $this->weapon;
    }

    // setter 


    public function setId($id){
        $this->id = $id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setHP($healts_points){
        $this->healts_points = $healts_points;
    }
    public function setAttack($attack){
        $this->attack = $attack;
    }
    public function setURL($URL_image){
        $this->URL_image = $URL_image;
    }
    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }
    
}
