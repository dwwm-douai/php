<?php

class Character
{
    public $id;
    public $name;
    public $class;
    public $tribe;
    public $health = 100;
    public $strength = 10;
    public $mana = 10;
    public static $db;

    public function __construct($n = null, $c = null, $t = null)
    {
        $this->name = $n ?? $this->name;
        $this->class = $c ?? $this->class;
        $this->tribe = $t ?? $this->tribe;

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

    public static function db()
    {
        if (!self::$db) {
            self::$db = new PDO('mysql:host=localhost;dbname=exercice-sql-1;charset=utf8', 'root', '');
        }

        return self::$db;
    }

    public function save()
    {
        $query = self::db()->prepare('INSERT INTO characters (name, tribe, class) VALUES (?, ?, ?)');

        $query->execute([$this->name, $this->tribe, $this->class]);
    }

    public static function all()
    {
        $query = self::db()->query('SELECT * FROM characters');

        return $query->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function find($id)
    {
        $query = self::db()->prepare('SELECT * FROM characters WHERE id = ?');
        $query->execute([$id]);
        $query->setFetchMode(PDO::FETCH_CLASS, self::class);

        return $query->fetch();
    }
}
