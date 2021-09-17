<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </head>
  <body style="background: #f0f0f1;">
    <article>
      <h3 class="mt-3">Settings para la integración con Culqi</h3>
      <form method="post">
        <div class="mb-2 w-50">
          <label for="exampleInputEmail1" class="form-label">Nombre de la organización</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name">
        </div>
        <div class="mb-2 w-50">
          <label for="exampleInputEmail1" class="form-label">Llave pública</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-2 w-50">
          <label for="exampleInputEmail1" class="form-label">Llave secreta</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Guardar Cambios</button>
      </form>
    </article>
  </body>
    <!-- Incluye Culqi Checkout en tu sitio web-->
     <script src="https://checkout.culqi.com/js/v3"></script>
     <script>
     // Configura tu llave pública
     Culqi.publicKey = 'Aquí inserta tu llave pública';
     // Configura tu Culqi Checkout
     Culqi.settings({
          title: 'Culqi Store',
          currency: 'PEN',
          description: 'Polo Culqi lover',
          amount: 3500
     });
     // Usa la funcion Culqi.open() en el evento que desees
     $('#buyButton').on('click', function(e) {
          // Abre el formulario con las opciones de Culqi.settings
          Culqi.open();
          e.preventDefault();
     });
     </script>
</html>