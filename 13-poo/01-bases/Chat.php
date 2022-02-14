<?php

class Chat {
    public $nom;
    public $type;
    public $couleur;
    private $pattes = 4;

    public function __construct($n = null, $t = null, $c = null)
    {
        $this->nom = $n;
        $this->type = $t;
        $this->couleur = $c;
    }

    public function miaule()
    {
        return 'Miaou !';
    }

    public function joueAvec($chat)
    {
        return $this->nom.' joue avec '.$chat->nom;
    }

    public function seBatAvec($chat)
    {
        // Sur 0, $chat perd, $this gagne
        // Sur 1, $chat gagne, $this perd
        $chatGagne = rand(0, 1);

        if ($chatGagne) {
            $this->pattes--;
            return $chat->nom.' a gagné';
        } else {
            $chat->pattes--;
            return $this->nom.' a gagné';
        }
    }

    public function getPattes()
    {
        return $this->pattes;
    }
}
