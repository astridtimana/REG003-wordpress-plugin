<?php 

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
    return "<form action= $atts[url] method='get'>
                <input></input>
                <button 
                style='background: $atts[background]; color: $atts[color]'
                > 
                $atts[texto] 
                </button>
            </form>
            ";
};

add_shortcode('cn-info' ,'cn_mostrar_datos');
function cn_mostrar_datos( $atts ){
    $atts = shortcode_atts(
                array(
                    'url' => 'url',
                    'background' => null,
                    'color' => null,
                    'texto' => 'Presiona aquí',
                ), $atts
    );
    return "<form action= $atts[url] method='get'>
                <input></input>
                <button 
                style='background: $atts[background]; color: $atts[color]'
                > 
                $atts[texto] 
                </button>
            </form>
            ";
};

?>