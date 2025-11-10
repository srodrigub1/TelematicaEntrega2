# Entrega 2 - Despliegue de Servicios

Este repositorio contiene una posible solución **desde cero** para la entrega 2
del curso de redes/servicios, basada en el enunciado:

- 2 sitios web:
  - `sitio-informativo`: sitio estático con información general.
  - `sitio-crud`: aplicación web con CRUD de usuarios usando PHP + MySQL.
- Arquitectura pensada para desplegarse en AWS dentro de una VPC con:
  - Subred pública (proxy reverso + DNS primario/secundario).
  - Subred privada (servidores web NGINX + base de datos).
- Proxy reverso con **Apache**.
- Servidores web con **NGINX**.
- Servicio DNS con **BIND9** (primario y secundario).

> Importante: este código no crea la infraestructura de AWS automáticamente;
> provee los archivos de configuración y la estructura de los sitios web para
> que puedas montarlos en tus instancias EC2 y documentar el despliegue.
