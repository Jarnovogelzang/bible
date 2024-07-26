# Use a slim base image to reduce size
FROM php:8.3-cli-alpine

# Install dependencies for Composer
RUN apk add --no-cache git zip

# Copy Composer from the official image
COPY --from=composer:2.7.7 /usr/bin/composer /usr/bin/composer

# Copy Composer files and install dependencies
COPY composer.* ./
RUN composer install --no-dev --optimize-autoloader --classmap-authoritative

# Copy the rest of the application code
COPY . .

# Set the entrypoint
ENTRYPOINT ["php", "index.php"]