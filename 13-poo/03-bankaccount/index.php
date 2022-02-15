<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compte en Banque</title>
</head>
<body>
    <?php
        require 'BankAccount.php';

        $bankAccount01 = new BankAccount(123456, 'Matthieu'); // Matthieu a 0 sur son compte
        echo $bankAccount01->getBalance(); // Renvoie 0
        $bankAccount01->depositMoney(1000); // Matthieu a 1000 sur son compte
        echo $bankAccount01->getBalance(); // Renvoie 1000
        $bankAccount01->withdrawMoney(1500); // Matthieu a 0 sur son compte
        echo $bankAccount01->getBalance();
        
        // On renvoie une erreur si le montant du compte tombe en dessous de 0
        $bankAccount01->withdrawMoney(1000);
        $bankAccount01->depositMoney(-2000);
        echo $bankAccount01->getBalance();
    ?>
</body>
</html>
