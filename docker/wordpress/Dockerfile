FROM php:5.6-apache

RUN printf 'deb [trusted=yes] http://archive.debian.org/debian stretch main\n' > /etc/apt/sources.list \
  && apt-get -o Acquire::Check-Valid-Until=false update \
  && apt-get install -y \
   libpng-dev \
        libjpeg62-turbo-dev \
        libzip-dev \
        libwebp-dev \
        libonig-dev \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr \
    && docker-php-ext-install -j$(nproc) mysqli gd zip mbstring exif \
    && docker-php-ext-enable opcache \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

RUN { \
        echo '<Directory /var/www/html/>'; \
        echo '    AllowOverride All'; \
        echo '</Directory>'; \
    } >> /etc/apache2/apache2.conf

RUN { \
        echo 'opcache.enable=1'; \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=10000'; \
        echo 'opcache.validate_timestamps=1'; \
        echo 'opcache.revalidate_freq=0'; \
    } > /usr/local/etc/php/conf.d/opcache-recommended.ini
