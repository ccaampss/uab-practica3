<?php
session_start();
if (!isset($_SESSION['user'])) {
  require_once('controller/redirect.php');
} else {
  require_once 'model/config.php';
  require_once 'model/databaseAgafar.php';
  require_once 'model/databaseEliminar.php';

  // Per modificar el nom, cognoms i email al CV
  $id = $_SESSION['user']['id'];
  $user = $_SESSION['user'];
  $nom = $user['nom'];
  $cognoms = $user['cognoms'];
  $email = $user['email'];
?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0787d9ec00.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/cv.css">
    <title>Pràctica 3</title>
  </head>


  <body>

    <div class="headerGroc">
      <div class="holaNom"><?php echo 'Hola, ' . ($nom) ?></div>
      <div class="iconos">
        <form action="edit.php" class="botoEditar" method="post">
          <button class="btn btn-outline-light" type="submit">Editar</button>
        </form>
        <form action="./controller/logout.php" method="post">
          <button class="btn btn-outline-light" type="submit">Sortir</button>
        </form>
      </div>
    </div>

    <div class="todo">
      <div class="container">
        <div class="row">
          <div class="header">


          </div>
        </div>
        <div class="row2 d-flex">
          <div class="col col-5 col1">
            <!-- Columna esquerra -->
            <img class="img" src="avatar.png">

            <!-- Dades personals -->
            <div>
              <div class="titulo"><i class="fa-solid fa-angles-right"></i>Dades personals</div>
              <div>
                <ul>
                  <li class="item_lista"><i class="fa-solid fa-user"></i><?php echo ($nom . ' ' . $cognoms) ?></li>
                  <li class="item_lista"><i class="fa-solid fa-house"></i>C/Francesc Macià, 29</li>
                  <li class="item_lista"><i class="fa-solid fa-at"></i><?php echo ($email) ?></li>
                  <li class="item_lista"><i class="fa-solid fa-calendar"></i>04/01/1970</li>
                  <li class="item_lista"><i class="fa-solid fa-flag"></i>Catalunya</li>
                  <li class="item_lista"><i class="fa-solid fa-mobile"></i>937 76 54 32</li>
                  <li class="item_lista"><i class="fa-solid fa-heart"></i>Sí</li>
                  <li class="item_lista"><i class="fa-solid fa-car"></i>Classe B</li>
                </ul>
              </div>
            </div>

            <!-- Habilitats -->
            <div>
              <div class="titulo"><i class="fa-solid fa-angles-right"></i>Habilitats</div>
              <div> <?php get_habilidades($id, $conn) ?> </div>
            </div>


            <!-- idiomes -->
            <div>
              <div class="titulo"><i class="fa-solid fa-angles-right"></i>Idiomes</div>
              <div> <?php get_idiomes($id, $conn) ?> </div>
            </div>

            <!-- Informàtica -->
            <div>
              <div class="titulo"><i class="fa-solid fa-angles-right"></i>Informàtica</div>
              <div> <?php get_informatica($id, $conn) ?> </div>
            </div>

            <!-- Competencies -->
            <div>
              <div class="titulo"><i class="fa-solid fa-angles-right"></i>Competencias</div>
              <div> <?php get_competencias($id, $conn) ?> </div>
            </div>
          </div>

          <div class="col col-1 col1"></div> <!-- Columna en blanc -->
          <div class="col col-6 col2">
            <!-- Columna dreta -->
            <div>
              <div class="titulo"><i class="fa-solid fa-angles-right"></i>Perfil</div>
              <div>
                <ul>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada nibh vitae dolor vestibulum, et commodo libero consectetur. Vestibulum interdum urna id faucibus interdum. Donec tincidunt tincidunt sem luctus viverra. In id lectus mattis, dictum eros eget, ullamcorper leo.</p>
                  <div>
                    <div class="titulo"><i class="fa-solid fa-angles-right"></i>Experiencia feina</div>
                    <div>

                      <div>
                        <div class="explicacion">
                          <div class="col-5">01/2017 - Actualitat</div>
                          <div class="col-7">
                            <span>Administrativa a Bunge Cono Sur</span>
                            <p class="subtitulo">Bunge Cono Sur</p>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque malesuada nibh vitae dolor vestibulum, et commodo libero consectetur. Vestibulum interdum urna id faucibus interdum. Donec tincidunt tincidunt sem luctus viverra. In id lectus mattis, dictum eros eget, ullamcorper leo.</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div>
                      <div class="explicacion">
                        <div class="col-5">08/2016-12/2016</div>
                        <div class="col-7">
                          <span>Consultora B.A.P.</span>
                          <p class="subtitulo">Barcelona </p>
                          <span>Como consultor 8.AP FICO, participe activamente en los siguientes proyectos:
                            <ul>
                              <li>Banco Hipotecario - Upgrade de versión 5.0 a 6.0 </li>
                              <li>PC Arts Argentina (BANGHO)-Implementación B.A.P ALL IN ONE </li>
                              <li>Laboratorios Sanch Aventis - Soporte para LATAM</li>
                              <li>Investigación y desarrollo de casos de estudio sobre parametrización y aplicación del
                                TRM-Plazos Fijos.</li>

                          </span>

                          <div>

                            <div>

                </ul>
              </div>
            </div>
          </div>
          <div>
            <div class="explicacion">
              <div class="col-5">01/2015 - 07/2016</div>
              <div class="col-7">
                <span>Especialista 8AP FI </span>
                <p class="subtitulo">Accenture Argentina</p>
                <span>Consultor funcional del modulo FI creación de nuevas sociedades FI, configuración de operaciones
                  bancarias de de extractos automáticos, configuración de nuevas estructuras de balance, configuración de
                  nuevas cuentas bancarias en las distintas scoiedades del grupo de empresas , configuración parcial módulo
                  activo fijo, configuración de nuevos indicadores de impuestos, soporte funcional a usuarios del módulo
                  FI-AR, FI-TR, FI-GL, FI-AP. </span>
              </div>
            </div>
          </div>
        </div>


        <div class="titulo"><i class="fa-solid fa-angles-right"></i>Educació</div>
        <div>

          <div>
            <div class="explicacion">
              <div class="col-5">08/2009 - Presente</div>
              <div class="col-7">
                <span>Contador Público.</span>
                <p class="universidad">Universidad de Buenos Aires (UBA) - Buenos Aires - Promedio: 8.</p>
                <span>Durante mi formación, me he capacitado para asesorar personas y empresas en las áreas financera,
                  impositiva, contable, laboral, de costos, y societaria. Diseñar, interpretar e implementar sistemas de
                  información contables, dentro de las organizaciones públicas y privadas para la toma de decisiones.
                </span>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>

  </html>
<?php
}
?>