<?php

class Character
{
    public $name;
    public $class;
    public $tribe;
    public $health = 100;
    public $strength = 10;
    public $mana = 10;

    public function __construct($n, $c, $t)
    {
        $this->name = $n;
        $this->class = $c;
        $this->tribe = $t;

        $this->init();
    }

    private function init()
    {
        if ($this->class == 'Guerrier') {
            $this->strength = 30;
        } else if ($this->class == 'Mage') {
            $this->mana = 30;
        } else if ($this->class == 'Chasseur') {
            $this->strength = 20;
            $this->mana = 20;
        }
    }

    public function image()
    {
        // img/guerrier.jpg
        return 'img/'.strtolower($this->class).'.jpg';
    }

    public function generateName()
    {
        $names = ['Toto', 'Titi', 'Tata'];

        $this->name = $names[rand(0, 2)];
    }

    public function hasErrors()
    {
        return !empty($this->errors());
    }

    public function errors()
    {
        $errors = [];

        if (empty($this->name)) {
            $errors[] = 'Veuillez choisir un nom ou en générer un aléatoire.';
        }

        if (empty($this->tribe)) {
            $errors[] = 'Veuillez choisir une tribu.';
        }

        if (empty($this->class)) {
            $errors[] = 'Veuillez choisir une classe.';
        }

        return $errors;
    }

    public function save()
    {
        $db = new PDO('mysql:host=localhost;dbname=exercice-sql-1;charset=utf8', 'root', '');
        // $db->prepare......
        // $db->execute....

        echo "INSERT INTO characters (name, tribe, class) VALUES ($this->name, $this->tribe, $this->class)";
    }
}
