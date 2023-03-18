FROM php:7.4-fpm-alpine

RUN apk add oniguruma-dev postgresql-dev libxml2-dev
RUN docker-php-ext-install \
        bcmath \
        ctype \
        fileinfo \
        json \
        mbstring \
        pdo_mysql \
        pdo_pgsql \
        tokenizer \
        xml

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV production

WORKDIR /app/api-pontue
COPY . .

RUN COMPOSER_VENDOR_DIR="/app/vendor"

RUN composer install --no-interaction --ignore-platform-req=ext-sockets

# Optimizing Configuration loading
RUN php artisan config:cache
# Optimizing Route loading
RUN php artisan route:cache
# Optimizing View loading
RUN php artisan view:cache

COPY ./run.sh /tmp
RUN chmod +x run.sh


ENTRYPOINT ["sh", "/tmp/run.sh"]