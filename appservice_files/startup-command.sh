# Define the root strictly
SITE_ROOT="/home/site/wwwroot"

# Overrite  default NGINX config file
cp /home/site/wwwroot/appservice_files/default-nginx /etc/nginx/sites-enabled/default

# restart nginx
service nginx restart

# Ensure Laravel structure exists using Absolute Paths
mkdir -p "$SITE_ROOT/storage/framework/sessions"
mkdir -p "$SITE_ROOT/storage/framework/views"
mkdir -p "$SITE_ROOT/storage/framework/cache/data"
mkdir -p "$SITE_ROOT/storage/app/public"
mkdir -p "$SITE_ROOT/bootstrap/cache"

# Fix permissions using Absolute Paths
chown -R www-data:www-data "$SITE_ROOT/storage" "$SITE_ROOT/bootstrap/cache"
chmod -R 775 "$SITE_ROOT/storage" "$SITE_ROOT/bootstrap/cache"

# Run artisan commands
php "$SITE_ROOT/artisan" migrate --force
# Clear caches
php "$SITE_ROOT/artisan" cache:clear
# Clear and cache routes
php "$SITE_ROOT/artisan" route:cache
# Clear and cache config
php "$SITE_ROOT/artisan" config:cache
# Clear and cache views
php "$SITE_ROOT/artisan" view:cache





#Fix permissions for Laravel
# chmod -R 775 /home/site/wwwroot/storage /home/site/wwwroot/bootstrap/cache
# php /home/site/wwwroot/artisan migrate --force

