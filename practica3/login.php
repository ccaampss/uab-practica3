<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/global.css">

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
            min-width: 50%;
            width: fit-content;
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

        .input {
            border: solid 1px black;
            /*Color de la vora d'on s'escriu*/
            border-radius: 10px;
            /*Vora d'on escrius*/
            padding: 10px;
            /*Mida d'on escrius*/
            /*Llargada d'on escrius*/
            width: 94%;
        }

        .footer {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .botoEnviar {
            background-color: white;
            font-family: 'Poppins';
            border-bottom: 1px solid black;
            cursor: pointer;
        }

        .botoRegistre {
            text-decoration: none;
            color: black;
            font-family: 'Poppins';
            padding: 0 10px;
            border-radius: 10px;
            background-color:#F3B63A;
        }

        @media only screen and (max-width: 600px) {

            .formulari {
                width: 90vw;
            }
        }
    </style>
</head>

<body>
    <form action="./controller/valida.php" method="POST" class="formulari">
        <h1>Curriculum Vitae</h1>
        <h3>Inicia sessió</h3>

        <?php

        // Errors del formulari
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'unfilled') {
                echo "Has d'omplir els dos camps";
            } else if ($_GET['error'] === '1') {
                echo "Has d'escriure un usuari!";
            } else if ($_GET['error'] === '2') {
                echo "Has d'escriure una contrasenya";
            } else if ($_GET['error'] === '3') {
                echo "La contrasenya és incorrecta";
            } else if ($_GET['error'] === 'wrongUser') {
                echo " Aquest usuari no existeix";
            } else if ($_GET['error'] === 'wrongUser') {
                echo " Aquest usuari no existeix";
            } else {
                echo 'Oupssss, alguna cosa no ha anat bé!';
            }
        } ?>

        <!--Formulari per poder iniciar la sessió -->
        <p>Nom d'usuari:</p> 
        <input type="text" class="input" name="user">
        <p>Contrasenya:</p> 
        <input type="password" class="input" name="password" maxlength="8">
        <div class='footer'>
            <input type="submit" class="botoEnviar" value="Envia">
            <a href="registre.php" class="botoRegistre">No tens compte? Registra't</a>
        </div>
    </form>
</body>

</html>