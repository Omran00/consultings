# Consulting

# Getting started

## Installation

Switch to the repo folder

    cd consultings

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new Passport authentication secret key

    php artisan passport:intsall

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Active the folder sync and let public the user avatars

    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


If you want real time messages you have to put your pusher credentials in .env


Check the postman collection