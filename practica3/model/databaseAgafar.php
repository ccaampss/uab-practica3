<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/global.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/cv.css">
  <title>Pràctica 3</title>
</head>

<body>
  <?php
  function infoSeccio($row, $nomCamp, $nomNivell)
  { // infoSeccio -> per fer la barra de progres
    echo 
    '<div class="row">
    <div class="col-lg-4">
    <p>' . $row[$nomCamp] . '</p>
    </div>

      <div class="col-lg-8">
          <div class="progress">
              <div class="progress-bar progress-bar-secondary bg-secondary" role="progressbar"aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:' . $row[$nomNivell] . '%">
              
              </div>
          </div>
      </div>
      </div>';
  }

  function get_habilidades($id, $pdo)
  { // Extreure una habilitat de la taula
    $sql = "SELECT * FROM Habilidades WHERE usuario_ID = :id ORDER BY nivelHabilidad DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      infoSeccio($row, "habilidad", "nivelHabilidad");
    }
  }

  function get_idiomes($id, $pdo)
  { // Extreure un idioma de la taula
    $sql = "SELECT * FROM Idiomas WHERE usuario_ID = :id ORDER BY nivelIdioma DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      infoSeccio($row, "idioma", "nivelIdioma");
    }
  }

  function get_informatica($id, $pdo)
  {
    $sql = "SELECT * FROM Informatica WHERE usuario_ID = :id ORDER BY nivelInformatica DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      infoSeccio($row, "informatica", "nivelInformatica");
    }

    function get_competencias($id, $pdo)
    {
      $sql = "SELECT * FROM competencias WHERE usuario_ID = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":id", $id);
      $stmt->execute();

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<p class="alignRow"><span class="fa-solid fa-caret-right"></span>' . $row["competencia"] . '</p>';
      }
    }
  }

  ?>