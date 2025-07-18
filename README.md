[![CI](https://github.com/patrickfreitasdev/hey-professor/actions/workflows/laravel.yml/badge.svg)](https://github.com/patrickfreitasdev/hey-professor/actions/workflows/laravel.yml)

# Hey Professor

Hey Professor is a Q&A platform that allows users to submit questions, vote on them, and get answers. The application is designed to facilitate interaction between students and professors, making it easier to ask and answer questions.

## Features

- User authentication with GitHub
- Question management (create, edit, update, archive, restore, delete)
- Voting system (like/unlike questions)
- Question publishing workflow
- User profile management
- Search functionality for questions

## Technologies Used

- PHP 8.2+
- Laravel 12.0
- Livewire & Volt
- Laravel Socialite for GitHub authentication
- Pest for testing

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- Database (MySQL, PostgreSQL, or SQLite)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/patrickfreitasdev/hey-professor.git
   cd hey-professor
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Create a copy of the .env file:
   ```bash
   cp .env.example .env
   ```

5. Generate an application key:
   ```bash
   php artisan key:generate
   ```

6. Configure your database in the .env file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hey_professor
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Configure GitHub OAuth in the .env file (get these from GitHub Developer settings):
   ```
   GITHUB_CLIENT_ID=your-github-client-id
   GITHUB_CLIENT_SECRET=your-github-client-secret
   GITHUB_REDIRECT_URI=http://localhost:8000/github/callback
   ```

8. Run database migrations:
   ```bash
   php artisan migrate
   ```

9. Build assets:
   ```bash
   npm run dev
   ```

10. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

1. Register/login using GitHub authentication
2. Browse existing questions on the dashboard
3. Submit new questions
4. Vote on questions you find interesting
5. Manage your questions (edit, archive, delete)
6. Update your profile settings

## Development

Run the development environment with:
```bash
composer dev
```

This will start the Laravel server, queue worker, logs, and Vite in parallel.

## Testing

Run tests with:
```bash
composer test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
