function culqi($Culqi) {
    if ($Culqi.token) { // ¡Objeto Token creado exitosamente!
        let token = $Culqi.token.id;
        let email = $Culqi.token.email;
        //alert("Se ha creado un token:" + token);
        //En esta linea de codigo debemos enviar el "Culqi.token.id"
        //hacia tu servidor con Ajax
        $.ajax({
          url: "paymentProcessed.php",
          type: "POST",
          data: {
            description: dp_description,
            amount: dp_amount,
            token: token,
            email: email
          }
        }).done(function(resp){
          alert(resp);
        });
    } else { // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log($Culqi.error);
        alert($Culqi.error.user_message);
    }
  };