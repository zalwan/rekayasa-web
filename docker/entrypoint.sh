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

if [ "${SKIP_DB_BOOTSTRAP:-false}" != "true" ]; then
    attempts=0

    until php artisan migrate --seed --force; do
        attempts=$((attempts + 1))

        if [ "$attempts" -ge 30 ]; then
            echo "Database bootstrap failed after ${attempts} attempts."
            exit 1
        fi

        echo "Database is not ready yet. Retrying in 2 seconds..."
        sleep 2
    done
fi

exec "$@"
