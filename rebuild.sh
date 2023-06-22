composer dump-autoload
php artisan migrate:fresh --seed
php artisan admin:install
php artisan db:seed --class=AdminTablesSeeder
