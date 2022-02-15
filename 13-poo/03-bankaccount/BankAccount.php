<?php

class BankAccount
{
    public $identifier;
    public $owner;
    private $amount;

    public function __construct($identifier, $owner, $amount = 0)
    {
        $this->identifier = $identifier;
        $this->owner = $owner;
        $this->amount = $amount;
    }

    public function getBalance()
    {
        return $this->owner.' a '.$this->amount.' €';
    }

    public function depositMoney($add)
    {
        if ($add < 0) {
            echo 'Pas de dépôt négatif';
        } else {
            $this->amount += $add;
        }

        return $this->amount;
    }

    public function withdrawMoney($remove)
    {
        // On vérifie si on peut faire le retrait
        if ($this->amount - $remove < 0) {
            echo 'Pas de retrait possible';
        } else {
            $this->amount -= $remove;
        }

        return $this->amount;
    }
}
