<?php

class Owner
{
    public $name;
    public $revenue;
    public $bankAccount;
    public static $count = 0;
    public $count2 = 0;

    public function __construct($n, $r = 1200, $b = null)
    {
        $this->name = $n;
        $this->revenue = $r;
        $this->bankAccount = $b;
        Owner::$count++;
        $this->count2++;
    }

    public function simulateSalary()
    {
        $this->bankAccount->depositMoney($this->revenue);

        return $this;
    }

    public function payInvoice()
    {
        $this->bankAccount->withdrawMoney(500);

        return $this;
    }

    public static function howMany()
    {
        return 'Il y a '.self::$count.' propriétaires. <br>';
    }
}
