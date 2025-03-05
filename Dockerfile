# Utiliser une image PHP avec Apache
FROM php:8.2-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip pdo_mysql

# Copier les fichiers de l'application
COPY . /var/www/html/

# Configurer Apache pour utiliser la racine comme répertoire de document
ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Activer le module Apache rewrite
RUN a2enmod rewrite

# Configurer DirectoryIndex pour servir index.php
RUN echo "<Directory /var/www/html>" > /etc/apache2/conf-available/myapp.conf
RUN echo "    Options Indexes FollowSymLinks" >> /etc/apache2/conf-available/myapp.conf
RUN echo "    AllowOverride All" >> /etc/apache2/conf-available/myapp.conf
RUN echo "    DirectoryIndex index.php" >> /etc/apache2/conf-available/myapp.conf
RUN echo "    Require all granted" >> /etc/apache2/conf-available/myapp.conf
RUN echo "</Directory>" >> /etc/apache2/conf-available/myapp.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN a2enconf myapp

# Exposer le port 80
EXPOSE 80