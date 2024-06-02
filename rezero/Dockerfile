FROM phpmyadmin

# Mettre à jour les paquets et installer les dépendances nécessaires
RUN apt-get update \
    && apt-get install -y \
    && a2enmod rewrite \
    && docker-php-ext-install pdo pdo_mysql 



# Copier le fichier de configuration PHP personnalisé
COPY uploads.ini /usr/local/etc/php/conf.d/
