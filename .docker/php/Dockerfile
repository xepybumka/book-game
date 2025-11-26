FROM node:21-alpine AS node
FROM php:8.2-fpm-alpine

RUN apk add --no-cache libstdc++ libgcc zip unzip curl \
    libpq-dev zlib-dev libpng-dev 

COPY --from=node /usr/local/lib/node_modules /usr/local/lib/node_modules
COPY --from=node /usr/local/include/node /usr/local/include/node
COPY --from=node /usr/local/share/man/man1/node.1 /usr/local/share/man/man1/node.1
COPY --from=node /usr/local/share/doc/node /usr/local/share/doc/node
COPY --from=node /usr/local/bin/node /usr/local/bin/node
COPY --from=node /opt/ /opt/
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm
RUN ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx

# Install PHP extensions
RUN docker-php-ext-install exif pcntl bcmath gd pdo pdo_pgsql pgsql

# Get Composer
COPY --from=composer:2.8.12 /usr/bin/composer /usr/bin/composer

ARG uid

# Create system user to run Composer and Artisan Commands
RUN adduser -D -u $uid user -G www-data

# set working directory
WORKDIR /var/www/

USER user