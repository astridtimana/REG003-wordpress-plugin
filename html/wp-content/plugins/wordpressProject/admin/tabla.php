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

<body>
     <form method="post" action="processed.php">
          <div class="mb-2">
               <label for="name" class="form-label">Nombre</label>
               <input type="text" class="form-control" id="name" aria-describedby="name">
          </div>
          <div class="mb-2">
               <label for="email" class="form-label">Correo</label>
               <input type="email" class="form-control" id="email" aria-describedby="email">
          </div>
          <div class="mb-2">
               <label for="card" class="form-label">Nro de Tarjeta</label>
               <input type="number" class="form-control" id="card" aria-describedby="card">
               <div id="emailHelp" class="form-text">Tu información de tarjeta es confidencial.</div>
          </div>
          <div class="mb-3">
               <label for="key" class="form-label">Llave</label>
               <input type="password" class="form-control" id="key">
               <div id="emailHelp" class="form-text">Tu llave es confidencial.</div>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
     </form>
</body>

</html>

