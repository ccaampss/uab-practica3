<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <title>Pràctica 3</title>
    <style>
        body {
            font-family: 'Poppins';
            /*Lletra*/
            background-color: #c9ada1;
            /*Color de fons*/
            display: grid;
            place-items: center;
            height: 100vh;
        }

        .formulari {
            width: 50%;
            /*Mida del quadrat*/
            background-color: white;
            /*Color del quadrat*/
            border-radius: 20px;
            /*Vora del quadrat*/
            padding: 50px;
            color: black;
            /*Color de les lletres*/
            font-size: 0.8em;
            /*Mida de les lletres*/
        }

        input,
        textarea {
            outline: none;
            /*Treu la vora als botons*/
            border: 1px;
            /*Mida de la vora dels botons*/
        }

        .nom {
            border: solid 1px black;
            /*Color de la vora d'on s'escriu*/
            border-radius: 10px;
            /*Vora d'on escrius*/
            padding: 10px;
            /*Mida d'on escrius*/
            width: 94%;
            /*Llargada d'on escrius*/
        }

        .user {
            border: solid 1px black;
            /*Color de la vora d'on s'escriu*/
            border-radius: 10px;
            /*Vora d'on escrius*/
            padding: 10px;
            /*Mida d'on escrius*/
            width: 94%;
            /*Llargada d'on escrius*/
        }

        .contrasenya {
            border: solid 1px black;
            /*Color de la vora d'on s'escriu*/
            border-radius: 10px;
            /*Vora d'on escrius*/
            padding: 10px;
            /*Mida d'on escrius*/
            width: 94%;
            /*Llargada d'on escrius*/
        }

        .email {
            border: solid 1px black;
            /*Color de la vora d'on s'escriu*/
            border-radius: 10px;
            /*Vora d'on escrius*/
            padding: 10px;
            /*Mida d'on escrius*/
            width: 94%;
            /*Llargada d'on escrius*/
        }

        .cognoms {
            border: solid 1px black;
            /*Color de la vora d'on s'escriu*/
            border-radius: 10px;
            /*Vora d'on escrius*/
            padding: 10px;
            /*Mida d'on escrius*/
            width: 94%;
            /*Llargada d'on escrius*/
        }

        .botoRegistre {
            margin: 20px 0 0 0;
            /*Posició paraula enviar*/
            color: black;
            /*Color paraula enviar*/
            background-color: white;
            /*Color de fons enviar*/
            font-family: 'Poppins';
            /*Lletra*/
            border-bottom: 1px solid black;
            /*Subratllat*/
            margin-right: 30%;
            cursor: pointer;
        }

    </style>
</head>

<body>

    <form action="alta.php" method="post" class="formulari">

        <h1>Crea't un compte</h1>


        <?php
        //Error del formulari
        
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'emailAlreadyExists') {
                echo "Aquest email ja està registrat";
            } else if ($_GET['error'] === 'alreadyExists') {
                echo "Aquest usuari ja està registrat";
            } else if ($_GET['error'] === 'problemCreatingUser') {
                echo 'Hi ha hagut un problema creant el teu usuari';
            } else if ($_GET['error'] === '3') {
                echo 'La contrasenya no és correcta';
            } 
        }
        ?>

        <p>Nom:</p> <input type="text" class="nom" name="nom">
        <p>Cognoms:</p> <input type="text" class="cognoms" name="cognoms">
        <p>Email:</p> <input type="email" class="email" name="email">
        <p>Nom d'usuari:</p> <input type="text" class="user" name="user">
        <p>Contrasenya:</p> <input type="password" maxlength="8" class="contrasenya" name="password">
        <input type="submit" class="botoRegistre" value="Registra't">
    </form>

</html>