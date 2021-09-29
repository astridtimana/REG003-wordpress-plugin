# Donation Plugin

## Índice

* [1. Descripción](#1-preámbulo)
* [2. Dependencias](#2-resumen-del-proyecto)
* [3. Recursos de aprendizaje](#3-objetivos-de-aprendizaje)
* [4. ¿Cómo instalar el plugin?](#4-consideraciones-generales)
* [5. ¿Cuándo puedes usar el plugin?](#5-criterios-de-aceptación-mínimos-del-proyecto)
* [6. Ejemplos de uso](#6-pistas-tips-y-lecturas-complementarias)
* [7. ¿Cómo hacer el test?](#7-apache-mysql-php)

***

## 1. Descripción

**Donation** es un plugin creado para WordPress. Su fin es facilitar colaboración 
económica y de caridad a la causa por la que estés trabajando. ¿Tienes algún próposito
o proyecto en el cual te gustaría recibir fondos de distintos donantes? Primero, es
súper sencillo usando WordPress. Desarrollas tu página web, instalas *Donation* 
(más adelante, te mostramos cómo), usas el shortcode y ¡listo!, el usuario final podrá
ver formulario para hacer su donación.

Este plugin usa la pasarela de pago [CULQI](https://docs.culqi.com/#/pagos/inicio) 
para que los donantes tengan la seguridad de que las transacciones son seguras. Tal es
así, que CULQI permite aceptar pagos en línea con diferentes tarjetas de crédito.  


## 2. Dependencias

En este proyecto te invitamos a desarrollar un plugin para WordPress. Puedes
proponer libremente la funcionalidad de tu plugin. Cuando tengas una idea más o
menos definida, asegúrate de pedir ayuda del equipo de coaches para determinar
exactamente cuál será el alcance de tu proyecto y qué objetivos de aprendizaje
cubrirás. Define un alcance que te tome de 4 a 5 semanas como máximo.

Este proyecto puedes desarrollarlo de forma individual o por duplas. Tu decides
de acuerdo al alcance que hayas definido.

Puedes encontrar inspiración para la funcionalidad de tu plugin en la
[tienda oficial de WordPress](https://wordpress.org/plugins/).

Algunas ideas que podrían funcionar son:

* Un plugin que permita determinar si el contenido de un post nuevo es original
o es un plagio de uno post ya existente.
* Un plugin que integre un chat de WhatsApp en un sitio WordPress.
* Un plugin para integrar una pasarela de pago como
[Mercado Pago](https://www.mercadopago.com.co/developers/en/guides),
[Culqui](https://docs.culqi.com/) o [Wompi](https://docs.wompi.co/)

## 3. Objetivos de aprendizaje

Reflexiona y luego marca los objetivos que has llegado a entender y aplicar en tu proyecto. Piensa en eso al decidir tu estrategia de trabajo.

## 4. Consideraciones generales

### Estructura de archivos

El _boilerplate_ contiene una estructura de archivos como punto de partida:

```text
.
├── .gitignore
├── docker-composer.yml
├── project.yml
├── README.md
└── apache2
└── html
└── php-playground
```

#### `apache2`

Esta carpeta almacena los archivos de configuración de Apache, el servidor web
usado en esta instalación de WordPress. No debería ser necesario modificar
ningún archivo en ella.

#### `html`

En esta carpeta se encuentran los archivos y directorios de WordPress. Abre en
tu IDE esta carpeta para desarrollar tu plugin. Puedes aprender más sobre la
estructura de directorios de WordPress
[acá](https://www.wpbeginner.com/beginners-guide/beginners-guide-to-wordpress-file-and-directory-structure/).

#### `php-playground`

En la carpeta `php-playground` puedes crear tus archivos PHP de práctica y ejecutarlos
accediendo en un navegador web a
[http://localhost:8080](http://localhost:8080). Por ejemplo, en esta carpeta ya
está creado el archivo [`hola.php`](http://localhost:8080/hola.php)
como se indica en la lección
["Su primera página con PHP"](https://www.php.net/manual/es/tutorial.firstpage.php)
del
[manual oficial de PHP](https://www.php.net/manual/es/).
Los archivos y el código que escribas en esta carpeta no afectarán a tu sitio WordPress.

## 5. Criterios de aceptación mínimos del proyecto

### Funcionalidades mínimas

T


### Modularización del código

El código que escribas para tu plugin deberá organizarse en una estructura de
carpetas lógica y clara. Puedes seguir la
[estructura de carpetas](https://developer.wordpress.org/plugins/plugin-basics/best-practices/#folder-structure)
recomendada por la documentacion oficial o puedes utilizar un
[_boilerplate_](https://developer.wordpress.org/plugins/plugin-basics/best-practices/#boilerplate-starting-points)
desarrollado por la comunidad.

### Pruebas unitarias

Deberás incluir pruebas unitarias para el plugin que desarrolles.
Te invitamos a escribir casos de prueba prueba
para las principales funcionalidades de tu plugin.

## 6. Pistas, tips y lecturas complementarias

### Instalar WordPress

La manera más fácil de instalar WordPress en tu
computadora local es usando Docker Compose.

1. Instala Docker Composer en tu computadora.
Puedes consultar un video que hemos preparado
para ayudarte con esta instalación en
[Windows](https://www.loom.com/share/7f3183a68aaa428098c9d07e911f5e38)
o en [Linux](https://www.loom.com/share/d30afc8046b14dfab7494dfee0c969cd).

2. Haz un _fork_ de este repo (en GitHub).

3. Clona tu _fork_ en tu computadora:

    ```sh
    git clone git@github.com:<tu-usuario-de-github>/<cohortid>-wordpress-plugin.git

    cd <cohortid>-wordpress-plugin
    ```

4. Crea una rama a partir de `main` para empezar a trabajar. Por ejemplo:

   ```sh
   git checkout -b develop
   ```

5. Ejecuta el siguiente comando desde el directorio de su proyecto.

   ```sh
   docker-compose up -d
   ```

    Esto ejecuta `docker-compose up` en modo detached, descarga las
    imágenes de Docker necesarias e inicia los contenedores de wordpress,
    wordpress-cli y base de datos.

6. Después de un par de minutos, WordPress debería estar ejecutándose en el
puerto 80 de tu computadora. Accede en un navegador web a
[http://localhost](http://localhost) y completa la
["famosa instalación de cinco minutos"](https://codex.wordpress.org/es:Instalando_WordPress#La_famosa_.C2.ABInstalaci.C3.B3n_en_5_minutos.C2.BB)
como administrador de WordPress.

7. [WP-CLI](https://wp-cli.org/) permite automatizar el mantenimiento de
sitios WordPress usando una consola de comandos en lugar de un navegador web.
Si quieres o necesitas usarlo, puedes ejecutarlo con el siguiente comando:

   ```sh
   docker-compose run --rm wp <WP-CLI COMMAND>
   ```

    Si tienes problemas en ejecutar este comando en Windows
    puedes deshabilitar el uso de Docker Compose V2.
    Para esto desmarca la casilla correspondiente en el
    menú de Característica Experimentale (Experimental Features).

### Administrar WordPress

Ahora que tienes instalado WordPress en tu computadora, el siguiente paso es
aprender a administrarlo. Para esto puedes seguir la
[guia oficial](https://wordpress.org/support/article/first-steps-with-wordpress/)
y crear tu primer post, página, categoría, comentario, instalar un plugin y
personalizar la apariencia del sitio usando un WordPress Theme. Recuerda que
tu sitio WordPress se encuentra en [http://localhost](http://localhost).

### Aprender PHP

Lo siguiente que te recomendamos es aprender y practicar la sintaxis básica de
PHP para declarar variables, usar condicionales, estructuras de control y
definir funciones. El [manual oficial de PHP](https://www.php.net/manual/es/)
es una buena fuente de información para iniciar.

En la carpeta `php-playground` puedes crear tus archivos PHP de práctica y
ejecutarlos accediendo en un navegador web a
[http://localhost:8080](http://localhost:8080).
Por ejemplo en esta carpeta ya esta creado el archivo `hola.php` como se
indica en la lección
["Su primera página con PHP"](https://www.php.net/manual/es/tutorial.firstpage.php)
del [manual oficial de PHP](https://www.php.net/manual/es/).
Los archivos y el código que escribas en esta carpeta no afectarán a tu sitio
WordPress.

No olvides configurar tu IDE para desarrollar con PHP. Si usas VSCode puedes
verificar la [documentación oficial](https://code.visualstudio.com/docs/languages/php).

### Desarrollar un WordPress Plugin

En este punto, ya podrás comenzar a desarrollar tu plugin para WordPress. Puedes
iniciar desarrollando un plugin básico como se indica en la sección
[Plugin Basics](https://developer.wordpress.org/plugins/plugin-basics/)
del [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/).

### Otros recursos

* [PHP Oficial Manual](https://www.php.net/manual/es/)
* [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
* [How to use React inside a WordPress application?](https://dev.to/bobman38/how-to-use-react-inside-a-wordpress-application-49i)
* [How to Approach Modern WordPress Development (Part 1)](https://www.toptal.com/wordpress/modern-wordpress-development-pt-1)
* [How to Approach Modern WordPress Development (Part 2)](https://www.toptal.com/wordpress/modern-wordpress-development-pt-2)

## 7. Apache, MySQL y PHP

Apache, MySQL y PHP hacen posible que todos los días millones de usuarios
accedan a sus sitios y servicios web favoritos. Veamos
brevemente qué son y como interactúan cada uno de estos componentes.

* Apache es un servidor web desarrollado y mantenido por una comunidad
abierta. Un servidor web es un software que procesa solicitudes de clientes
para acceder a recursos web. Por ejemplo, cuando ingresas por Google Chrome
a la url [https://www.google.com](https://www.google.com),
el navegador web, que asume el rol de
cliente, envía peticiones para acceder a los archivos HTML, JS, CSS e
imágenes que conforman el sitio web de Google. Estas peticiones serán
procesadas por un servidor web quien eventualmente las responderá con
los recursos solicitados.

* MySQL es una base de datos relacional (RDBMS) de código abierto.
En MySQL podemos almacenar toda la información que nuestras aplicaciones
y sitios web necesitan para funcionar. Por ejemplo, un sitio web WordPress
almacena en MySQL la información de los usuarios, páginas, plugins,
entre otros.

* PHP es un lenguaje de programación usado, entre otras cosas, para crear
páginas web dinámicas. Por ejemplo, no podemos usar sólo HTML para extraer y
visualizar información de una base de datos. Para lograr esto, podemos escribir
código PHP para conectarnos y consultar la base de datos y
generar código HTML para visualizar la información extraída.

Finalmente, veamos cómo estos tres componentes interactúan entre sí:

El proceso comienza cuando el servidor web Apache recibe solicitudes desde el
navegador de un usuario. Si la solicitud es para un archivo PHP, Apache pasa
la solicitud a PHP, que carga el archivo y ejecuta el código contenido en el
archivo. Si el código lo indica, PHP se comunica con MySQL para buscar o
almacenar cualquier dato.

Luego, PHP usa el código en el archivo y la información de la base de datos
para crear el HTML. El HTML resultante es transferido al servidor web Apache
para que  este a su vez los envíe al navegador. Al final, el HTML es mostrado
por el navegador web al usuario.
