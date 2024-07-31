FROM php:8.3

# Install Composer and its dependencies
RUN apt update  \
    && apt install git unzip --no-install-recommends --yes \

COPY --from=composer:2.7.7 /usr/bin/composer /usr/bin/composer