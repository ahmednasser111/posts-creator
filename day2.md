create migrations for the necessary db posts table 
implement resource controller methods(index, create, store, edit, update, destroy, show)

take a look on the documentation of laravel resource controller

when I click on delete button, it should show a warning before deleting and i should confirm the deletion

and you must use Route::delete

use artisan

migrate the database with mysql

edit in .env file


post title - body - userId
so you must add userId to the posts table
so you need to create users table
so you need to create a relationship between posts and users

so you need to make login and register

and you need to make sure that only the owner of the post can edit and delete it

and you need to make sure that the user is logged in to create a post

