<?php
/*
Plugin Name: plugin donation
Plugin URI: https://example.com/plugin-name
Description: Este un plugin para donación de dinero a organizaciones sin fines de lucro y puede ser integrado con la pasarela de pago Culqi.
Version: 0.0.1
Requires at Least: 5.6.1
Requires PHP: 7.4.14
Author: Astrid & Mery
Licence: MIT
*/
//require
require_once dirname(__FILE__) . '/classes/shortcode.class.php';

 if(isset($_POST['token'])){
	// Cargamos Requests y Culqi PHP
	include_once dirname(__FILE__).'./Requests/library/Requests.php';
	Requests::register_autoloader();
	include_once dirname(__FILE__).'./culqi-php/lib/culqi.php';


	// Configurar tu API Key y autenticación
	$SECRET_KEY = "sk_test_f73937b9e690e803";
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
	//print_r($charge);

  }
  else{

if (!defined('ABSPATH')) exit;

function Activation() {
    // crea una tabla de bd desde wordpress
    global $wpdb;

    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}donaciones(
        `DonacionId` INT NOT NULL AUTO_INCREMENT,
        `Monto` INT NOT NULL,
        `Nombre` VARCHAR(50) NULL,
        `Email` VARCHAR(50) NULL,
        `Telefono` INT NOT NULL,
        PRIMARY KEY (`DonacionId`));";

    $wpdb->query($sql);
}

function Deactivation() {
    flush_rewrite_rules();
}


register_activation_hook(__FILE__, 'Activation');
register_deactivation_hook(__FILE__, 'Deactivation');


add_action('admin_menu', 'CreateMenu');

function CreateMenu() {
	add_menu_page(
		'Instrucciones de uso del plugin Menú', //pageTitle
		'DonationPlugin',//menuTitle
		'manage_options',//capability
		plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
		null, //functionName
		'1' //position
	);
	add_submenu_page(
		plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
		'Submenu 1',
		'Historial de Donaciones',
		'manage_options',
		plugin_dir_path(__FILE__) . 'admin/history.php',
		null,
		'2'
	);
	add_submenu_page(
		plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
		'Submenu 2',
		'Settings Culqi',
		'manage_options',
		plugin_dir_path(__FILE__) . 'admin/settings.php',
		null,
		'3'
	);
}



add_shortcode('ShortcodeDonate', 'ShortcodeDonation');

function ShortcodeDonation($atts) {
    //attributes
    $_short = new shortCode;
  $title = $atts['title'];

  $html = $_short->formulario($title);
  return $html;

    
    
}

	// if(isset($_POST['submit'])){
	// 	$campos = array("Monto"=>$_POST['importe'], "Nombre"=>$_POST['your_name'], "Email"=>$_POST['your_email'], "Telefono"=>$_POST['phone']);
	// 	$tabla = "wp_donaciones";//Tabla en base de datos
	// 	$wpdb->insert($tabla,$campos);

	// }
    

		// PRUEBA AJAX
    // add_action('wp_enqueue_scripts', 'dcms_insertar_js');
    // function dcms_insertar_js(){
    //     if (!is_home()) return;
    //     wp_register_script('dcms_miscript', get_template_directory_uri() .'/js/script.js', array('jquery'));
    //     wp_enqueue_script('dcms_miscript');

    //     wp_localize_script('dcms_miscript', 'dcms_vars', ['ajaxurl'=>admin_url('admin-ajax.php')])
    // }
	}
?>
