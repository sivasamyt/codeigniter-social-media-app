# CodeIgniter Project Setup and Instructions

## Requirements

- PHP (>= 7.4)
- Composer
- MySQL or any supported database
- CodeIgniter 4 (this guide assumes you're using CodeIgniter 4)

## Installation

Follow the steps below to set up and run the project.

### 1. Unzip the file
Unzip the file from project folder to your local machine

### 2. Install Dependencies with Composer
Make sure Composer is installed on your system. If not, you can download and install it.
Once Composer is installed, run the following command to install the required dependencies:

```bash
composer install
```

### 3. Configure the Database
Update the database settings in app/config/Database.php to match your local database credentials:

public $default = [
    'hostname' => 'localhost',
    'username' => 'your_database_username',
    'password' => 'your_database_password',
    'database' => 'your_database_name',
    'DBDriver' => 'MySQLi',
    // other configurations
];

### 4.  Run Migrations
Once the database is configured, run the migrations to set up the required database tables. Use the following command:

```bash
php spark migrate
```
### 5.  Run Seeder
To seed the database with sample data, run the seeder AllSeedersSeeder:

```bash
php spark db:seed AllSeedersSeeder
```

### 6.  Serve the Application
After the migration and seeding process is completed, you can start the development server using:   

```bash
php spark serve
```

### 7.  Access the Application
Open your browser and go to:   

```bash
http://localhost:8080
```