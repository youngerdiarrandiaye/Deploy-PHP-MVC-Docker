FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip pdo_mysql

COPY . /var/www/html/

ENV APACHE_DOCUMENT_ROOT /var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# ✅ AJOUT 1 : Apache écoute réellement sur 8080 (EXPOSE ne suffit pas)
RUN sed -ri -e 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -ri -e 's/:80>/:8080>/' /etc/apache2/sites-available/000-default.conf

# Logs vers stdout/stderr via les directives Apache (robuste sous UID arbitraire)
RUN sed -ri 's!^ErrorLog .*!ErrorLog /proc/self/fd/2!' /etc/apache2/apache2.conf && \
    sed -ri 's!CustomLog .*!CustomLog /proc/self/fd/1 combined!' /etc/apache2/sites-available/000-default.conf && \
    sed -ri 's!CustomLog .*!CustomLog /proc/self/fd/1 combined!g' /etc/apache2/conf-available/other-vhosts-access-log.conf

RUN a2enmod rewrite

RUN echo "<Directory /var/www/html>" > /etc/apache2/conf-available/myapp.conf && \
    echo "    Options Indexes FollowSymLinks" >> /etc/apache2/conf-available/myapp.conf && \
    echo "    AllowOverride All" >> /etc/apache2/conf-available/myapp.conf && \
    echo "    DirectoryIndex index.php" >> /etc/apache2/conf-available/myapp.conf && \
    echo "    Require all granted" >> /etc/apache2/conf-available/myapp.conf && \
    echo "</Directory>" >> /etc/apache2/conf-available/myapp.conf && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf && \
    a2enconf myapp

# ✅ MODIFIÉ : permissions pour l'UID arbitraire OpenShift (groupe 0),
#    remplace chown www-data + chmod 755
RUN chgrp -R 0 /var/www/html /var/run /var/log/apache2 /etc/apache2 && \
    chmod -R g=u /var/www/html /var/run /var/log/apache2 /etc/apache2

EXPOSE 8080
