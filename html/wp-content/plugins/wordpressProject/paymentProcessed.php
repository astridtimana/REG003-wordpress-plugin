<?php
include_once('../../../wp-config.php');
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');

// global $wpdb;
try {

    //include_once dirname(__FILE__).'/Requests/library/Requests.php';
    Requests::register_autoloader();
    include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';

    //if(isset($_POST["submit"])){
    $campos = array(
        "Monto"=>$_POST['amount'], 
        "Nombre"=>$_POST['name'], 
        "Email"=>$_POST['email'], 
        "Telefono"=>$_POST['phone']);
    $tabla = 'wp_donaciones';//Tabla en base de datos
    $wpdb->insert($tabla,$campos);
    //}

    // // Configurar tu API Key y autenticación
    $SECRET_KEY = "sk_test_7d9f4a5fe70f8315";
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
    // echo $_POST['amount'];
    // echo $_POST['description'];
    // echo $_POST['email'];
    // echo $_POST['token'];

    // Creando cargo
    $charge = $culqi->Charges->create(
        array(
            "amount" => $_POST['amount'],
            "currency_code" => "PEN",
            "description" => $_POST['description'],
            "email" => $_POST['email'],
            "source_id" => $_POST['token']
            )
        );
  
    echo '¡Donación exitosa!';

} catch (Exception $e) {
    echo "catch";
    echo json_encode($e->getMessage());
}


?>