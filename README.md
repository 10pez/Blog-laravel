
# Laravel Blog Project

This is a Laravel blog project that allows users to create posts and comments.

## Project Setup Instructions

Follow these steps to set up and run the project locally:

### 1. Clone the Repository from GitHub

Open your terminal and run the following command to clone the project:

```bash
git clone https://github.com/10pez/Blog-laravel.git
```

Navigate into the project directory:

```bash
cd Blog-laravel
```

### 2. Install Dependencies

Run the following command to install PHP dependencies using Composer:

```bash
composer install
```

### 3. Start Docker Containers

Run the following command to build and start your Docker containers:

```bash
docker compose up --build
```

### 4. Create the `.env` File

Copy the example environment file to create your own `.env` file:

```bash
cp .env.example .env
```

### 5. Generate Application Key

Run the following command to generate an application key:

```bash
php artisan key:generate
```

This will set the `APP_KEY` value in your `.env` file.

### 6. Set Up Database Configuration

In your `.env` file, set the database configuration as follows:

```plaintext
APP_NAME=Laravel
APP_ENV=local
APP_KEY="your_generated_code"  # Use the generated key from the previous command
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Blog
DB_USERNAME=bloguser
DB_PASSWORD=secret
```

### 7. Run Migrations

Run the following command to set up your database tables:

```bash
php artisan migrate
```

### 8. Seed the Database

If you want to add sample data to your database, run:

```bash
php artisan migrate --seed
```

### 9. Install Node.js Dependencies

Run the following command to install JavaScript dependencies:

```bash
npm install
```

Then, compile the assets:

```bash
npm run dev
```

### 10. Default User Credentials

For each user, the password is set to `password`. Use this for logging in.

### 11. Serve the Application

Finally, run the following command to serve your application:

```bash
php artisan serve
```

### Access the Application

You can access your application in a web browser at:

```
http://localhost:8000
```
