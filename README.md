# Assessment for Backend Developer Position

# Instructions & Prerequisites

Before you begin, ensure your system meets the following requirements:

- PHP >= 8.0
- Composer (for dependency management)
- A database MySQL

## Installation Steps
 
```bash
git clone git@github.com:BryanJecie/backend_developer_test.git
```
### Running the Application

1. Clone the repository to your local machine.
2. Run `cp .env.example .env` to setup your env variables.
2. Run `composer install` to install the required dependencies.
3. Run `npm install && npm run dev` to install the required frontend dependencies.
4. Run `php artisan key:generate` to generate a new application key.
5. Run `php artisan migrate` to create the database tables.
5. Run `php artisan db:seed` to insert users and task data .
6. Run `php artisan serve` to start the development server.
