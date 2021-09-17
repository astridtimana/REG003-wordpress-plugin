<html>
 <head>
  <title>Prueba de PHP</title>
 </head>
 <body>
   <form method="post">
      <div class="mb-2 w-50">
         <label for="exampleInputEmail1" class="form-label">Nombre de la organización</label>
         <input type="text" class="form-control" id="organizationName" aria-describedby="name">
      </div>
      <div class="mb-2 w-50">
         <label for="exampleInputEmail1" class="form-label">Llave pública</label>
         <input type="text" class="form-control" id="publicKey" aria-describedby="emailHelp">
      </div>
      <div class="mb-2 w-50">
         <label for="exampleInputEmail1" class="form-label">Llave secreta</label>
         <input type="text" class="form-control" id="secretKey" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary mt-5" id="buyButton">Guardar Cambios</button>
   </form>
    
    <script src="https://checkout.culqi.com/js/v3"></script>
    <script>
      // Configura tu llave pública
      Culqi.publicKey = 'pk_test_87a7198984bae065';
      Culqi.init();
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

      function culqi() {
        if (Culqi.token) { // ¡Objeto Token creado exitosamente!
            var token = Culqi.token.id;
            alert('Se ha creado un token:' + token);
            //En esta linea de codigo debemos enviar el "Culqi.token.id"
            //hacia tu servidor con Ajax
        } else { // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
        }
      };
  </script>
 </body>
</html>