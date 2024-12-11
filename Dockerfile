# Verwende das offizielle PHP-Image als Basis
FROM php:8.4-apache

# Installiere notwendige PHP-Erweiterungen
RUN docker-php-ext-install mysqli pdo pdo_mysql

# # Kopiere den Inhalt des aktuellen Verzeichnisses in das Verzeichnis /var/www/html im Container
# COPY . /var/www/html

# Setze den Arbeitsordner
WORKDIR /var/www/html

# Exponiere Port 80
EXPOSE 80

# Starte den Apache-Webserver
CMD ["apache2-foreground"]