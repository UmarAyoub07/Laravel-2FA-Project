# Laravel 2FA Project

This project is a Laravel application implementing Google Two-Factor Authentication (2FA) for enhanced security.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/UmarAyoub07/Laravel-2FA-Project.git
    cd Laravel-2FA-Project
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    npm run build
    ```

3. Configure the database in `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

4. Run migrations:

    ```bash
    php artisan migrate
    ```

5. Install and configure 2FA packages:

    ```bash
    composer require pragmarx/google2fa-laravel
    composer require bacon/bacon-qr-code
    php artisan vendor:publish --provider="PragmaRX\Google2FALaravel\ServiceProvider"
    ```

6. Serve the application:
    ```bash
    php artisan serve
    ```

## Usage

1. Register a new user.
2. Complete the 2FA setup by scanning the QR code.
3. Use the generated OTP to log in.

## License

This project is licensed under the MIT License.
