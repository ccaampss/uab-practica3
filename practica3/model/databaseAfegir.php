<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php

  // Busquem l'ID de l'usuari dins la nostra base de dades, que es diu usuaris
  function getUserById($userID, $pdo)
  {
    $sql = "SELECT * FROM usuaris WHERE id = :userID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['userID' => $userID]);
    $user = $stmt->fetch();
    if ($user) {
      return $user;
    }
  }

  //Afegim a la taula Habilidades l'habilitat que ha afegit l'usuari
  function add_habilidat($habilidad, $nivell, $pdo, $id)
  {

    $sql = 'INSERT INTO Habilidades (habilidad, nivelHabilidad, usuario_ID) 
  VALUES(:habilidat, :nivell, :id)';

    $statement = $pdo->prepare($sql);
    $statement->execute([
      ':habilidat' => $habilidad,
      ':nivell' => $nivell,
      ':id' => $id
    ]);
    return true;
  }

  //Afegim a la taula idiomas l'idioma que ha afegit l'usuari
  function add_idioma($idioma, $nivell, $id, $pdo)
  {

    $sql = 'INSERT INTO Idiomas (idioma, nivelIdioma, usuario_ID) 
  VALUES(:idioma, :nivell, :id)';

    $statement = $pdo->prepare($sql);
    $statement->execute([
      ':idioma' => $idioma,
      ':nivell' => $nivell,
      ':id' => $id
    ]);
    return true;
  }

  //Afegim a la taula Informatica l'habilitat informàtica que ha afegit l'usuari
  function add_informatica($informatica, $nivell, $id, $pdo)
  {

    $sql = 'INSERT INTO Informatica (informatica, nivelInformatica, usuario_ID) 
  VALUES(:informatica, :nivell, :id)';

    $statement = $pdo->prepare($sql);
    $statement->execute([
      ':informatica' => $informatica,
      ':nivell' => $nivell,
      ':id' => $id
    ]);
    return true;
  }

  //Afegim a la taula competencias la competència que ha afegit l'usuari
  function add_competencias($competencia, $id, $pdo)
  {

    $sql = 'INSERT INTO competencias (competencia, usuario_ID) 
  VALUES(:competencia, :id)';

    $statement = $pdo->prepare($sql);
    $statement->execute([
      ':competencia' => $competencia,
      ':id' => $id
    ]);
    return true;
  }

  ?>
</body>

</html>