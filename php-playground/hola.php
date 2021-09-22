<html>
 <head>
  <title>Prueba de PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 </head>
 <body>
   <form method="post" action="accion.php" style="display:none">
      <div class="mb-2 w-50">
         <label for="exampleInputEmail1" class="form-label">Nombre de la organización</label>
         <input type="text" class="form-control" id="organizationName" aria-describedby="name" name="organization">
      </div>
      <div class="mb-2 w-50">
         <label for="exampleInputEmail1" class="form-label">Llave pública</label>
         <input type="text" class="form-control" id="publicKey" aria-describedby="emailHelp" name="namePublicKey">
      </div>
      <div class="mb-2 w-50">
         <label for="exampleInputEmail1" class="form-label">Llave secreta</label>
         <input type="text" class="form-control" id="secretKey" aria-describedby="emailHelp" name="nameSeccretKey">
      </div>
      <button type="submit" class="btn btn-primary mt-5" id="buyButton">Guardar Cambios</button>
   </form>

    <button onclick="test()">test</button>
    <script src="https://checkout.culqi.com/js/v3"></script>
    <script>
      function test(){
        document.getElementById('organizationName').value = "Laboratoria";
        document.getElementById('publicKey').value = "#111";
        document.getElementById('secretKey').value = "#222";
        document.forms[0].submit();

      }

  </script>
 </body>
</html>