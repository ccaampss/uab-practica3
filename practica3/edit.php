<?php
include_once 'model/config.php';
require_once 'model/database.php';
require_once 'model/databaseAfegir.php';
require_once 'model/databaseAgafar.php';
require_once 'utils/allLanguages.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<html lang="es">

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
</style>

<body>
  <!-- Header de color groc + botó de sortir -->
  <div class="headerGroc">
      <div class="holaNom">Apartat d'edició del CV</div>
      <div class="iconos">
        <form action="./controller/esborrar.php" class="botoEditar" method="post">
          <button class="btn btn-outline-light" type="submit">Esborrar</button>
        </form>
        <form action="./controller/logout.php" method="post">
          <button class="btn btn-outline-light" type="submit">Sortir</button>
        </form>
      </div>
    </div>


  <!-- Formulari per modificar el CV -->
  <section>
    <div class="container py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-white text-black" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mt-4 mb-5">
                <h2 class="fw-bold mb-4">Escull la secció a editar</h2>


                <select id="idSeleccion" class="form-select mb-3" aria-label="Default select example">
                  <option selected="selected" disabled> Què vols editar?</option>

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

                  <!-- Seccions-> Apartat d'habilitats -->
                  <div class="row pb-3" id="habilitats">
                    <form method="POST" action="./controller/guardar.php" class="row pb-3">

                      <label>Introdueix una nova habilitat</label>
                      <div class="col-6">
                        <input type="text" name="valor" class="form-control" required />
                      </div>
                      <div class="col-6 pb-3">
                        <input placeholder="Nivell (%)" type="number" id="perSeccio" name="nivell" required class="form-control" maxlength="3" max='100' min='0' />
                      </div>
                      <button class="btn btn-outline-black btn-lg px-5" name="habilitats" type="submit">Guardar</button>
                    </form>
                  </div>

                  <!-- Seccions-> Apartat d'idiomes -->
                  <div class="row pb-3" id="idiomes">
                    <form method="POST" action="./controller/guardar.php" class="row pb-3">
                      <label>Introdueix un nou idioma</label>
                      <div class="col-6">
                        <select name="idioma" class="form-control" required>
                          <?php
                          foreach ($allLanguages as $language) {
                            echo "<option value='$language'>$language</option>";
                          }

                          ?>
                        </select>
                      </div>
                      <div class="col-6 pb-3">
                        <input type="number" id="perSeccio" name="nivelIdioma" class="form-control" required placeholder="Nivell (%)" maxlength="3" max='100' min='0' />
                      </div>
                      <button class="btn btn-outline-black btn-lg px-5" name="idiomes" type="submit">Guardar</button>
                    </form>
                  </div>

                  <!-- Seccions-> Apartat d'informàtica -->
                  <div class="row" id="informatica">
                    <form method="POST" action="./controller/guardar.php" class="row pb-3">

                      <label>Introdueix una nova habilitat informàtica</label>
                      <div class="col-6">
                        <input type="text" name="valor" class="form-control" required />
                      </div>
                      <div class="col-6 pb-3">
                        <input placeholder="Nivell (%)" type="number" id="perSeccio" name="nivell" required class="form-control" max='100' min='0' />
                      </div>
                      <button class="btn btn-outline-black btn-lg px-5" name="Informatica" type="submit">Guardar</button>
                    </form>
                  </div>
                </div>

                <!-- Apartat de competències -->
                <div class="edit form-goup" id="competencies">
                  <form method="POST" action="./controller/guardar.php" class="row pb-3">

                    <div class="pb-3">
                      <input type="text" id="competencia" name="valor" class="form-control" placeholder="Escriu la teva nova competencia"></input>
                    </div>
                    <button class="btn" name="competencies" type="submit">Guardar</button>
                  </form>
                </div>



              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>

</html>