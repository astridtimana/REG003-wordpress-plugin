<?php 
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 */


function Activation() {
}

function Deactivation() {
    flush_rewrite_rule();
}

echo "'Plugin de Donar'";

// Register activation hook
register_activation_hook(__FILE__,'Activation');
// Register deactivation hook
register_deactivation_hook(__FILE__,'Deactivation');

add_action('admin_menu','CrearMenu');
function CrearMenu(){
    add_menu_page(
        'Instrucciones de uso del plugin',
        'Pluging Donación',
        'manage_options',
        'sp_menu',
        'ShowContent',
        '1'
    );
}

function ShowContent(){
    echo "
        <h1>Instrucciones de donación</h1>
        <form action='accion.php' method='post'>
        <p>Su nombre: <input type='text' name='nombre' /></p>
        <p>Su edad: <input type='text' name='edad' /></p>
        <p><input type='submit' /></p>
        </form>    
        ";
}

add_shortcode('cn-ebook' ,'cn_mostrar_ebook');
function cn_mostrar_ebook( $atts ){
    $output = '( si deseas aprender má sobre este tema,
                <a href="#">puedes revisar este ebook</a>)';
    return $output;
};

add_shortcode('cn-button' ,'cn_mostrar_button');
function cn_mostrar_button( $atts ){
    $atts = shortcode_atts(
                array(
                    'url' => 'url',
                    'background' => null,
                    'color' => null,
                    'texto' => 'Presiona aquí',
                ), $atts
    );
    return "<form action= $atts[url] method='post'>
                <input type='text' name='nombre' />
                <button type='submit'
                style='background: $atts[background]; color: $atts[color]'
                > 
                $atts[texto] 
                </button>
            </form>
            <?php 
            $sql='soy xdxd ';
            print($sql);
           ?>
          
            ";
};


?>