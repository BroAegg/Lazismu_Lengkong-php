@echo off
echo Clearing Laravel Caches...
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

echo.
echo Optimizing Composer Autoload...
composer dump-autoload -o

echo.
echo Clearing Opcache (if enabled)...
php artisan optimize:clear

echo.
echo Performance fix completed!
pause
