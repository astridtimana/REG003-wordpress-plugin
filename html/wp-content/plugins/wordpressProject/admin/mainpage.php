<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </head>

  <body style="background: #f0f0f1;">
    <article>
      <h2 class="mt-3">Introducción al uso del plugin</h2>
      <p class="w-50" >

        <strong>DonationPuglin</strong> tiene la finalidad de ayudar de una forma sencilla y rápida al conectar con <strong>Culqi</strong> como pasarela de pago.<br/><br/>
        <i><strong><u>Sigue las instrucciones:</u></strong></i>
      </p>
      <h3>1° Step</h3>
        <div style="margin-left:1em" class="w-50"> 
          <p>
            <strong>Formulario : </strong>Debes incorporar nuestro formulario. Los campos vienen por defecto ::
          </p>
          <div style="border: 1px solid #8c7c86; padding: 10px 2em; display:flex; flex-direction:row_; justify-content:space-between; width:80%; color:#404548">
            <section style="display:flex; flex-direction:column">
              <strong style="margin-bottom: 1em">Nombre del campo</strong>
              <p>Monto a aportar</p>
              <p>Nombre Completo</p>
              <p>Email</p>
              <p>Número de Teléfono</p>
              <p>Descripción</p>
            </section>
            <section style="display:flex; flex-direction:column">
              <strong style="margin-bottom: 1em">Tipo de Dato</strong>
                <p>Número</p>
                <p>Texto</p>
                <p>Texto</p>
                <p>Número</p>
                <p>Texto de más de 5 letras</p>
            </section>
          </div>
        </div>
        <br/>
        <div style="margin-left:1em" class="w-50"> 
          <p>
            Para incorporar nuestro formulario a su plantilla necesita agregar un nuevo bloque  con la etiqueta <i>"Shortcode" <strong>[ / ]</strong></i>. Luego, deberá llamarlo con la siguiente línea :<br/><br/>
            <strong style="color:#4d4dff"><i>➡ [ShortcodeDonate]</i></strong>
          </p>
          <p>
            Para añadirle tu propio título al formulario, añade el siguiente parámetro:
            <br/><br/>
            <strong style="color:#4d4dff"><i>➡ [ShortcodeDonate <span style="color:#a75858">title="<span style="color:#58a758">(Escribe el título)</span>]"</span></i></strong>
          </p>
        </div>

        <h3 style="margin-top:2.5em">2° Step</h3>
        <div style="margin-left:1em" class="w-50"> 
          <p>
            <strong>WebMaster : </strong>Encontrarás una sección que deberás completar con tus datos. Para esto debes de tener una cuenta registrada en <strong>Culqi</strong>. Especificación  de los campos ::
          </p>
          <div style="border: 1px solid #8c7c86; padding: 10px 2em; display:flex; flex-direction:row_; justify-content:space-between; width:auto; color:#404548">
            <section style="display:flex; flex-direction:column">
              <strong style="margin-bottom: 1em">Nombre del campo</strong>
              <p>Nombre de la organización</p>
              <p>Llave pública</p>
              <p>Llave secreta </p>
            </section>
            <section style="display:flex; flex-direction:column">
              <strong style="margin-bottom: 1em">Especificación </strong>
                <p>Coloca el nombre a la empresa que deseas vincular</p>
                <p>Coloca la llave píblica que deseas vincular</p>
                <p>Coloca la llave secretea que deseas vincular </p>
            </section>
          </div>
          <p>*Es muy importante que ingreses datos que te brinde la plataforma Culqui*</p>
        </div>     
    </article>   

  </body>

</html>
