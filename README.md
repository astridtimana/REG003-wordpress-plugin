# Donation Plugin

## Índice

* [1. Descripción](#1-preámbulo)
* [2. ¿Cómo instalar el plugin?](#2-¿cómo-instalar-el-plugin?)
* [3. ¿Cómo usar el plugin en la web master?](#3-¿Cómo-usar-el-plugin?)
* [4. Ejemplo de uso](#4-ejemplo-de-uso)

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

Por otro lado, una descripción corta del plugin es como sigue:

```
/*
Plugin Name: Plugin Donation
Plugin URI: https://example.com/plugin-name
Description: Este un plugin para donación de dinero a organizaciones sin fines de lucro y puede ser integrado con la pasarela de pago Culqi.
Version: 0.0.1
Requires at Least: 5.6.1
Requires PHP: 7.4.14
Author: Astrid Timaná & Mery Vera
Licence: MIT
*/
```

## 2. ¿Cómo instalar el plugin?

Es súper sencillo tener agregarlo a tu proyecto de wordpress. Puedes instalarlo 
directamente subiendo el zip que encontrarás en este repositorio. El archivo se llama:

> 📁 wp-content/plugins/wordpressProject

Teniendo esa carpeta, se instala directamente en la interfaz de administración de tu 
sitio de WordPress. Si estás desarrollando uno, manualmente puedes guardarlo en tu desarrollo.

## 3. ¿Cómo usar el plugin en la web master?

Teniendo el plugin instalado en WordPress, podrás observar dentro del menú 3 opciones.

### 3.1. Instrucciones

En las siguientes imágenes, te mostramos cómo hacer uso del plugin:



### 3.2. Historial de Donaciones

Cuando una donación se ha efectuado a través del CULQI de forma **exitosa**, los datos del 
formulario son almacenados en MySQL. Estos son reflados en la tabla de *Historial de Donaciones*.


### 3.3. Settings de CULQI

En este submenú, se colocan las llaves públicas y secretas de la cuenta asociada a CULQI.


## 4. Ejemplo de uso

De forma muy sencilla, puedes observar cómo luce el plugin hacia el usuario final que será 
un próximo donante.