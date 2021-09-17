<html>

  <body>
    <form action="formpost.php" method="post">
      Nombre: <input type="text" name="nombre"><br>
      Email: <input type="text" name="email"><br>
      <input type="submit" value="Enviar">
    </form>
    <?php
    echo '<p>Hola Mundo</p>';
    define('myForm', __FILE__);
    echo 'myForm';

    ?>
  </body>

</html>