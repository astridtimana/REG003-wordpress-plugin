<?php
try {
//error_log('22');
// Cargamos Requests y Culqi PHP
//error_log(dirname(__FILE__)) 
include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';


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

//Respuesta
//print_r($charge);
} catch (Exception $e) {
    echo "catch";
    echo json_encode($e->getMessage());
}


?>