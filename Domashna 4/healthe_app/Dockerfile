FROM php:7.4-apache

# PhantomJS needs these libs for screen capture
RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
        libfreetype6 \
        libfontconfig1 \
        libpng-dev \
        poppler-utils && \
    # Cleanup image
    apt-get -yqq autoremove && \
    apt-get -yqq clean && \
    rm -rf /var/lib/apt/lists/* /var/cache/* /tmp/* /var/tmp/*

RUN a2enmod rewrite

# Install needed php extensions
RUN docker-php-ext-install gd pdo_mysql

RUN docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache
COPY opcache.ini $PHP_INI_DIR/conf.d/

COPY apache-default.conf /etc/apache2/sites-available/000-default.conf
COPY php.ini $PHP_INI_DIR
RUN chown www-data:www-data $PHP_INI_DIR/php.ini

COPY . /var/www

# Make public storage dir syslink (Laravel convention)
RUN mkdir -p /var/www/public/storage && \
    mkdir -p /var/www/public/storage/images && \
    mkdir -p /var/www/public/storage/images/products && \
    mkdir -p /var/www/public/storage/images/materials && \
    # Make syslink to public storage for booking attachments
    rm -rf /var/www/public/storage/images/products && ln -s /var/www/storage/app/images/products /var/www/public/storage/images/products && \
    rm -rf /var/www/public/storage/images/materials && ln -s /var/www/storage/app/images/materials /var/www/public/storage/images/materials && \
    # Make storage directories writable
    chown -R www-data:www-data /var/www/bootstrap/cache /var/www/storage

# Override base entrypoint file, to do some extra things on startup (ie. copy env logo)
COPY docker-php-entrypoint /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-php-entrypoint

WORKDIR /var/www
