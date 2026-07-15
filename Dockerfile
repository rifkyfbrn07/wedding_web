FROM dunglas/frankenphp:php8.3

# Install Composer from the official Composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN install-php-extensions \
    pdo_mysql \
    bcmath \
    exif \
    gd \
    intl \
    opcache \
    zip

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN apt-get update && \
    apt-get install -y curl && \
    curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && \
    apt-get install -y nodejs

RUN npm install
RUN npm run build

RUN php artisan storage:link || true

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
