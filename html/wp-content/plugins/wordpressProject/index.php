<?php 
/*
 * Plugin Name:       donationPlugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 */


function Activation() {
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
	$content .= '<form method="post" '; /* adds to the string variable */

	$content .= '<input type="number" name="Importe" placeholder="Monto a aportar" /><br /><br />';
	$content .= '<input type="text" name="your_name" placeholder="Nombre completo" /><br /><br />';
	$content .= '<input type="email" name="your_email" placeholder="Email" /><br /><br />';
    $content .= '<input type="number" name="phone" placeholder="Número de teléfono" /><br /><br />';
    $content .= '<input type="number" name="card" placeholder="Número de tarjeta" /><br /><br />';
    $content .= '<input type="date" name="expiration" placeholder="Fecha de exp." /><br /><br />';
    $content .= '<input type="number" name="cvv" placeholder="CVV" /><br /><br />';

	$content .= '<input type="submit" name="form_exaple_contact_submit" value="DONAR" /><br /><br />';

	/* close the form tag */
	$content .= '</form>';

	return $content;
}
add_shortcode('pluginn' , 'example_plugin');



function ShowContent(){
    echo "<h1>Instrucciones de donación</h1>";
}
function Shortcode() {
    return "<button>Dona acá</button>";
} add_shortcode('plugin_shortcode', 'Shortcode');

function Shortcode2($atts) {
    //attributes
    $atts = shortcode_atts(
        array( 'button_text2' => 'Donar'), $atts
    );
    return 'Hola, este es el: '.$atts['button_text2'];
} add_shortcode('plugin_shortcode2', 'Shortcode2');


add_shortcode('plugin_shortcode3', 'Shortcode3');
function Shortcode3($atts) {
    //attributes
    $atts = shortcode_atts(
        array( 'button_text3' => 'Donar'
        ), $atts
    );
    //return '<button onclick="console.log(\'hola\')" data-toggle="modal" data-target="#ourModal">'. $atts['button_text3'] . '</button>';
    return '<button onclick="window.location=\'form.php\'" data-toggle="modal" data-target="#ourModal">'. $atts['button_text3'] . '</button>';
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
    // return '<button onclick="console.log(\'hola\')" >'. $atts['button_text3'] . '</button>';
    //return '<button onclick="window.location=\'form.php\'>'. $atts['button_text3'] . '</button>';
    //return '<button onclick="console.log(\'plugin_shortcode3\')" data-toggle="modal" data-target="#ourModal">'. $atts['button_text3'] . '</button>';
}


?>