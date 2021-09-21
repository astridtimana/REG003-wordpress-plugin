.<?php
include_once dirname(__FILE__).'/Requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';

  class shortCode
  {
    public function formulario($atts)
    {
      //attributes
      return '
    <html>
    <head>
    <script src="https://checkout.culqi.com/js/v3"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
      <div class="donation-plugin-modal" style="display: block; background: #362277; padding: 20px; border-radius: 10px; width:30%">
      <h2 style="color:#e13e3f; text-align:center">'
          . $atts .
          '</h2><br/>
          <form method="post" style="text-align: center;">
          <input type="number" id="amount" name="importe" placeholder="Monto a aportar" style="border-radius: 10px; border: none; outline: none; width: 100%"/><br /><br />
          <input type="text" id="name" name="your_name" placeholder="Nombre completo" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
          <input type="email" id="email" name="your_email" placeholder="Email" style="border-radius: 10px; border: none;  outline: none ; width: 100%" /><br /><br />
          <input type="number" id="phone" name="phone" placeholder="Número de teléfono" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
          <input type="text" id="description" name="description" placeholder="Concepto de donación" style="border-radius: 10px; border: none;  outline: none; width: 100%" /><br /><br />
          <input type="submit" id="buyButton" name="submit" value="DONAR" style="border-radius: 10px; border: none; color: #362277; font-weight: bolder;background: #abe1c1;  outline: none ; width: 100%" /><br /><br />
      </form>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    
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
        Culqi.publicKey = "pk_test_87a7198984bae065";
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
            alert("Se ha creado un token:" + token);
            //En esta linea de codigo debemos enviar el "Culqi.token.id"
            //hacia tu servidor con Ajax
            function add_this_script_footer(){ ?>

            <script>
            jQuery(document).ready(function($) {

              // This is the variable we are passing via AJAX
              var fruit = "Banana";
          
              // This does the ajax request (The Call).
              $.ajax({
                  url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
                  data: {
                      "action":"example_ajax_request", // This is our PHP function below
                      "description": dp_description,
                      "amount": dp_amount,
                      "token": token,
                     " email": email
                  },
                  success:function(data) {
              // This outputs the result of the ajax request (The Callback)
                      window.alert(data);
                  },  
                  error: function(errorThrown){
                      window.alert(errorThrown);
                  }
              });   
          
          });
          </script>
          
        <?php } 
        } else { // ¡Hubo algún problema!
            // Mostramos JSON de objeto error en consola
            console.log(Culqi.error);
            alert(Culqi.error.user_message);
        }
      };
    
      </script>

      </div>
      </body>
      
    </html>
    ';

        // isset -> evalua si una variable está definida - se ha mandado un formulario?

      
    }
  }

  add_action("in_admin_footer", "add_this_script_footer"); 

  function example_ajax_request() {

    $SECRET_KEY = "pk_test_87a7198984bae065";
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));
    // The $_REQUEST contains all the data sent via AJAX from the Javascript call
    if ( isset($_REQUEST) ) {

      $charge = $culqi->Charges->create(
        array(
            "amount" => $_POST['amount'],
            "currency_code" => "PEN",
            "description" => $_POST['description'],
            "email" => $_POST['email'],
            "source_id" => $_POST['token'],
          )
       );
       echo '¡Donación Exitosa!';  
    }

    // Always die in functions echoing AJAX content
   die();
}

// This bit is a special action hook that works with the WordPress AJAX functionality. 
add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );

?>