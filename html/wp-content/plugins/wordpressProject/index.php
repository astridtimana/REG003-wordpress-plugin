<?php
// ----------- 1° 	TO DO	Add description Pluging
/*
Plugin Name: Plugin Donation
Plugin URI: https://example.com/plugin-name
Description: Este un plugin para donación de dinero a organizaciones sin fines de lucro y puede ser integrado con la pasarela de pago Culqi.
Version: 0.0.1
Requires at Least: 5.6.1
Requires PHP: 7.4.14
Author: Astrid Timaná & Mery Vera
Licence: MIT
*/

require_once dirname(__FILE__) . '/classes/shortcode.class.php'; //call functions from class into this file


if (!defined('ABSPATH')) exit;
// ----------- 2° 	TO DO	Add Plugin Hook Activation

// ---------Function Activation Plugin 	
	function Activation() {
		global $wpdb; //SQL statements - global $wpdb object - global variable
		//Use comands SQL
		//Create DB_TableName => 'wp_donaciones' (
		// 1° nameUniqueKey		-	data_type		-	NOT NULL OR NULL AND/OR AUTO_INCREMENT
		// 2° property_name
		// INT => 'number not decimal'	-	VARCHAR=>'string' =>VARCHAR(number=>'lenght')
		$sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}donaciones(
			`DonacionId` 	INT 			NOT NULL AUTO_INCREMENT,
			`Monto` 		INT 			NOT NULL,
			`Nombre` 		VARCHAR(50) 	NULL,
			`Email` 		VARCHAR(50) 	NULL,
			`Telefono` 		INT 			NOT NULL,
			PRIMARY KEY (`DonacionId`));";

		$wpdb->query($sql);
		//Create DB_TableName => 'wp_settings' 
		$settingsTable = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}settings(
			`SettingsId` 	INT 			NOT NULL AUTO_INCREMENT,
			`SecretKey` 	VARCHAR(40)		NOT NULL,
			`PublicKey` 	VARCHAR(40) 	NULL,
			`OrgName` 		VARCHAR(40) 	NULL,
			PRIMARY KEY (`SettingsId`));";

		$wpdb->query($settingsTable);
	}


function Deactivation() {
    flush_rewrite_rules();
}

//register_activation_hook => WordPress's Function
register_activation_hook(__FILE__, 'Activation'); //wrdpss_function('_file_', function_name')
register_deactivation_hook(__FILE__, 'Deactivation'); //wrdpss_function('_file_', function_name')

// ----------- 3° 	TO DO	Confing menu section plugin
// --------------------------Config menu plugging-----------------------
	add_action('admin_menu', 'CreateMenu');
	function CreateMenu() {
	// #region-----------------Principal file Position #1----------------
		add_menu_page(
			'Instrucciones de uso del plugin Menú', //pageTitle
			'DonationPlugin', //menuTitle
			'manage_options', //capability
			plugin_dir_path(__FILE__) . 'admin/mainpage.php', //menuSlug-path file
			null, //functionName
			plugin_dir_url(__FILE__) . 'admin/icon.png',
			'1' //position
		);
	// #region----------------------Option Position #2-------------------
		add_submenu_page(
			plugin_dir_path(__FILE__) . 'admin/mainpage.php', //menuSlug
			'Historial de Donaciones',
			'Historial de Donaciones', //menuTitle
			'manage_options', //capability
			plugin_dir_path(__FILE__) . 'admin/tablaDonacion.php', //menuSlug-path file
			null,
			'2' //position
		);
	// #region----------------------Option Position #3-------------------
		add_submenu_page(
			plugin_dir_path(__FILE__) . 'admin/mainpage.php',//menuSlug
			'Settings CULQI',
			'Settings CULQI', //menuTitle
			'manage_options', //capability
			plugin_dir_path(__FILE__) . 'admin/settings.php', //menuSlug-path file
			null,
			'3' //position
		);
}

// --------------------------ShortCode Form Register Data----------------
	// add_shortcode=> WordPress's function 'prefixing '
	// wordpress_function('title_name_to_call' , 'function_name')
	add_shortcode('ShortcodeDonate', 'ShortcodeDonation');
	function ShortcodeDonation($atts = array()){
		$_short = new shortCode;
		shortcode_atts(array(
			'title' => '',
			'bg-color' => '',
			'button-color'=> '',
			'font-color'=> ''
		), $atts);
	
		$html = $_short->formulario($atts);
		return $html;
	}

// ------------------Send Data from Webmaster to DataBase----------------
	//isset => true or false depends on the variable
	//$_POST => access the information sent from the method 'Post'
	//$_POST['form_button_submit_nameAttribute_']
	if(isset($_POST['submitWebmasterInfo'])){
		//create array with 'property name'=> 'params'
		$webmasterData = array("SecretKey"=>$_POST['secretKey'], "PublicKey"=>$_POST['publicKey'], "OrgName"=>$_POST['orgName']);
		$tabla = "wp_settings"; //call DB_TableName
		$wpdb->insert($tabla,$webmasterData); //finally 'insert this array to this DB_TableName'
	}

?>