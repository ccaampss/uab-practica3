<?php
// Definició de l’usuari, contrasenya, el nom de la db i el host 

$host = 'mysql-annacamps.alwaysdata.net';
$db = 'annacamps_cv';
$user = 'annacamps_aina';
$password = 'ainaainaaina123';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 

catch (PDOException $e) {
    echo "La connexió ha fallat: " . $e->getMessage();
}

?>