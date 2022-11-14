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
    //Borrar Habilidades
    function delete_habilidades($id, $pdo)
    { // Extreure una habilitat de la taula
    $sql = "DELETE FROM Habilidades WHERE usuario_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();


    }

    //Borrar idiomes
    function delete_idiomes($id, $pdo)
    { // Extreure un idioma de la taula
    $sql = "DELETE FROM `Idiomas` WHERE usuario_ID = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

  
    }

    //Borrar informatica
    function delete_informatica($id, $pdo)
    {
    $sql = "DELETE FROM Informatica WHERE usuario_ID = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    }  

    //Borrar competencias
    function delete_competencies($id, $pdo)
    {
      $sql = "DELETE  FROM competencias WHERE usuario_ID = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":id", $id);
      $stmt->execute();

    }

  ?>