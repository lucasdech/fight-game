<?php

class CombatManager {

    private $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }


    public function fight(Hero $Hero, Monster $Monster)
    {
        $fight = [
            'hero' => [],
            'monster' => [],
        ];

        while ($Hero->getHP() > 0 || $Monster->getHealth_points() > 0) {
            
            $Monster->hit($Hero);
            array_push($fight['monster'], $Monster->getName() . " tape et inflige " . $Monster->getAttack() . " degat");
            $Hero->hit($Monster);
            array_push($fight['hero'],  $Hero->getName() . " tape et inflige "  . $Hero->getAttack() . " degat");
        }
        return $fight;
    }

}