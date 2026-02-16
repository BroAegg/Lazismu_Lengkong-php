# 📦 Panduan Instalasi - LAZISMU Lengkong

Panduan lengkap instalasi sistem manajemen donasi LAZISMU Lengkong dari development hingga production.

---

## 📋 Daftar Isi

- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi Development](#instalasi-development)
- [Konfigurasi Environment](#konfigurasi-environment)
- [Database Setup](#database-setup)
- [Troubleshooting](#troubleshooting)
- [Production Deployment](#production-deployment)

---

## 🖥️ Persyaratan Sistem

### Minimum Requirements

| Software | Version | Keterangan |
|----------|---------|------------|
| **PHP** | >= 8.2 | Dengan extension: BCMath, Ctype, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML |
| **Composer** | >= 2.0 | Dependency manager untuk PHP |
| **MySQL** | >= 8.0 | Atau MariaDB >= 10.4 |
| **Node.js** | >= 18.x | Untuk build frontend assets |
| **NPM** | >= 9.x | Package manager untuk JavaScript |
| **Git** | >= 2.x | Version control |

### PHP Extensions Required
```bash
# Check PHP extensions
php -m | grep -E "bcmath|ctype|json|mbstring|openssl|pdo|tokenizer|xml|gd|zip"

# Install missing extensions (Ubuntu/Debian)
sudo apt install php8.2-bcmath php8.2-mbstring php8.2-xml php8.2-gd php8.2-zip php8.2-mysql
```

---

## 🚀 Instalasi Development

### 1. Clone Repository

```bash
# Clone dari Git
git clone https://github.com/yourusername/lazismulengkong.git
cd lazismulengkong

# Atau download ZIP dan extract
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

**Catatan:** Jika `composer install` lambat, gunakan:
```bash
composer install --no-dev --optimize-autoloader
```

### 3. Setup Environment

```bash
# Copy file .env.example
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env`:

```env
APP_NAME="LAZISMU Lengkong"
APP_ENV=local
APP_KEY=base64:...  # Auto-generated
APP_DEBUG=true
APP_TIMEZONE=Asia/Jakarta
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lazismu_lengkong
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database

```bash
# Login ke MySQL
mysql -u root -p

# Buat database
CREATE DATABASE lazismu_lengkong CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

### 6. Migrasi & Seed Database

```bash
# Run migrations
php artisan migrate

# Seed data awal (users, categories, programs, settings)
php artisan db:seed

# Atau gabungkan keduanya
php artisan migrate:fresh --seed
```

**Seeded Data:**
- 7 users dengan 5 role berbeda
- 6 programs dengan pillar
- 4 parent categories + 14 sub-categories
- 18 system settings (nisab, bank accounts, contact info)
- 50 sample donations

### 7. Storage Link

```bash
# Link storage folder untuk upload
php artisan storage:link
```

### 8. Build Assets

```bash
# Development build (unminified)
npm run dev

# Production build (minified)
npm run build

# Watch mode (auto-rebuild on file change)
npm run dev --watch
```

### 9. Run Development Server

```bash
# Start Laravel development server
php artisan serve

# Server akan running di: http://127.0.0.1:8000
```

**Alternative:** Gunakan Laravel Herd, XAMPP, atau Docker

---

## ⚙️ Konfigurasi Environment

### Environment Variables Lengkap

```env
# Application
APP_NAME="LAZISMU Lengkong"
APP_ENV=local
APP_KEY=base64:your_generated_key_here
APP_DEBUG=true
APP_TIMEZONE=Asia/Jakarta
APP_URL=http://127.0.0.1:8000

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lazismu_lengkong
DB_USERNAME=root
DB_PASSWORD=

# Logging
LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# Session & Cache
SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database

# Queue (for future email notifications)
QUEUE_CONNECTION=database

# Mail (configure untuk email notifications)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@lazismulengkong.org
MAIL_FROM_NAME="LAZISMU Lengkong"

# Filesystem
FILESYSTEM_DISK=public

# DomPDF Settings (optional)
DOMPDF_ENABLE_REMOTE=true
DOMPDF_ENABLE_PHP=false
```

---

## 🗄️ Database Setup

### Manual Database Creation

```sql
-- Login sebagai root
mysql -u root -p

-- Create database
CREATE DATABASE lazismu_lengkong 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Create dedicated user (optional, recommended for production)
CREATE USER 'lazismu_user'@'localhost' IDENTIFIED BY 'secure_password_here';
GRANT ALL PRIVILEGES ON lazismu_lengkong.* TO 'lazismu_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Update `.env`:
```env
DB_USERNAME=lazismu_user
DB_PASSWORD=secure_password_here
```

### Migration Commands

```bash
# Run all migrations
php artisan migrate

# Rollback last batch
php artisan migrate:rollback

# Rollback all migrations
php artisan migrate:reset

# Fresh install (drop all tables + re-migrate)
php artisan migrate:fresh

# Fresh + seed
php artisan migrate:fresh --seed

# Check migration status
php artisan migrate:status
```

### Seeder Commands

```bash
# Run all seeders
php artisan db:seed

# Run specific seeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=DonationCategorySeeder
php artisan db:seed --class=ProgramSeeder

# Available seeders:
# - UserSeeder (7 users)
# - DonationCategorySeeder (4 parents + 14 sub-categories)
# - ProgramSeeder (6 programs)
# - PillarSeeder (5M Muhammadiyah)
# - SettingSeeder (18 settings)
# - DonationSeeder (50 sample donations)
```

---

## 🔧 Troubleshooting

### Issue 1: Composer Install Error

**Error:**
```
Your requirements could not be resolved to an installable set of packages.
```

**Solution:**
```bash
# Update composer
composer self-update

# Clear cache
composer clear-cache

# Install dengan flag
composer install --ignore-platform-reqs
```

### Issue 2: Permission Denied (Storage/Bootstrap)

**Error:**
```
file_put_contents(/path/storage/framework/views/...): Failed to open stream
```

**Solution:**
```bash
# Linux/Mac
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R $USER:www-data storage bootstrap/cache

# Windows (run as Administrator in PowerShell)
icacls storage /grant Users:F /t
icacls bootstrap/cache /grant Users:F /t
```

### Issue 3: Migration Error (SQLSTATE[42000])

**Error:**
```
SQLSTATE[42000]: Syntax error or access violation
```

**Solution:**
```bash
# Check database connection
php artisan tinker
>>> DB::connection()->getPdo();

# Drop database dan recreate
mysql -u root -p
DROP DATABASE IF EXISTS lazismu_lengkong;
CREATE DATABASE lazismu_lengkong CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;

# Re-migrate
php artisan migrate:fresh --seed
```

### Issue 4: NPM Build Error

**Error:**
```
Error: Cannot find module 'vite'
```

**Solution:**
```bash
# Remove node_modules dan reinstall
rm -rf node_modules package-lock.json
npm install

# Update npm
npm install -g npm@latest
```

### Issue 5: Storage Link Already Exists

**Error:**
```
The [public/storage] link already exists.
```

**Solution:**
```bash
# Remove existing link
rm public/storage

# Recreate link
php artisan storage:link
```

### Issue 6: Class Not Found After Update

**Error:**
```
Class 'App\Http\Controllers\...' not found
```

**Solution:**
```bash
# Clear all cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Regenerate autoload
composer dump-autoload
```

---

## 🌐 Production Deployment

### Pre-Deployment Checklist

- [ ] Backup database production (jika update)
- [ ] Test semua fitur di staging environment
- [ ] Update `.env` dengan credentials production
- [ ] Set `APP_ENV=production` dan `APP_DEBUG=false`
- [ ] Generate strong `APP_KEY` baru
- [ ] Configure mail settings
- [ ] Setup SSL certificate (HTTPS)
- [ ] Configure proper file permissions

### 1. Server Requirements

**Recommended Server Specs:**
- **CPU:** 2+ cores
- **RAM:** 2GB+ (4GB recommended)
- **Storage:** 20GB+ SSD
- **OS:** Ubuntu 22.04 LTS atau newer

**Web Server:** Nginx atau Apache dengan PHP-FPM

### 2. Upload Files

```bash
# Via Git (recommended)
cd /var/www/html
git clone https://github.com/yourusername/lazismulengkong.git
cd lazismulengkong

# Via FTP/SFTP
# Upload semua file kecuali:
# - .git
# - node_modules
# - vendor (akan di-install di server)
```

### 3. Install Dependencies

```bash
# PHP dependencies (production only)
composer install --no-dev --optimize-autoloader

# JavaScript dependencies
npm install --production
npm run build
```

### 4. Environment Setup

```bash
# Copy .env
cp .env.example .env

# Generate key
php artisan key:generate

# Edit .env untuk production
nano .env
```

**Production `.env`:**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://lazismu-lengkong.org

DB_HOST=localhost
DB_DATABASE=lazismu_production
DB_USERNAME=lazismu_prod
DB_PASSWORD=strong_password_here

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
# ... configure email
```

### 5. Database Migration

```bash
# Run migration (HATI-HATI, jangan pakai --seed di production!)
php artisan migrate --force

# Jika fresh install
php artisan migrate:fresh --seed --force
```

### 6. Permissions

```bash
# Set ownership
sudo chown -R www-data:www-data /var/www/html/lazismulengkong

# Set permissions
sudo find /var/www/html/lazismulengkong -type f -exec chmod 644 {} \;
sudo find /var/www/html/lazismulengkong -type d -exec chmod 755 {} \;

# Storage & cache writable
sudo chmod -R 775 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

### 7. Optimization

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer dump-autoload --optimize
```

### 8. Queue Worker (Optional)

Setup supervisor untuk queue worker:

```bash
# Install supervisor
sudo apt install supervisor

# Create config
sudo nano /etc/supervisor/conf.d/lazismu-worker.conf
```

**Config file:**
```ini
[program:lazismu-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/html/lazismulengkong/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/html/lazismulengkong/storage/logs/worker.log
stopwaitsecs=3600
```

```bash
# Reload supervisor
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start lazismu-worker:*
```

### 9. Nginx Configuration

```nginx
server {
    listen 80;
    listen [::]:80;
    server_name lazismu-lengkong.org www.lazismu-lengkong.org;
    return 301 https://$server_name$request_uri;
}

server {
    listen 443 ssl http2;
    listen [::]:443 ssl http2;
    server_name lazismu-lengkong.org www.lazismu-lengkong.org;
    root /var/www/html/lazismulengkong/public;

    # SSL Configuration
    ssl_certificate /etc/letsencrypt/live/lazismu-lengkong.org/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/lazismu-lengkong.org/privkey.pem;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### 10. SSL Certificate

```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Generate certificate
sudo certbot --nginx -d lazismu-lengkong.org -d www.lazismu-lengkong.org

# Auto-renewal test
sudo certbot renew --dry-run
```

### 11. Backup Setup

```bash
# Create backup script
sudo nano /usr/local/bin/backup-lazismu.sh
```

**Backup script:**
```bash
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/var/backups/lazismu"
DB_NAME="lazismu_production"
DB_USER="lazismu_prod"
DB_PASS="password_here"

# Create backup directory
mkdir -p $BACKUP_DIR

# Backup database
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > $BACKUP_DIR/db_$DATE.sql

# Backup files
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/html/lazismulengkong/storage/app/public

# Keep only last 7 days
find $BACKUP_DIR -name "db_*.sql" -mtime +7 -delete
find $BACKUP_DIR -name "files_*.tar.gz" -mtime +7 -delete
```

```bash
# Make executable
sudo chmod +x /usr/local/bin/backup-lazismu.sh

# Add to crontab (daily at 2 AM)
sudo crontab -e
0 2 * * * /usr/local/bin/backup-lazismu.sh
```

---

## ✅ Verifikasi Instalasi

### Check Instalasi Berhasil

1. **Homepage:** `https://your-domain.com` → Harus tampil homepage
2. **Login:** `https://your-domain.com/login` → Form login tampil
3. **Admin Login:** Gunakan `kepala@lazismulengkong.org` / `password123`
4. **Admin Dashboard:** `https://your-domain.com/admin/dashboard` → Stats tampil
5. **Test Donasi:** `/donasi` → Form submit berhasil
6. **PDF Export:** `/admin/laporan` → Export PDF berhasil

### Health Check Commands

```bash
# Check PHP version
php -v

# Check Laravel version
php artisan --version

# Check database connection
php artisan tinker
>>> DB::connection()->getPdo();

# Check migrations
php artisan migrate:status

# Check routes
php artisan route:list

# Check queue status
php artisan queue:work --once
```

---

## 📞 Support

Jika mengalami kendala instalasi:

1. Cek [Troubleshooting](#troubleshooting) section
2. Review Laravel logs: `storage/logs/laravel.log`
3. Check web server logs: `/var/log/nginx/error.log`
4. Contact developer team

---

**Last Updated:** Februari 2026  
**Version:** 1.0.0
