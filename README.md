# REST APIs Demo

This is a demo application for creating REST APIs by Slim 3.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application.

    git clone git@github.com:tingan/slim-api-demo.git
    cd slim-api-demo
    composer install
    php -S localhost:8000 -t public public/index.php

Replace 8000 with other port number, if it's already occupied.

![Screenshot](https://github.com/tingan/slim-api-demo/blob/master/public/images/Screenshot.png)

## Notice
If you  run the site in PHP built-in server as above with float path parameter as follow: 
http://localhost:8000/area/circle/5.1 
it wont work. the reason is that the PHP built-in server doesn't have the apache or nginx rewrite capability.
You have two choices to solve this issue:
1) Use apache or nginx or MAMP etc.
2) use http://localhost:8000/index.php/area/circle/5.1 
