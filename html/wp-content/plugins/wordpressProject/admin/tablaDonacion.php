<?php
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}donaciones";
    $lista_donaciones = $wpdb->get_results($query, ARRAY_A)
?>

<div class="wrap">
    <?php
            echo "<h1 class='wp-heading-inline'>" .get_admin_page_title(). "</h1>"
    ?>

    <table class="wp-list-table widefat fixed striped pages">
        <thead>
            <th>Donacion Id</th>
            <th>Monto</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>ShortCode</th>
            <th>Acciones</th>
        </thead>

        <tbody>

            <?php
            
                foreach ($lista_donaciones as $key => $value) {
                    $nombre = $value['Nombre'];
                    $shortcode = $value['ShortCode'];
                }

            ?>

        </tbody>

    </table>

</div>