<?php
//Define class_name
//Each function will be called later, when needed
class shortCode{
  
  public function formulario($atts){

    global $wpdb;
    //$id = get the last register from table "wp_settings"
    $id = $wpdb->get_var("SELECT * FROM `wp_settings` ORDER BY SettingsId DESC LIMIT 1");
    //$secretKey = get variable 'SecretKey'  from table "wp_settings" of the last register
    $secretKey = $wpdb->get_var("SELECT `SecretKey` FROM `wp_settings` WHERE `SettingsId`= $id");

    $paymentUrl =  plugins_url("wordpressProject/paymentProcessed.php", "" ); //path to ajax
    $styletUrl =  plugins_url("wordpressProject/admin/styless.css", "" ); //path style file
  
    return '
    <html>
    <head>
    <link rel="stylesheet" type="text/css" href="'. $styletUrl .'">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
      <div class="donation-plugin-modal" style="display: block; background: '. $atts['bg-color'] .' ; padding: 20px; border-radius: 10px; width:35%">
      <h2 style="color:'. $atts['font-color'] .' ; font-size: 2rem; text-align:center; margin-bottom:30px">'
        . $atts['title'] .
      '</h2>
      <form method="post" style="text-align: center; ">
        <p style="color:'. $atts['font-color'] .' ; font-size: 0.7rem; margin-bottom:10px">*Transacción máxima de s/1000 por cada operación.*</p>
        <input type="number" id="amount" name="importe" placeholder="Monto a aportar" style="border-radius: 10px; border: none; outline: none; width: 90%; padding:3px 10px; font-size:16px; margin-bottom:25px"/>
        <input type="text" id="name" name="your_name" placeholder="Nombre completo" style="border-radius: 10px; border: none;  outline: none; width: 90%; padding:3px 10px; font-size:16px; margin-bottom:25px"/>
        <input type="email" id="email" name="your_email" placeholder="Email" style="border-radius: 10px; border: none;  outline: none ; width: 90%; padding:3px 10px; font-size:16px; margin-bottom:25px "/>
        <input type="number" id="phone" name="phone" placeholder="Número de teléfono" style="border-radius: 10px; border: none;  outline: none; width: 90%; padding:3px 10px; font-size:16px; margin-bottom:25px "/>
        <textarea type="text" id="description" name="description" placeholder="Concepto de donación" style="border-radius: 10px; border: none;  outline: none; width: 90%; padding:3px 10px; font-size:16px; margin-bottom:25px "></textarea>
        <input type="submit" id="buyButton" name="submit" value="DONAR" style="border-radius: 10px; border: none; color: #ffffff; font-weight: bolder; background: '. $atts['button-color'] .'; outline: none; width: 50%; padding: 3px 10px; font-size:16px; margin-bottom:25px" />
      </form>
    </div>
      <script>
     
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      // obtener los datos del formulario
      let dp_amount = "";
      let dp_name = "";
      let dp_email = "";
      let dp_phone = "";
      let dp_description = "";
      // Usa la funcion Culqi.open() en el evento que desees
      $("#buyButton").on("click", function(e) {
        dp_amount = document.getElementById("amount").value*100;
        dp_name = document.getElementById("name").value;
        dp_email = document.getElementById("email").value;
        dp_phone = document.getElementById("phone").value;
        dp_description = document.getElementById("description").value;
        // Configura tu llave pública
        //Culqi.publicKey = tokenPublicKey ;
        Culqi.publicKey ="'. $secretKey.'" ;
        // Configura tu Culqi Checkout
        Culqi.settings({
            title: "Culqi Store",
            currency: "PEN",
            description: dp_description,
            amount: dp_amount,
        });
        // Abre el formulario con las opciones de Culqi.settings
        Culqi.open();
        e.preventDefault();
      });
      function culqi() {
        if (Culqi.token) { // ¡Objeto Token creado exitosamente!
            let token = Culqi.token.id;
            let email = Culqi.token.email;
            //alert("Se ha creado un token:" + token);
            //En esta linea de codigo debemos enviar el "Culqi.token.id"
            //hacia tu servidor con Ajax debemos enviar todos los datos que usaremos
            $.ajax({
              url: "'. $paymentUrl .'",
              type: "POST",
              data: {
                description: dp_description,
                amount: dp_amount,
                amount2:dp_amount/100,
                token: token,
                email: email,
                phone: dp_phone,
                name: dp_name,
                tokenSecretKey: "'. $secretKey.'"
              }
            }).done(function(resp){
              alert(resp);
            });
        } else { // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
        }
      };
    
      </script>
      <script src="https://checkout.culqi.com/js/v3"></script>
      </body>
      
    </html>
    ';
      
    }
  }

  ?>