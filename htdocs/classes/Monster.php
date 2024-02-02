<?php

class Monster {

    private $id;
    private $name;
    private $health_points;
    private $attack;
    private $image;


public function __construct(string $name, int $health_points, $attack, $image){
    $this->name = $name;
    $this->health_points = $health_points;
    $this->attack = $attack;
    $this->image = $image;

}

public function info(){
    echo $this->name . " " . $this->health_points . " " . $this->attack . " " . $this->image;
}

public function hit(){
    // action pout hit
}


//on creer les getters et les setters

    // GETTER
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getHealth_points(){
        return $this->health_points;
    }
    public function getAttack(){
        return $this->attack;
    }
    public function getImage(){
        return $this->image;
    }

    // SETTER
    
    public function setId($id){
        $this->id =$id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setHealth_points($health_points){
        $this->health_points = $health_points;
    }
    public function setAttack($attack){
        $this->attack = $attack;
    }
    public function setImage($image){
        $this->image = $image;
    }
}