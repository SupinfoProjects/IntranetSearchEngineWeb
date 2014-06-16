Intranet Search Engine Web
===========================

This is the website part of the SearchEngineB2 Project

We assume that you already got a web server running and ready.

1) Installing Composer
----------------------------------

First, to manage Symfony2 dependencies, you must use Composer.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php

When composer is installed, you must update it :

    #Windows:
    php composer.phar self-update
    #Linux:
    composer self-update

2) Configuring the project
-------------------------------

When composer is up-to-date, you will need to download the dependencies in composer.json in the project directory.

    #Windows:
    php composer.phar update
    #Linux:
    composer update

3) POSIX Rights
-------------------------------

If you are on a linux system, you may need to specify posix right for the projet directory.

    chmod 775 /projectDirectory
    #or
    chmod 777 /projectDirectory
