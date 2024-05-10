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

    public function fightAJAX(Hero $Hero, Monster $Monster)
    {
        $fight2 = [
            'hero' => [],
            'monster' => [],
            'hitHERO' => [],
            'hitMONSTER' => [],
            'HPhero' => [],
            'HPmonster' => [],
        ];
        
        
        $Monster->hit($Hero);
        $Hero->hit($Monster);

        array_push($fight2['hero'],  $Hero->getName() . " tape et inflige "  . $Hero->getAttack() . " degat");
        array_push($fight2['hitHERO'], $Hero->getAttack());
        array_push($fight2['HPhero'], $Hero->getHP());
        
        array_push($fight2['monster'], $Monster->getName() . " tape et inflige " . $Monster->getAttack() . " degat");
        array_push($fight2['hitMONSTER'], $Monster->getAttack());
        array_push($fight2['HPmonster'], $Monster->getHealth_points());

     return $fight2;
    }


}

    