<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


### This is a laravel projet for Startup incubators.

This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

	git clone https://github.com/Sunil178/Incubator.git

Switch to the repo folder

    cd Incubator
Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Sunil178/Incubator.git
    cd Incubator
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
----------
 
# Authentication
 
For authentication system, we have used ACL (Access Control List) for different types of roles in our project having different privileges on different modules.
Roles can be Super admin, admin, manager, Users, etc.
Modules can be Revenue, Expense, Dashboard, Company, Employee, etc.
Privileges on above modules can be Create, Read, View, Update, Delete.

----

# Navigation on live site
1. Hit [http://incubator.technomatrix.live/](http://incubator.technomatrix.live/)
2. Login if you have credentials else register with super-admin role.
3. You can test the access controls by registering with different roles.
4. One can grant/revoke permissions.
5. Then explore all the cards from the dashboard or explore by navigation bar.