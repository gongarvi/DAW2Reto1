# Instalación de la página web
## Descarga
Para instalar el proyecto primero se debe descargar. Para ello se le deba dar al boton code y descargarlo como zip.

Una vez descargado se debe descompirmir el zip.

## XAMPP
Se necesita tener instalado XAMPP para hacer funcionar la página web. Una vez instalado abrimos el xampp-controller y hacemos funcionar apache y mysql.

## IMPORTAR LA BASE DE DATOS
Una vez tengamos los servicios de apache y msql funcionando, se debe importar la Base de datos. Para ello iremos a la pagina web: "localhost/phpmyadmin". En la navegación superior iremos a importar y seleccionaremos el archivo blog_wiki.sql.
## CONFIGURACIÓN DE APACHE
Una vez importado la base de datos debemos configurar la ruta del servidor.
Para ello debemos ir a la configuracion de httpd.conf que se encuentra en el apartado de 
```
xampp-controller->config.
```

Se nos abrirá el bloc de notas. Buscaremos la palabra (mediante ctr+b) "DocumentRoot". Sustituimos la ruta entrecomillada por la ruta donde se descomprimió la pagina web y lo guardamos. [Apunte 1]

Para finalizar reiniciaremos el servicio de apache para que se apliquen los cambios realizados.

[Apunte 1]: Se debe cambiar las linea documentroot y directory. No olvidarse de las comillas dobles, indican el inicio y el fin de la ruta.
