# Task Manager

## Setup Instructions

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/task-manager.git
    cd task-manager
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Copy the `.env.example` file to `.env` and update the database credentials:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Run migrations:
    ```bash
    php artisan migrate
    ```

5. Start the development server:
    ```bash
    php artisan serve
    ```

## Deployment Instructions

1. Follow the setup instructions above on your production server.
2. Set the environment to production in the `.env` file:
    ```env
    APP_ENV=production
    APP_DEBUG=false
    ```

3. Configure a web server such as Apache or Nginx to serve the Laravel application.
4. Run the following commands to build the frontend assets and optimize the application:
    ```bash
    npm run production
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

5. Ensure proper file permissions for storage and cache directories:
    ```bash
    chown -R www-data:www-data storage
    chown -R www-data:www-data bootstrap/cache
    ```

6. Set up a cron job for Laravel scheduled tasks:
    ```bash
    * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
    ```

Now you have a simple Laravel web application for task management with project functionality.
