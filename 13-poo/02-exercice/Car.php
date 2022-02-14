<?php

class Car
{
    public $brand;
    public $model;
    private $color;
    public $wheel = 4;
    private $fuel = 50;

    public function __construct($b, $m, $c, $w = 4)
    {
        $this->brand = $b;
        $this->model = $m;
        $this->color = $c;
        $this->wheel = 4;
        $this->fuel -= rand(10, 20);
    }

    public function getDetails()
    {
        return $this->brand.' '.$this->model.' de couleur '.$this->color;
    }

    public function repaint($color)
    {
        $this->color = $color;
    }

    public function klaxon()
    {
        return $this->getDetails().' fait tut tut !';
    }

    public function drive()
    {
        $this->fuel -= 2;

        return $this->brand.' '.$this->model.' fait vroom vroom avec '.$this->fuel.'L !';
    }

    public function hasFuel()
    {
        return $this->fuel > 0;
    }
}
