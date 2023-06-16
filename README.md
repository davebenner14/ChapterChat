# 📚 Chapter Chat 📚

Chapter Chat is a book review web application that allows users to create, read, update, and delete book entries along with user-generated reviews and ratings. It serves as a digital space where book enthusiasts can share their thoughts and opinions on various books, fostering an interactive and engaging community.

This project was developed as a practice application to improve skills in various web technologies like Laravel, Jetstream, PHP, JavaScript, Blade, and Tailwind CSS. The application was developed over five days, from June 12 to June 16, 2023.

Note that setting up Laravel with Jetstream will provide features like login, registration, email verification, two-factor authentication, session management, API support via Laravel Sanctum, and optional team management.

## Developer 🤝

### 🧑‍💻 [David Benner](https://github.com/davebenner14)

## Technologies Used 💻

-   [PHP](https://www.php.net/)
-   [Laravel](https://laravel.com/)
-   [Jetstream](https://jetstream.laravel.com/)
-   [SQLite](https://www.sqlite.org/index.html)
-   [Blade](https://laravel.com/docs/8.x/blade)
-   [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
-   [Tailwind CSS](https://tailwindcss.com/)

## Getting Started 🚀

To get started with this project, follow these steps:

```
composer create-project --prefer-dist laravel/laravel <project name>
```

Navigate into the project folder:

```
cd <project name>
```

Install Laravel Jetstream:

```
composer require laravel/jetstream
```

Install Livewire with teams:

```
php artisan jetstream:install livewire --teams
```

Migrate the database:

```
php artisan migrate
```

Install and compile front-end dependencies:

```
npm install && npm run dev
```

Serve the application:

```
php artisan serve
```

Then, visit your application at [http://localhost:8000](http://localhost:8000)

## Models 📚

Create a model:

```
php artisan make:model <ModelName> -m
```

Navigate to the newly created migrations file located in `database/migrations` and define your tables and fields.

Run the migration:

```
php artisan migrate
```

## Controllers 🎛️

Controllers are responsible for handling the logic of your application. You can create a controller using the following command:

```
php artisan make:controller <ControllerName>
```

Inside the controller, you can define methods that handle requests to various routes. For instance, you might have a show method that displays a specific book.

## Views 🖼️

Views are responsible for generating the user interface of your application. Views live in the resources/views directory and are typically created using the Blade templating language.

You can create a new view by creating a new .blade.php file in the resources/views directory. For instance, you might create a show.blade.php view to display a specific book.

## Going Forward 🚀

Continue to explore and experiment with Laravel's features! This might include adding authentication with Laravel Fortify, testing your application with PHPUnit, or deploying your application with Laravel Vapor. Remember, the best way to learn is by doing. Happy coding!
