<?php
if (isset($query_params['error'])) {
   
   $error = $query_params['error'];
    echo "
            <div id='alerta'>
                <div class='alert alert-danger alert-dismissable fade show'>
                    <strong>Error:</strong> {$error}
                </div>
                <hr>
            </div>
        ";
}
?>

<section class="row">

   <div class="row-cols-auto justify-content-center align-items-center gx-2">

      <div class="col">
         <form action="" method="post">

            <div class="form-floating mb-3">
            <input
               type="text"
               class="form-control"
               name="nombre"
               id="nombre"
               placeholder="Ingresa el nombre"
            />
            <label for="nombre">Nombre</label>
         </div>

         <div class="form-floating mb-3">
            <input
               type="text"
               class="form-control"
               name="correo"
               id="correo"
               placeholder="Ingresa un correo"
            />
            <label for="correo">Correo</label>
         </div>

         <div class="form-floating mb-3">
            <input
               type="text"
               class="form-control"
               name="contrasena"
               id="contrasena"
               placeholder="Ingresa una contraseña"
            />
            <label for="contrasena">Contraseña</label>
         </div>
         <button type="submit" class="btn btn-warning mt-3">
               Registrar
         </button>

         </form>
      </div>

   </div>
</section>