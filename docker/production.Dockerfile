# Use a slim base image to reduce size
FROM php:8.3-cli-alpine

# Install dependencies for Composer
RUN apk add --no-cache git unzip

# Copy Composer from the official image
COPY --from=composer:2.7.7 /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/app

# Copy Composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-autoloader

# Copy the needed application code
COPY . .
RUN composer dumpautoload --classmap-authoritative --optimize

# Set the default command
CMD [ "php", "application.php", "list" ]