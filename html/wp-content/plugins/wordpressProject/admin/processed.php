<html>
<body>
<?php
if(isset($_POST)){
 
  $nombre = $_POST['name'];
  echo 'Hola '. $nombre;
}
add_option( $option, $nombre );
get_option( $name);
?>
</body>
</html>