# Instalación de la página web
## Descarga
1.Para instalar el proyecto primero se debe descargar. Para ello se le deba dar al boton code y descargarlo como zip.

2.Una vez descargado se debe descompirmir el zip.

## XAMPP
3.Se necesita tener instalado __XAMPP__ para hacer funcionar la página web. Una vez instalado abrimos el __xampp-controller__ y hacemos funcionar _apache_ y _mysql_.

## IMPORTAR LA BASE DE DATOS
4.Una vez tengamos los servicios de _apache_ y _mysql_ funcionando, se debe importar la Base de datos. Para ello iremos a la pagina web: _localhost/phpmyadmin_. En la navegación superior iremos a importar y seleccionaremos el archivo blog_wiki.sql.
## CONFIGURACIÓN DE _APACHE_
6.Una vez importado la base de datos debemos configurar la ruta del servidor.
Para ello debemos ir a la configuracion de __httpd.conf__ que se encuentra en el apartado de 
```
xampp-controller->config.
```

7.Se nos abrirá el bloc de notas. Buscaremos la palabra (mediante ctr+b) "DocumentRoot". Sustituimos la ruta entrecomillada por la ruta donde se descomprimió la pagina web y lo guardamos. [Apunte 1]

8.Para finalizar reiniciaremos el servicio de _apache_ para que se apliquen los cambios realizados.

[Apunte 1]: Se debe cambiar las linea documentroot y directory. No olvidarse de las comillas dobles, indican el inicio y el fin de la ruta.
