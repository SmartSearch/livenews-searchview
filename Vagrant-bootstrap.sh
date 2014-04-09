#!/usr/bin/env bash

# Actualizamos el repositorio
apt-get update

# Instalamos Apache2 y PHP5
apt-get install -y apache2 php5

# Instalamos algunas otras herramientas útiles
apt-get install -y curl git
# También el composer
mkdir /home/vagrant/bin
curl -sS https://getcomposer.org/installer | php -- --install-dir=/home/vagrant/bin

# Reconfiguramos Apache2 para que se ejecute con el usuario vagrant
service apache2 stop
rm -fr /var/lock/apache2
sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=vagrant/g' /etc/apache2/envvars
service apache2 restart

# Ubicamos el directorio raíz de Apache2
# en el directorio público de Silex.
rm -fr /var/www
ln -fs /home/vagrant/devlab/web /var/www

