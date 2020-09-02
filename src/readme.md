
## Usefull Docker commands for set up

Once the docker-compose.yml is configured run this command to set up container

    -- docker-compose build && docker-compose up -d

Once the container is all set, run composer install to install laravel

    -- composer create-project laravel/laravel .

In order to run artisan command, make sure you give full path to artisan folder, see below

    -- docker-compose exec php php /var/www/html/artisan make:controller PagesController 

    -- docker-compose exec php php /var/www/html/artisan make:model Page -m ( -m stands for migration) 

    docker-compose exec php php /var/www/html/artisan migrate ( to migrate database)

Once database has been migrated, to access mysql shell, run this

    -- docker-compose exec mysql bash

    this will lead you to the mysql image directory

            -- root@d78eeaf3647e:/# 

            -- mysql -u root -p

            your password is whatever password that you set up.


If you using mysql work bench on you local computer to access database instead of phpMyAdmin, then follow below steps.

    -- open workbench, click new connection, 

    -- leave the host name as it is, put in mapped port number, insert database user name and and password and specify which schema your are trying to access. 

If you want to see available routes list 

    -- docker-compose exec php php /var/www/html/artisan route:list

    +--------+----------+----------+------+-----------------------------------------------+--------------+
| Domain | Method   | URI      | Name | Action                                        | Middleware   |
+--------+----------+----------+------+-----------------------------------------------+--------------+
|        | GET|HEAD | /        |      | App\Http\Controllers\PagesController@index    | web          |
|        | GET|HEAD | about    |      | App\Http\Controllers\PagesController@about    | web          |
|        | GET|HEAD | api/user |      | Closure                                       | api,auth:api |
|        | GET|HEAD | services |      | App\Http\Controllers\PagesController@services | web          |
+--------+----------+----------+------+-----------------------------------------------+--------------+


Now when you want to map your routes to all your api end points then, on you routes, you need to add following function

    -- Route::resource('name', 'NameController')

    run this command again, 

    -- docker-compose exec php php /var/www/html/artisan route:list

    this will list out all the available routes which will be at your service.

+--------+-----------+-------------------+---------------+-----------------------------------------------+--------------+
| Domain | Method    | URI               | Name          | Action                                        | Middleware   |
+--------+-----------+-------------------+---------------+-----------------------------------------------+--------------+
|        | GET|HEAD  | /                 |               | App\Http\Controllers\PagesController@index    | web          |
|        | GET|HEAD  | about             |               | App\Http\Controllers\PagesController@about    | web          |
|        | GET|HEAD  | api/user          |               | Closure                                       | api,auth:api |
|        | GET|HEAD  | posts             | posts.index   | App\Http\Controllers\PostsController@index    | web          |
|        | POST      | posts             | posts.store   | App\Http\Controllers\PostsController@store    | web          |
|        | GET|HEAD  | posts/create      | posts.create  | App\Http\Controllers\PostsController@create   | web          |
|        | GET|HEAD  | posts/{post}      | posts.show    | App\Http\Controllers\PostsController@show     | web          |
|        | PUT|PATCH | posts/{post}      | posts.update  | App\Http\Controllers\PostsController@update   | web          |
|        | DELETE    | posts/{post}      | posts.destroy | App\Http\Controllers\PostsController@destroy  | web          |
|        | GET|HEAD  | posts/{post}/edit | posts.edit    | App\Http\Controllers\PostsController@edit     | web          |
|        | GET|HEAD  | services          |               | App\Http\Controllers\PagesController@services | web          |
+--------+-----------+-------------------+---------------+-----------------------------------------------+--------------+
