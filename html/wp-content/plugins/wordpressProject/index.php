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

if (!defined('ABSPATH')) exit;

function Activate(){
}

function Deactivate(){
	flush_rewrite_rules();
}

echo "Hola soy plugin";

register_activation_hook(__FILE__, 'Activate');
register_deactivation_hook(__FILE__, 'Deactivate');

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
    $atts = shortcode_atts(
        array( 'button_text3' => 'Donar' ,
                'text_content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        ), $atts
    );
    return '
    <div class="donation-plugin-modal" style="display: none; background: #362277; position: absolute; top:30% ;left: 40%; padding: 20px; border-radius: 10px">
    <p style="text-align: right; margin-right: 10px; color:#e13e3f; "><span style="cursor:pointer" onclick="document.querySelector(\'.donation-plugin-modal\').style.display = \'none\'">X</span></p>
    <h2 style="color:#e13e3f">'
    . $atts[text_content] .
        '</h2><br/>
        <form method="post" action="" style="text-align: center;">
            <input type="number" name="Importe" placeholder="Monto a aportar" style="border-radius: 10px; border: none; outline: none"/><br /><br />
            <input type="text" name="your_name" placeholder="Nombre completo" style="border-radius: 10px; border: none;  outline: none" /><br /><br />
            <input type="email" name="your_email" placeholder="Email" style="border-radius: 10px; border: none;  outline: none" /><br /><br />
            <input type="number" name="phone" placeholder="Número de teléfono" style="border-radius: 10px; border: none;  outline: none" /><br /><br />
            <input type="submit" name="form_exaple_contact_submit" value="DONAR" style="border-radius: 10px; border: none; color: #362277; font-weight: bolder;background: #abe1c1";  outline: none/><br /><br />
        </form>
    </div>

      <div>
        <button
          onclick="document.querySelector(\'.donation-plugin-modal\').style.display = \'block\'"
        >'
           . $atts[button_text3] .
        '</button>
      </div>
    ';
}


?>