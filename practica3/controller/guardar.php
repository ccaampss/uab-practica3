<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../model/config.php';
require_once '../model/databaseAfegir.php';
$userId = $_SESSION['user']['id'];

if (isset($_POST['habilitats'])) {
    add_habilidat($_POST['valor'], $_POST['nivell'], $conn, $userId);
    header('Location: ../');
} elseif (isset($_POST['idiomes'])) {
    //  ($idioma, $nivell, $id, $pdo)
    add_idioma($_POST['idioma'], $_POST['nivelIdioma'], $userId, $conn);
    header('Location: ../');
} elseif (isset($_POST['Informatica'])) {
    add_informatica($_POST['valor'], $_POST['nivell'], $userId, $conn);
    header('Location: ../');
} elseif (isset($_POST['competencies'])) {
    add_competencias($_POST['valor'], $userId, $conn);
    header('Location: ../');
}
