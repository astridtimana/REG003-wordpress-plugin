<?php 
/*
 * Plugin Name:       DonationPlugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 */


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

// echo "'Plugin de Donar'";

// Register activation hook
register_activation_hook(__FILE__,'Activation');
// Register deactivation hook
register_deactivation_hook(__FILE__,'Deactivation');


add_action('admin_menu','CrearMenu');
function CrearMenu(){
    add_menu_page(
        'Instrucciones de uso del plugin',
        'Plugin Donación',
        'manage_options',
        plugin_dir_path(__FILE__). 'admin/tabla.php',
        null,
        '1'
    );
}

function example_plugin()
{
	/* create a variable to hold the html information */
	$content = ''; /* creates a string variable */
	/* open the form tag */
	$content .= '<form method="post" action="'.plugin_dir_path(__FILE__).'admin/processed.php">'; /* adds to the string variable */
	$content .= '<input require type="number" name="Importe" placeholder="Monto a aportar" /><br /><br />';
	$content .= '<input type="text" name="your_name" placeholder="Nombre" /><br /><br />';
    $content .= '<input type="text" name="your_last_name" placeholder="Apellido" /><br /><br />';
	$content .= '<input type="email" name="your_email" placeholder="Email" /><br /><br />';
    $content .= '<input type="number" name="phone" placeholder="Número de teléfono" /><br /><br />';

	$content .= '<input type="submit" name="form_exaple_contact_submit" value="DONAR" /><br /><br />';
	/* close the form tag */
	$content .= '</form>';

	return $content;
}
add_shortcode('pluginn' , 'example_plugin');



function ShowContent(){
    echo "<h1>Instrucciones de donación</h1>";
}

?>