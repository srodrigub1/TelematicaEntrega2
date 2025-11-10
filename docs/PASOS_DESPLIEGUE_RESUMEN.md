# Pasos de despliegue (resumen)

Este archivo resume los pasos mínimos para usar los contenidos de este proyecto
en una infraestructura tipo AWS (VPC con subred pública y privada).

1. Crear la infraestructura:
   - VPC, subred pública, subred privada, Internet Gateway, NAT Gateway.
   - Instancias EC2 para:
     - proxy-apache (pública)
     - dns-primary (pública)
     - dns-secondary (pública)
     - web-info (privada)
     - web-crud (privada)
     - db-users (privada)

2. En `web-info`:
   - Instalar NGINX.
   - Clonar este repo en `/var/www`.
   - Copiar `sitio-informativo/nginx-info.conf` a `/etc/nginx/sites-available/info`.
   - Habilitar el sitio y recargar NGINX.

3. En `db-users`:
   - Instalar MySQL o MariaDB.
   - Ejecutar el script `sitio-crud/schema.sql`.

4. En `web-crud`:
   - Instalar NGINX + PHP-FPM + php-mysql.
   - Copiar el contenido de `sitio-crud/` a `/var/www/sitio-crud`.
   - Ajustar las credenciales de `db.php`.
   - Copiar `sitio-crud/nginx-crud.conf` a `/etc/nginx/sites-available/crud`,
     habilitar el sitio y recargar NGINX.

5. En `proxy-apache`:
   - Instalar Apache2.
   - Habilitar los módulos `proxy` y `proxy_http`.
   - Copiar `proxy-apache/miempresa-info.conf` y `miempresa-crud.conf`
     a `/etc/apache2/sites-available/`.
   - Habilitar los sitios y recargar Apache.

6. En `dns-primary` y `dns-secondary`:
   - Instalar BIND9.
   - Usar los archivos de `dns-bind/` como referencia para `named.conf.local`
     y el archivo de zona.
   - Probar la configuración con `named-checkconf` y `named-checkzone`.
   - Verificar resolución de `www.miempresa.com` y `usuarios.miempresa.com`.

Documenta cada paso (comandos, capturas, pruebas) en tu informe para la entrega.
