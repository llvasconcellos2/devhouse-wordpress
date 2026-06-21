FROM php:5.6-apache

RUN printf 'deb [trusted=yes] http://archive.debian.org/debian stretch main\n' > /etc/apt/sources.list \
  && apt-get -o Acquire::Check-Valid-Until=false update \
  && apt-get install -y \
   libpng-dev \
        libjpeg62-turbo-dev \
        libzip-dev \
        libwebp-dev \
        libonig-dev \
    && docker-php-ext-configure gd --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) mysqli gd zip mbstring exif \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

RUN { \
        echo '<Directory /var/www/html/>'; \
        echo '    AllowOverride All'; \
        echo '</Directory>'; \
    } >> /etc/apache2/apache2.conf
