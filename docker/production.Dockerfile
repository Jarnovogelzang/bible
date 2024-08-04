# Use a slim base image to reduce size
FROM php:8.3-cli-alpine AS preparation-stage

# Install dependencies for Composer
RUN apk add --no-cache git unzip

# Copy Composer from the official image
COPY --from=composer:2.7.7 /usr/bin/composer /usr/bin/composer

WORKDIR /usr/src/app

# Copy Composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-autoloader

# Copy the needed application code
COPY application.php .
COPY src ./src

# Dump Composer's autoloader (see https://getcomposer.org/doc/articles/autoloader-optimization.md)
RUN composer dumpautoload --classmap-authoritative --optimize

# Build the PHP binary using FrankenPHP (see https://frankenphp.dev/docs/embed/)
FROM --platform=linux/amd64 dunglas/frankenphp:static-builder AS building-stage

# Copy your app
WORKDIR /go/src/app/dist/app
COPY --from=preparation-stage /usr/src/app .

# Build the static binary
WORKDIR /go/src/app/
RUN EMBED=dist/app/ NO_COMPRESS=1 ./build-static.sh
