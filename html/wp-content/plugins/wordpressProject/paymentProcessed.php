<?php
// 1°This operation happens when Culqi'modal activation send data for token verification.
// 2°Then if success save Form' data into SQL_table
//-------require files
    include_once('../../../wp-config.php');
    include_once('../../../wp-load.php');
    include_once('../../../wp-includes/wp-db.php');

try {

    //include_once dirname(__FILE__).'/Requests/library/Requests.php' -if not require line 3-5;
    Requests::register_autoloader();
    include_once dirname(__FILE__).'/culqi-php/lib/culqi.php'; // Culqi' library 

    // Config API Key & authentication
        $SECRET_KEY = $_POST['tokenSecretKey'];
        $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

    // Create culqi' charge
        $charge = $culqi->Charges->create(
            array(
                "amount" => $_POST['amount'], // Price
                "currency_code" => "PEN",     // Type  
               // "description" => $_POST['description'], // Description
                "email" => $_POST['email'], // Email
                "source_id" => $_POST['token'] // Token valided client' transaction
                )
            );
  
    echo '¡Donación exitosa!'; // return - response

    // Send data into DB_table_wp_donaciones if success
        $campos = array(
            "Monto"=>$_POST['amount2'], 
            "Nombre"=>$_POST['name'], 
            "Email"=>$_POST['email'], 
            "Telefono"=>$_POST['phone']);
        $tabla = 'wp_donaciones'; // Tabla en base de datos
        $wpdb->insert($tabla,$campos);

} catch (Exception $e) {
    //if error return this ::
    echo json_encode($e->getMessage());
}
?>