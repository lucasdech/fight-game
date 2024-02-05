<?php

        //on creer la classe Player
class Player {
        // on creer ses attributs
    private int $id;
    private string $pseudo;

        // on lance la fonction construct
    public function __construct($pseudo){
        $this->pseudo = $pseudo;
    }
        // on creer la fonction info pour afficher les pseudos
    public function info(){
        echo $this->pseudo;
    }


    // on creer les getters et les setters (dans ce cas dans la base de données on a pseudo et id)

        //  GETTER
    public function getId(){
        return $this->id;
    }
    public function getPseudo(){
        return $this->pseudo;
    }

        //  SETTER
    public function setId($id){
        $this->id = $id;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
}
