# Task Manager

## System Requirements

- **PHP**: 7.4 or higher
- **Composer**: Latest version
- **Node.js**: 16.x or higher
- **MySQL**: 5.7 or higher (or compatible database like MariaDB)

## Setup Instructions

1. **Clone the repository:**
    ```bash
    git clone https://github.com/taha-yasin-saad/task_manager.git
    cd task_manager
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Copy the `.env.example` file to `.env` and update the database credentials:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Set up the database:**
    - Create a new database for the application (e.g., `task_manager`).
    - Update the `.env` file with your database credentials:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=task_manager
        DB_USERNAME=your_username
        DB_PASSWORD=your_password
        ```

5. **Run migrations to create the necessary database tables:**
    ```bash
    php artisan migrate
    ```

6. **Start the development server:**
    ```bash
    php artisan serve
    ```

## Deployment Instructions

1. **Follow the setup instructions above on your production server.**
2. **Set the environment to production in the `.env` file:**
    ```env
    APP_ENV=production
    APP_DEBUG=false
    ```

3. **Configure a web server such as Apache or Nginx to serve the Laravel application.**
4. **Run the following commands to build the frontend assets and optimize the application:**
    ```bash
    npm run production
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

5. **Ensure proper file permissions for storage and cache directories:**
    ```bash
    chown -R www-data:www-data storage
    chown -R www-data:www-data bootstrap/cache
    ```

6. **Set up a cron job for Laravel scheduled tasks:**
    ```bash
    * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1
    ```

## Future Enhancements

1. **User Authentication and Authorization:**
    - Implement user registration and login functionality.
    - Add roles and permissions to control access to tasks and projects.

2. **Advanced Task Management:**
    - Implement task due dates and reminders.
    - Add task tags or categories for better organization.
    - Implement task comments or notes.

3. **Improved User Interface:**
    - Enhance the UI with additional styling and features using frontend frameworks like Vue.js or React.
    - Add responsive design improvements for better mobile support.

4. **Task Analytics:**
    - Integrate charts and graphs to visualize task completion rates and project progress.

5. **Notifications:**
    - Add email or push notifications for task updates, deadlines, and project changes.

6. **Integration with Third-Party Services:**
    - Integrate with popular project management tools or services for enhanced functionality.

7. **API Support:**
    - Develop a RESTful API to allow third-party integrations and mobile app support.

8. **Testing and Quality Assurance:**
    - Implement unit and feature tests to ensure the reliability of the application.
    - Set up continuous integration/continuous deployment (CI/CD) pipelines.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
