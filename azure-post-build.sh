# #!/bin/bash

# # 1. Move to the directory where package.json lives (the root)
# cd /home/site/wwwroot

# # 2. Install JS dependencies and build assets
# echo "Running NPM Build..."
# npm install
# npm run build

# # 3. Optimization for Production
# echo "Caching Laravel config..."
# php artisan config:cache
# php artisan route:cache
# php artisan view:cache

# # 4. Set Permissions 
# # (Azure App Service runs as 'www-data' or similar; 
# # ensuring storage is writable prevents 500 errors)
# chmod -R 775 storage bootstrap/cache

#!/bin/bash

# Navigate to the deployment source (where your code actually sits during build)
# If DEPLOYMENT_TARGET isn't set, fallback to the standard site root



# TARGET_DIR="${DEPLOYMENT_TARGET:-/home/site/wwwroot}"
# cd "$TARGET_DIR"

# echo "Current directory: $(pwd)"
# echo "Checking for package.json..."

# if [ -f "package.json" ]; then
#     echo "package.json found. Starting build..."
    
#     # Force npm to use the local directory and ignore global config conflicts
#     npm install --prefix "$TARGET_DIR"
#     npm run build --prefix "$TARGET_DIR"
    
#     echo "Vite build successful."
# else
#     echo "ERROR: package.json not found in $(pwd)"
#     exit 1
# fi

# # Optional: Laravel optimizations
# php artisan config:cache
# php artisan route:cache




#!/bin/bash

# Azure pulls GitHub code into /home/site/repository during the build phase.
# If that's missing, we fall back to wwwroot.
# if [ -d "/home/site/repository" ]; then
#     export REPO_DIR="/home/site/repository"
# else
#     export REPO_DIR="/home/site/wwwroot"
# fi

# cd "$REPO_DIR"

# echo "Build Directory: $(pwd)"

# if [ -f "package.json" ]; then
#     echo "package.json found. Installing and Building..."
    
#     # 1. Install dependencies
#     npm install
    
#     # 2. Compile Vite assets
#     npm run build
    
#     echo "Build process finished successfully."
# else
#     echo "Error: package.json not found in $(pwd)"
#     ls -la # This helps you see what Azure actually sees in the logs
#     exit 1
# fi

# # 3. THE CRITICAL STEP: Sync the build to the live web root
# # This ensures /home/site/wwwroot/public/build exists
# echo "Syncing build folder to wwwroot..."
# mkdir -p /home/site/wwwroot/public/build
# cp -rv public/build/* /home/site/wwwroot/public/build/





#!/bin/bash

# 1. Enter the build directory
if [ -d "/home/site/repository" ]; then
    cd /home/site/repository
else
    cd /home/site/wwwroot
fi

# 2. Run the build
echo "Installing and Building Vite assets in $(pwd)..."
npm install
npm run build

# 3. THE CRITICAL STEP: Sync the build to the live web root
# This ensures /home/site/wwwroot/public/build exists
echo "Syncing build folder to wwwroot..."
mkdir -p /home/site/wwwroot/public/build
cp -rv public/build/* /home/site/wwwroot/public/build/

# 4. Final Permissions Check
chmod -R 775 /home/site/wwwroot/storage /home/site/wwwroot/bootstrap/cache