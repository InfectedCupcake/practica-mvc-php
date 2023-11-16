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
        <form action="" method="post">
          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control"
              name="titulo"
              id="titulo"
              placeholder="Ingresa el titulo"
            />
            <label for="formId1">Titulo</label>
          </div>

          <div class="form-floating mb-3">
            <input
              type="text"
              class="form-control"
              name="descri"
              id="descri"
              placeholder="Ingresa una Descripción"
            />
            <label for="formId1">Descripción</label>
          </div>

          <button type="submit" class="btn btn-primary mt-3">
            Guardar
        </button>
        </form>
      </div>
    </div>
  </body>
</html>
