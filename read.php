<?php
 /**
  * Maak een verbinding met de mysql-server en database
  */
  require('config.php');

  // Maak een data sourcename string
  $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

  try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "De verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
  } catch(PDOException $e) {
    echo $e->getMessage();
  }

/**
 * Maak een select query die alle records uit de tabel Persoon haalt
 */
  $sql = "SELECT id
                ,formaat
                ,saus
                ,topping
                ,kruiden
          FROM pizaaBestelling";

  // Maak de sql-query gereed om te worden uitgevoerd op de database
  $statement = $pdo->prepare($sql);

  // Voer de sql-query uit op de database
  $statement->execute();

  // Zet het resultaat in een array met daarin de objecten (records uit de tabel Persoon)
  $result = $statement->fetchAll(PDO::FETCH_OBJ);

  // Even checken wat we terugkrijgen
//   var_dump($result);

  $rows = "";
  foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->id</td>
                <td>$info->formaat</td>
                <td>$info->saus</td>
                <td>$info->topping</td>
                <td>$info->kruiden</td>
                <td>
                    <a href='delete.php?Id=$info->id'>
                        <img src='img/b_drop.png' alt='kruis' style='width: 60%'>
                    </a>
                </td>
                <td>
                    <a href='update.php?Id=$info->id'>
                        <img src='img/b_edit.png' alt='potlood' style='width: 100%'>
                    </a>
                </td>
              </tr>";
  }
  

// var_dump($rows);

?>

    <table border='1'>
        <thead>
            <th>Id</th>
            <th>Voornaam</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>Haarkleur</th>
            <th>Delete</th>
            <th></th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>
    <a href="form.php">Create record</a>
</body>
</html>

