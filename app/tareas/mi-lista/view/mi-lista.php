<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1 class="text-center">Nueva Tarea</h1>

    <div class="row-cols-auto justify-content-center align-items-center gx-2">
      <div class="col">
        <h3 class="text-center">Tareas</h3>
        <hr>
        <?php
            include_once("./app/tareas/repository/tareas.repository.php");

            
            $idUsuario = (int)$_SESSION["idUsuario"];

            $usuario = new Usuario($idUsuario, "", "", "");

            $tareas = TareasRepository::getInstance()->getAllTareas($usuario);


            for ($i=0; $i < count($tareas); $i++) {
              $color = "";
              switch ($tareas[$i]->getStatus()) {
                case 'Pendiente':
                        $color = "primary";
                        break;

                case 'Completado':
                        $color = "success";
                        break;
        
                    default:
                        $color = "danger";
                        break;
              }

              $html = "
                  <div class='col-12 mx-3'>
                      <div class='card mt-3 border-black'>
                          <div class='card-header bg-{$color}'>
                              <h4 class='card-title text-center text-white'>
                                  {$tareas[$i]->getTitulo()}
                              </h4>
                          </div>

                          <div class='card-body'>
                              <p class='card-text'>
                                  {$tareas[$i]->getDescripcion()}
                              </p>
                          </div>

                          <div class='card-footer'>
                              <div class='row align-items-center'>
                                  <p class='col card-text'></p>
                                  <p class='col card-text text-center text-{$color}'>
                                      <strong>&squf;</strong>{$tareas[$i]->getStatus()}
                                  </p>
                                  <p class='col card-text'>
                                  <form action='' method='post'>
                                      <input type='hidden' name='id' value='{$tareas[$i]->getId()}' />
                                      <button class='btn btn-success' type='submit'>Completar</button>
                                  </form>
                                  </p>
                              </div>
                          </div>
                      </div>
                  </div>
              ";
              echo $html;
          }
        ?>

      </div>
    </div>
  </body>
</html>