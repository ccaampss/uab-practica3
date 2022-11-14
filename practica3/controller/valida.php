<?php
// Valida l'usuari i la contrasenya a l'hora d'iniciar la sessió

require_once '../model/config.php';
require_once '../model/database.php';


$userInput = (isset($_POST['user'])) ? $_POST['user'] : "";
$password = (isset($_POST['password'])) ? $_POST['password'] : "";


if (empty($userInput) || empty($password)) {
    header('Location: index.php?error=unfilled');
    exit;
}

$user = seleccionaUsuari($conn, $userInput);
 var_dump($user);


  if (!$user) {
      header('Location: ../login.php?error=wrongUser');
      exit;
  }

  $passwordCorrect = validaContrasenya($password,$user['password']);
  if($passwordCorrect){
    session_start();
    $_SESSION['user'] = $user;
    header('Location: ../');
  } else{
    echo 'Les contrasenyes no són les mateixes';
    header('Location: ../login.php?error=3');    
  }
