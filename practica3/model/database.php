<?php
require_once 'config.php';
//Valida que la contrasenya que ha ficat l'usuari i la contrasenya encriptada sigui la mateixa

// Contrasenya encriptada
function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}
function verifyPassword($password, $hash)
{
    return password_verify($password, $hash);
}

function aconsegueixUsuaris($conn)
{
    $query = "SELECT * FROM usuaris";
    $result = $conn->query($query);
    return $result;
}

//Es busca un usuari i el retorna.
function seleccionaUsuari($conn, $user)
{
    $query = "SELECT * FROM usuaris WHERE user = '$user'";
    $result = $conn->query($query);
    return $result->fetch();
}

//Creació d'un nou usuari i el retorna
function insertemUsuari($conn, $user, $password, $nom, $cognoms, $email)
{
    $passwordHashed = hashPassword($password);
    $query = "INSERT INTO usuaris (user, password, nom, cognoms, email) VALUES ('$user', '$passwordHashed', '$nom', '$cognoms', '$email')";
    $result = $conn->query($query);
    if ($result) {
        return seleccionaUsuari($conn, $user);
    }
    return false;
}

function validaContrasenya($passwordInput, $passwordHashed)
{
    return verifyPassword($passwordInput, $passwordHashed);
}

// Revisa si ja hi ha un email igual
function revisaSiEmailAgafat($email, $conn)
{
    $query = "SELECT * FROM usuaris WHERE email = '$email'";
    $result = $conn->query($query);
    return $result->fetch();
}
