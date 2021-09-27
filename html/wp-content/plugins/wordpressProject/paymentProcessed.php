<?php
include_once('../../../wp-config.php');
include_once('../../../wp-load.php');
include_once('../../../wp-includes/wp-db.php');

try {

    //include_once dirname(__FILE__).'/Requests/library/Requests.php';
    Requests::register_autoloader();
    include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';

    // Configurar tu API Key y autenticación
    $SECRET_KEY = $_POST['tokenPublicKey'];
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

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

    $campos = array(
        "Monto"=>$_POST['amount'], 
        "Nombre"=>$_POST['name'], 
        "Email"=>$_POST['email'], 
        "Telefono"=>$_POST['phone']);
    $tabla = 'wp_donaciones';//Tabla en base de datos
    $wpdb->insert($tabla,$campos);

} catch (Exception $e) {
    echo "catch";
    echo json_encode($e->getMessage());
}


?>