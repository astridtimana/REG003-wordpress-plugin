<?php
/*
 * Plugin Name:       DonationPlugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description: Este un plugin para donación de dinero a organizaciones sin fines de lucro y puede ser integrado con la pasarela de pago Culqi.
 * Version: 0.0.1
 * Requires at Least: 5.6.1
 * Requires PHP: 7.4.14
 * Author: Carla & Yessenia
 */

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

function Deactivation(){
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
		plugin_dir_path(__FILE__) . 'admin/tablaDonacion.php',
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
    $atts = shortcode_atts(
        array( 'button_text3' => '[Title]' ,
        ), $atts
    );
    return '
    <div class="donation-plugin-modal" style="display: block; background: #362277; padding: 20px; border-radius: 10px; width:30%">
    <h2 style="color:#e13e3f; text-align:center">'
    . $atts[button_text3] .
        '</h2><br/>
        <form method="post" action="" style="text-align: center;">
            <input type="number" name="Importe" placeholder="Monto a aportar" style="border-radius: 10px; border: none; outline: none; width: 100%"/><br /><br />
            <input type="text" name="your_name" placeholder="Nombre completo" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
            <input type="email" name="your_email" placeholder="Email" style="border-radius: 10px; border: none;  outline: none ; width: 100%" /><br /><br />
            <input type="number" name="phone" placeholder="Número de teléfono" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
            <input type="submit" name="form_exaple_contact_submit" value="DONAR" style="border-radius: 10px; border: none; color: #362277; font-weight: bolder;background: #abe1c1;  outline: none ; width: 100%" /><br /><br />
        </form>
    </div>
    ';
}


