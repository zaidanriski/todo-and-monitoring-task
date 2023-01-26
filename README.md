# Getting started

## Demo Link

   https://task-app.devzai.com/

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation]

Alternative installation is possible without local dependencies relying on [Docker](#docker). 

Clone the repository

    git clone https://github.com/zaidanriski/todo-and-monitoring-task.git

Switch to the repo folder

    cd todo-and-monitoring-task

Install all the dependencies using composer

    composer install
    
When composer install and existing error code run

    composer update
    
Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env
    
Set database connection and App url link example (http://localhost/todo-and-monitoring-task) 

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
    
Run the database seed

    php artisan key:seed

Open in your browser url localhost webserve
    
    https://localhost/todo-and-monitoring-task

You can Register New Account in /register

Access Admin

Email : admin@gmail.com
Password : password
