# Laravel_Test_Isaac_Sanchez
Isaac Sanchez Test

For the development of the application we used docker and laravel,

-The url is located in the routes folder in the file named web.php.

-Execute the command composer install

-Execute the command php artisan cache clear

-Create the .env file

-Execute the command php artisan key:generate

-Run the php artisan migrate command

-Execute the command php artisan db:seed --class=DataPostal

*Note: If you do not have docker it is not necessary to create the image.

If you want to create the image with docker you can use the following commands:

Create image: docker build -t test/backend .

Raise service: docker-compose up -d

Access the bash of the container: docker exec -it test bash
