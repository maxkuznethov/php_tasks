FROM php:apache
RUN docker-php-ext-install mysqli  && \
    a2enmod authn_dbd && \
    apt-get update && \
    apt-get install -y libaprutil1-dbd-mysql && \
        a2enmod rewrite
RUN pecl install redis && docker-php-ext-enable redis