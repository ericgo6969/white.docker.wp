Wordpress + Nginx + PHP8.2 + MySQL
==================================

White wordpress in new folder structure:
----------------------------------------

|   /app - wordpress core folder
|   /config - wordpress config (wp-config.php)
|   /extra-module - mu-plugins folder
|   /modules - plugins folder
|   /themes - themes folder
|   /uploads - upload folder
|   nginx.conf - all nginx docker server config
|   router.php - new folder name variable

Install
-------

.. code::bash

    docker-compose -f docker-compose.yml up -d


Port
====

| Wordpress: 8443
| MySQL: 3006
