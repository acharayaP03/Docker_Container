
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


Now when you want to map your routes to all your api end points then, on you routes, you need to add following function

    -- Route::resource('name', 'NameController')

    run this command again, 

    -- docker-compose exec php php /var/www/html/artisan route:list

    this will list out all the available routes which will be at your service.


