web: vendor/bin/heroku-php-nginx -C nginx.conf public/
worker: php artisan queue:work redis --queue=default,normal --sleep=3 --tries=3 --daemon
scheduler: php -d memory_limit=512M artisan schedule:cron
