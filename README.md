# Task Management System

## Overview

This is a simple CRUD operation project for managing tasks. The system uses Laravel Breeze for authentication with the default UI. Users can register, log in, and log out.

### Key Features:

1. Authentication:
    - Registration, login, and logout functionality implemented using Laravel Breeze.
    - Upon login, a button labeled "Click to Enter Task" is displayed.

2. Admin Panel:
    - Clicking the button redirects users to the admin panel, which is built using the `SB Admin 2` template.
    - The admin panel allows users to:
        - View a list of tasks they created.
        - Create, update, and delete tasks.
        - Filter tasks by `status`.
        - Sort tasks by `due date`.

3. API:
    - Endpoint: `http://127.0.0.1:8000/api/v1/admin/tasks`
    - Method: `GET`
    - Returns a list of all tasks along with user information for the user who created each task.
    - The status data is modified using an <b>accessor</b> for better readability in the API response.



# Project Setup Instructions

### Clone the Repository

- Open your terminal and run
    - `git clone https://github.com/shohagrana006/task_management_system.git`
    - `cd task_management_system`
    - `composer install && npm install`
    - `cp .env.example .env`

- Connect you database
    - DB_DATABASE=db_name
    - DB_USERNAME=db_username
    - DB_PASSWORD=db_password
    - run `php artisan key:generate`
    - run `php artisan migrate`


### Run the Application

- Start the Laravel development server by running the following command:
    - `php artisan serve`
- Open your browser and visit:
    - `http://127.0.0.1:8000`
