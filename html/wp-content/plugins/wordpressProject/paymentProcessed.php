<?php
    try {
    // Cargamos Requests y Culqi PHP
    include_once dirname(__FILE__).'/Requests/library/Requests.php';
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
    //Respuesta
    echo '¡Donación exitosa!';

    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }


?>