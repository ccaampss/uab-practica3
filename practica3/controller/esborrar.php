<?php
require_once '../model/config.php';
require_once '../model/databaseEliminar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="global.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Pràctica 3</title>

    <script>
        $(document).ready(function() {
            $('div.edit').hide();

            $("#idSeleccion").change(function() {
                $('div.edit').hide();
                $('#' + $(this).val()).show();
            })
        });
        $(document).ready(function() {
            $('div.row').hide();

            $("#idSeccio").change(function() {
                $('div.row').hide();
                $('#' + $(this).val()).show();
            })
        });
    </script>
</head>

<style>
    body {
        background-color: #c9ada1;
    }

    .headerGroc {
        background-color: #F3B63A;
        position: relative;
        width: 100%;
        height: 120px;
        color: white;
        display: flex;
        align-items: center;
    }

    .holaNom {
        font-size: 25px;
        font-family: poppins;
        margin-right: auto;
        margin-left: 50px;
    }

    .iconos {
        display: flex;
        justify-content: space-around;
        margin-right: 50px;
    }

    .botoEditar {
        margin-right: 10px;
    }

    .botoEsborrar {
        background-color: white;
        font-family: 'Poppins';
        border: 1px solid black;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<body>
    <!-- Header de color groc + botó de sortir -->
    <div class="headerGroc">
        <div class="holaNom">Esborrar apartats del CV</div>
        <div class="iconos">
            <form action="../controller/logout.php" method="post">
                <button class="btn btn-outline-light" type="submit">Sortir</button>
            </form>
        </div>
    </div>


    <?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $userId = $_SESSION['user']['id'];

    if (isset($_POST['habilitats'])) {
        delete_habilidades($conn, $userId);
        header('Location: ../');
    } elseif (isset($_POST['idiomes'])) {
        //  ($idioma, $nivell, $id, $pdo)
        delete_idiomes($userId, $conn);
        header('Location: ../');
    } elseif (isset($_POST['Informatica'])) {
        delete_informatica($userId, $conn);
        header('Location: ../');
    } elseif (isset($_POST['competencies'])) {
        delete_competencies( $userId, $conn);
        header('Location: ../');
    }

    ?>

    <!-- Formulari per modificar el CV -->
    <section>
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-black" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mt-4 mb-5">
                                <h2 class="fw-bold mb-4">Escull la secció a borrar</h2>


                                <select id="idSeleccion" class="form-select mb-3" aria-label="Default select example">
                                    <option selected="selected" disabled> Què vols borrar?</option>

                                    <option value="seccions">Seccions</option>
                                    <option value="competencies">Competències</option>

                                </select>

                                <div class="edit form-goup" id="seccions">
                                    <!-- Dins de l'apartat de seccions -->
                                    <div class="pb-2">
                                        <select id="idSeccio" class="form-select mb-3" aria-label="Default select example">
                                            <option selected="selected" disabled> Quina secció vols?</option>
                                            <option value="habilitats">Habilitats</option>
                                            <option value="idiomes">Idiomes</option>
                                            <option value="informatica">Informàtica</option>
                                        </select>

                                    </div>
                                    <div class="edit form-goup" id="competencies">
                                        <form method="POST" action="./controller/guardar.php" class="row pb-3">

                                            <div class="pb-3">
                                                <input type="text" id="competencia" name="valor" class="form-control" placeholder=""></input>
                                            </div>
                                            <form action="../index.php" method="POST" class="formulari">
                                                <button type="submit" class="botoEsborrar">Esborrar</button>
                                            </form>
                                        </form>
                                    </div>


                                </div>

                                <form action="../index.php" method="POST" class="formulari">
                                    <button type="submit" class="botoEsborrar">Esborrar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


</body>

</html>