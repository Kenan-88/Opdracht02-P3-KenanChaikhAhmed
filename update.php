<?php
// echo $_GET['Id'];
// Voeg de verbindingsgegevens toe in config.php
require('config.php');

// Maak de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo =  new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding met de database";
    } else {
        echo "Interne server-error";
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // var_dump($_POST);
    // Maak een sql update-query en vuur deze af op de database

    try {
        $sql = "UPDATE pizaaBestelling
                SET formaat = :format,
                    saus = :saus,
                    topping = :topping,
                    kruiden = :kruiden
                WHERE  Id = :id";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':format', $_POST['format'], PDO::PARAM_STR);
        $statement->bindValue(':saus', $_POST['saus'], PDO::PARAM_STR);
        $statement->bindValue(':topping', $_POST['topping'], PDO::PARAM_STR);
        $statement->bindValue(':kruiden', implode(",", $_POST['kruiden']), PDO::PARAM_STR);
        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

        $statement->execute();

        echo "Het updaten is gelukt";
        header('Refresh:3; url=read.php');

    } catch(PDOException $e) {
        echo "Het updaten is niet gelukt";
        header('Refresh:3; url=read.php');
    }    
    // Stuur de gebruiker door naar de read.php pagina voor het overzicht met een header(Refresh) functie;
    exit();
}

// Maak een sql-query voor de database
$sql = "SELECT id
                ,formaat
                ,saus
                ,topping
                ,kruiden
        FROM  pizaaBestelling 
        WHERE Id = :Id";        

// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// Voer de query uit
$statement->execute();

// Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);

// var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>maakzelfjepizza</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <main class="container">
      <form method="post" class="form-inline">
        <input type="text" name="id" value="<?= $result->id?>" hidden>
        <div class="form-group">
          <label for="format">Bodemformaat</label>
          <select id="format" name="format" class="form-control">
            <option value="20">Maak je keuze</option>
            <option value="20">20cm</option>
            <option value="25">25cm</option>
            <option value="30">30cm</option>
            <option value="35">35cm</option>
            <option value="40">40cm</option>
            <option value="40">40cm</option>
          </select>
        </div>
        <label for="saus">Saus</label>
        <select id="saus" name="saus" class="form-control">
          <option value="">Saus</option>
          <option value="tomatensaus">Tomatensaus</option>
          <option value="extraTomatensaus">Extra tomatensaus</option>
          <option value="spicy">Spicy tomatensaus</option>
          <option value="bbq">BBQ saus</option>
          <option value="creme">Creme fraiche</option>
        </select>
        <label for="topping">Pizzatoppings</label>
        <label for="vegan">
          <input type="radio" name="topping" id="vegan" value="vegan" />
          vegan</label
        >
        <label for="vegetarisch">
          <input
            type="radio"
            name="topping"
            id="vegetarisch"
            value="vegetarisch"
          />
          vegetarisch</label
        >
        <label for="vlees">
          <input type="radio" name="topping" id="vlees" value="vlees" />
          vlees</label
        >
        <label for="kruiden">kruiden</label>
        <label for="peterselie">
          <input
            type="checkbox"
            name="kruiden[]"
            id="peterselie"
            value="peterselie"
          />
          Peterselie</label
        >
        <label for="oregano">
          <input type="checkbox" name="kruiden[]" id="oregano" value="oregano" />
          Oregano</label
        >
        <label for="chili-flakes">
          <input
            type="checkbox"
            name="kruiden[]"
            id="chili-flakes"
            value="Chili flakes"
          />
          Chili flakes</label
        >
        <label for="zwarte-peper">
          <input
            type="checkbox"
            name="kruiden[]"
            id="zwarte-peper"
            value="zwarte peper"
          />
          zwarte peper</label
        >
        <button type="submit">Bestel</button>
      </form>
    </main>
  </body>
</html>
