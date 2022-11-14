<?php
//Conexió de la db

require_once 'model/config.php';
require_once 'model/database.php';

session_start();

$userInput = (isset($_POST['user'])) ? $_POST['user'] : "";
$password = (isset($_POST['password'])) ? $_POST['password'] : "";
$nom = (isset($_POST['nom'])) ? $_POST['nom'] : "";
$cognoms = (isset($_POST['cognoms'])) ? $_POST['cognoms'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";

if (empty($userInput) || empty($password) || empty($nom) || empty($cognoms) || empty($email)) {
    header("Location: registre.php?error=2");
    exit;
}


$user = seleccionaUsuari($conn, $userInput);
if ($user) {
    header("Location: registre.php?error=alreadyExists");
    exit;
}
if (revisaSiEmailAgafat($email, $conn)) {
    header("Location: registre.php?error=emailAlreadyExists");
    exit;
}

// Creeem l'usuari
$result = insertemUsuari($conn, $userInput, $password, $nom, $cognoms, $email);
if (!$result) {
    header("Location: registre.php?error=problemCreatingUser");
    exit;
}

// Envia gmail de benvinguda
$to = $email;
$subject = "Hola :)";
$message = "Benvingut a la meva pàgina web:).";
$from = "annacampsromero@gmail.com";
$headers = "From:" . $from;

mail($to, $subject, $message, $headers);


$_SESSION['user'] = $result;
header("Location:index.php");
exit;
