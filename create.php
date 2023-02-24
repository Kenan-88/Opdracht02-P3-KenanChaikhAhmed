<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }

} catch(PDOException $e) {
    echo $e->getMessage();
}

/**
 * We gaan een insert-query maken voor het wegschrijven van de formuliergegevens
 */
$sql = "INSERT INTO pizaaBestelling (id
                            ,formaat
                            ,saus
                            ,topping
                            ,kruiden)
        VALUES              (NULL
                            ,:format
                            ,:saus
                            ,:topping
                            ,:kruiden);";

// We bereiden de sql-query voor met de method prepare
$statement = $pdo->prepare($sql);

$statement->bindValue(':format', $_POST['format'], PDO::PARAM_STR);
$statement->bindValue(':saus', $_POST['saus'], PDO::PARAM_STR);
$statement->bindValue(':topping', $_POST['topping'], PDO::PARAM_STR);
$statement->bindValue(':kruiden', implode(",", $_POST['kruiden']), PDO::PARAM_STR);

// We vuren de sql-query af op de database

$result = $statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
 