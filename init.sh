#!/bin/bash
usermod -s /bin/bash www-data
chown -R  www-data:www-data /var/www
chmod -R 777 /var/www

service apache2 start
su -c '/usr/bin/aria2c --conf-path=/cldata/aria2.conf' www-data