<?php  
    $styletUrl =  plugins_url("wordpressProject/admin/styless.css", "" ); //path file style

    //$index = get the last register from table "wp_settings"
    $index = $wpdb->get_var("SELECT * FROM `wp_settings` ORDER BY SettingsId DESC LIMIT 1");
    //$varaible_name = get variable 'Varaible_Name'  from table "wp_settings" of the last register
    $secretKey = $wpdb->get_var("SELECT `SecretKey` FROM `wp_settings` WHERE `SettingsId`= $index ");
    $PublicKey = $wpdb->get_var("SELECT `PublicKey` FROM `wp_settings` WHERE `SettingsId`= $index  ");
    $OrgName = $wpdb->get_var("SELECT `OrgName` FROM `wp_settings` WHERE `SettingsId`= $index  ");

    echo '
    <!DOCTYPE html>
    <html lang="en">
    
      <head>
        <link rel="stylesheet" type="text/css" href="'. $styletUrl .'">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      </head>
    
      <body style="background: #f0f0f1;">
        <article id="container_primary">
          <h3 class="mt-3">Settings para la integración con Culqi</h3>
          <form method="post">
            <div class="mb-2 w-50">
              <label for="exampleInputEmail1" class="form-label">Nombre de la organización</label>
              <input type="text" class="form-control" id="organizationName" name="orgName" aria-describedby="name">
            </div>
            <div class="mb-2 w-50">
              <label for="exampleInputEmail1" class="form-label">Llave pública</label>
              <input type="text" class="form-control" id="publicKey" name="publicKey" aria-describedby="emailHelp">
            </div>
            <div class="mb-2 w-50">
              <label for="exampleInputEmail1" class="form-label">Llave secreta</label>
              <input type="text" class="form-control" id="secretKey" name="secretKey" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary mt-5" name="submitWebmasterInfo" id="submitWebmasterInfo">Guardar Cambios</button>
            <button class="btn btn-secondary mt-5" id="cancel_button_edit" style="display:none">Cancelar</button>
          </form>
        </article>
        <article id ="container_secondary" style="display:none">
          <h1>Configuración</h1>
          <div class="icons">
            <a id="btn-edit" class="btn btn-warning btn-xs" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
          </div>
          <p>Nombre de la organización : <span>"</span><span id="organizationNameText"></span><span>"</span></p>
          <p>Llave pública : <span>"</span><span id="publicKeyText"></span><span>"</span></p>
          <p>Llave secreta : <span>"</span><span id="secretKeyText"></span><span>"</span></p>
        </article>
        <script src="https://checkout.culqi.com/js/v3"></script>
        <script>
         const secretKeyDB = "'. $secretKey .'";
          $("#btn-edit").click(function(){  
            $("#container_primary").css({ display: "block" });
            $("#container_secondary").css({ display: "none" });
            $("#cancel_button_edit").css({ display: "block"});
          });
          $("#btn-deleted").click(function(){
            //localStorage.removeItem("tokenKey");
            location.reload();
          });
          if(secretKeyDB){
            $("#container_primary").css({display: "none"});
            $("#container_secondary").css({ display: "flex" });
            // let organizationNameText = document.getElementById("organizationNameText");
            // let publicKeyText = document.getElementById("publicKeyText");
            // let secretKeyText = document.getElementById("secretKeyText");
            $("#organizationNameText").text("'. $OrgName .'")
            $("#publicKeyText").text("'. $PublicKey .'")
            $("#secretKeyText").text("'. $secretKey .'")
            $("#submitWebmasterInfo").click(function(){
              // Captura de datos escrito en los inputs
              let organizationName = document.getElementById("organizationName").value;
              let publicKey = document.getElementById("publicKey").value;
              let secretKey = document.getElementById("secretKey").value;
              let hashOrganizationName = btoa(organizationName);
              let hashPublicKey = btoa(publicKey);
              let hashSecretKey = btoa(secretKey);
            });
    
          } else{
            $("#container_primary").css({ display: "block" });
        }
    
        </script>
      </body>
        <!-- Incluye Culqi Checkout en tu sitio web-->
    </html>    
    '
?>