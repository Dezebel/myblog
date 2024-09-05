<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Mein Kamf - my struggle with Assignment 2 (16/8/24)
Well this has been one hell of a ride. Everything went well until I added the middleware. At this point I had many problems that took days to resolved. All manner of errors. I eventually found that when a user tried to access a blog post, all I got was 403 forbidden. I eventually worked out that the post id was comparing against the current user id, not the post user id agaist the current user id. This was a small win but was short lived.

Another problem I faced was adding admin.blade.php from the dashboard templates. Could not get the css to link correctly. This turned out to be a referencing issue where it could not see the file as it was not placed in 'public' folder. This was remedied.

The largest problem I faced was making all the files for create, edit, delete etc for users and posts. I had the post one working then tried to get the user create working. Once I got that populating then the post create view would break. I spend days and days trying to get these views to work but to no avail. Finally I was running out of time. I had allocated two whole weeks for this assignment but it was not enough. I decided to submit what I have for assignment 2. Hopefully this will not affect assignment 3. If it does I will have to ask for a copy of the updated project so I don't fall behind.

8.Enhance user management
ran into issues when running command 'php artisan db:seed --class=RoleSeeder'. This returned the error '  Call to a member function prepare() on null'.

## Mein Kamf - my struggle by Derek

Trying to follow all the examples in the lectures, I eventually came up with a working site as outlined in assignment 1. I hope this is what you were after.


## Issues faced

PHP VERSION ISSUE

There was an issue faced where I had a lower version of php was causing an issue. I had php 8.1 installead but the required was version 8.3. Despite installing php 8.3 and adding this to the path, the version still showed as 8.1. It wasn't until I added 8.3 to the system path that it was accepted.


PHP INTELLISENSE NOT WORKING

I noticed that intellisense was not enabled for PHP code. To fix this I installed VS code extensions PHP Intelephense and Laravel Blade Snippets. After this the code was colourful and the intellisense was working.


LOADING PAGE GIVES ERROR 

Received error in the browser: 'InvalidArgumentException View [index] not found'. This was probably due to specifying an incorrect path. This was resolved.


ERROR: "Class 'App\Http\Controllsers\Post' not found"

Turned out that this was the 'Post' model in 'PostController' was referenced but not imported. This was resolved.


ERROR: Column 'Title' not found

Received error: SQLSTATE[42S22]: "Column not found: 1054 Unknown column 'title' in 'field list' (Connection: mysql, SQL: insert into posts (title, content, updated_at, created_at) values (2nd post, content for 2nd post, 2024-07-09 11:21:58, 2024-07-09 11:21:58))". This turned out to be because the column 'title' was not in the database. 

