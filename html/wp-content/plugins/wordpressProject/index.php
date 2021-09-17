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
    function ShortcodeDonation($atts){
        //attributes
        $atts = shortcode_atts(
            array(
                'button_text3' => 'Donar',
                'text_content' => ''
            ),
            $atts
        );
        return '
            <div>
                <button
                    onclick="document.querySelector(\'.donation-plugin-modal\').style.display = \'block\'"
                >'
                . $atts['button_text3'] .
                '</button>
        <div class="donation-plugin-modal" style="display: none;">
            <form method="post">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Llave</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                            <div id="emailHelp" class="form-text">Tu llave es confidencial.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        </div>
        ';
    }

    // function example_plugin(){
    // 	/* create a variable to hold the html information */
    // 	$content = ''; /* creates a string variable */
    // 	/* open the form tag */
    // 	$content .= '<form method="post" action="'.plugin_dir_path(__FILE__).'admin/processed.php">'; /* adds to the string variable */
    // 	$content .= '<input require type="number" name="Importe" placeholder="Monto a aportar" /><br /><br />';
    // 	$content .= '<input type="text" name="your_name" placeholder="Nombre completo" /><br /><br />';
    // 	$content .= '<input type="email" name="your_email" placeholder="Email" /><br /><br />';
    //     $content .= '<input type="number" name="phone" placeholder="Número de teléfono" /><br /><br />';
    // 	$content .= '<input type="submit" name="form_exaple_contact_submit" value="DONAR" /><br /><br />';
    // 	/* close the form tag */
    // 	$content .= '</form>';
    // 	return $content;
    // }


?>

