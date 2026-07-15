#!/bin/bash

# Clear configuration and views caching to ensure clean state
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Run migrations automatically
echo "Running migrations..."
php artisan migrate --force

# Seed database automatically (invitation & settings data)
echo "Seeding database..."
php artisan db:seed --force

# Start FrankenPHP Caddy server
echo "Starting FrankenPHP server..."
docker-php-entrypoint --config /Caddyfile --adapter caddyfile 2>&1
