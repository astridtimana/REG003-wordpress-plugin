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
    echo "<h1>Instrucciones de donación</h1>";
}
?>