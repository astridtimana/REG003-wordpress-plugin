<?php
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}donaciones";
    // ARRAY_A = array asociativo
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
        </thead>

        <tbody>
            <?php
                foreach ($lista_donaciones as $key => $value) {
                    $donacionId = $value['DonacionId'];
                    $nombre = $value['Nombre'];
                    $monto = $value['Monto'];
                    $email = $value['Email'];
                    $telefono = $value['Telefono'];
                    
                    echo"
                        <tr>
                            <td>$donacionId</td>
                            <td>$monto</td>
                            <td>$nombre</td>
                            <td>$email</td>
                            <td>$telefono</td>
                        </tr>
                    ";  
                }
            ?>
        </tbody>

    </table>

</div>