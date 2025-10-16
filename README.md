<<<<<<< HEAD

# Project management

## 🌍 Overview

A simple project management application using Laravel 11 and React.

---

## ✨ Features

1. Registration & Login
2. Projects CRUD with sorting, filtering and pagination
3. Tasks CRUD with sorting, filtering and pagination
4. Create Tasks inside project
5. Show all tasks or show tasks for a specific project
6. Assign users to tasks
7. View Tasks assigned to me
8. Show dashboard with overview information

---

## 🔧 Technologies Used

### Frontend:

-   HTML, CSS, JavaScript, Bootstrap, React

### Backend:

-   PHP with Laravel Framework
-   sqlite for database management

---

## 🚀 Installation & Setup

1. Clone the project
2. Navigate to the project's root directory using terminal
3. Create `.env` file - `cp .env.example .env`
4. Execute `composer install`
5. Execute `npm install`
6. Set application key - `php artisan key:generate --ansi`
7. Execute migrations and seed data - `php artisan migrate --seed`
8. Start vite server - `npm run dev`
9. Start Artisan server - `php artisan serve`

## 🗂️ Project Structure

```
LARAVEL_WEB_APPLICATION/
├── app/               # Backend logic (Controllers, Models)
├── database/          # Migrations and seeds
├── public/            # Public assets (CSS, JS, Images)
├── resources/         # Views and Blade templates
├── routes/            # Application routes
├── storage/           # File storage
└── tests/             # Automated tests
```

---

## 📊 Database Tables

### Key Tables:

1. **Projects**: Stores projects details
2. **Tasks**: Stores tasks information
3. **Users**: Manages user

---

=======

# laravel_web_application-main
