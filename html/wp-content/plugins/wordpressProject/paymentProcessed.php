<?php
error_log('22');
// Cargamos Requests y Culqi PHP
include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';


// Configurar tu API Key y autenticación
$SECRET_KEY = "pk_test_87a7198984bae065";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
// echo $_POST['amount2'];
// echo $_POST['description2'];
// echo $_POST['email2'];
// echo $_POST['token'];

// Creando cargo
// $charge = $culqi->Charges->create(
//     array(
//         "amount" => $_POST['amount2'],
//         "currency_code" => "PEN",
//         "description" => $_POST['description2'],
//         "email" => $_POST['email2'],
//         "source_id" => $_POST['token'],
//         )
//     );

echo '¡Donación Exitosa!';

//Respuesta
// print_r($charge);


?>