@echo off
echo ========================================
echo   MOVING PROJECT OUT OF ONEDRIVE
echo ========================================
echo.

set SOURCE=%~dp0
set DEST=C:\laravel-projects\lazismu_lengkong

echo Source: %SOURCE%
echo Destination: %DEST%
echo.

REM Create destination folder
if not exist "C:\laravel-projects\" mkdir "C:\laravel-projects"

echo Creating destination folder...
mkdir "%DEST%" 2>nul

echo.
echo Copying project files (this may take a few minutes)...
echo.

REM Copy all files except node_modules and vendor (we'll reinstall them)
robocopy "%SOURCE%" "%DEST%" /E /XD node_modules vendor .git /XF *.log /NFL /NDL /NJH /NJS /nc /ns /np

echo.
echo ========================================
echo   COPY COMPLETED!
echo ========================================
echo.
echo Next steps:
echo 1. Close VS Code
echo 2. Open folder: %DEST%
echo 3. Run: composer install
echo 4. Run: npm install
echo 5. Run: php artisan serve
echo.
echo Opening destination folder...
explorer "%DEST%"

pause
