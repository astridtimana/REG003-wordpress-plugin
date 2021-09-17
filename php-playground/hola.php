<html>
 <head>
  <title>Prueba de PHP</title>
 </head>
 <body>
 <?php echo '<p>Hola Mundo</p>'; ?>
 <?php 
  $sql='soy xdxd ';
  error_log($sql);
 ?>
    <form action="accion.php" method="post">
        <p>Su nombre: <input type="text" name="nombre" /></p>
        <p>Su edad: <input type="text" name="edad" /></p>
        <p><input type="submit" /></p>
    </form>    
      
    <script src="./indexs.js"></script>

 </body>
</html>
