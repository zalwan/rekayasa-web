#!/usr/bin/env sh
set -e

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ ! -f vendor/autoload.php ]; then
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

if [ ! -d node_modules ]; then
    npm install
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force
fi

exec "$@"
