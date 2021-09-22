<?php
// Cargamos Requests y Culqi PHP
include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';


// Configurar tu API Key y autenticación
$SECRET_KEY = "pk_test_87a7198984bae065";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

// Creando cargo
$dataM = array(
    "amount" => $_POST['amount'],
    "currency_code" => "PEN",
    "description" => $_POST['description'],
    "email" => $_POST['email'],
    "source_id" => $_POST['token'],
);

echo $dataM;
// Creando cargo
$charge = $culqi->Charges->create($dataM);
echo '¡Donación Exitosa!';

//Respuesta
print_r($charge);

?>