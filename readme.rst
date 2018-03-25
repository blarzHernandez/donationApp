###################
Donation App
###################

###################
Stack
###################
- PHP5
- HTML
- CSS3
- BOOTSTRAP 4
- JQUERY 
- MYSQL


###################
Guia de Uso
###################

************
Instalacion
************
1- Clonar el repositorio : git clone https://github.com/blarzHernandez/donationApp.git o descargue el archivo ZIP

2- Copiar en la carpeta de su web server

3- Ejecutarlo en la ruta : http://localhost/donationApp/

************
Base de Datos
************
1- Asegurese que este corriendo el servicio/base de datos de MYSQL 

2- Importe el archivo(script) de base de datos localizado en la carpeta principal del proyecto, llamado donationdb.sql

3- Actualice los datos de conexion a la BD si son distintos de: username:root y password: ''. El archivo se encuentra en la ruta donationApp/application/config/database.php


DATOS DE PRUEBA
username:blarz@gmail.com
password:123


************
 Servicio REST
************
1- Obtener todas las donaciones, ejecute la siguiente URL: http://localhost/donationApp/servicexxx

2 - Obtener una Donacion Especifica : http://localhost/donationApp/servicexxx/find/3




###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
