***To get started:***

Install Laravel Installer at first Globaly.

    composer global require laravel/installer

Clone Project:

    git clone https://github.com/knwltanveer/laravel-workspace.git

Go to cloned Directory:

    cd laravel-workspace
    
Execute Command:

    composer install
    chmod -R 777 storage bootstrap/cache
    cp .env.example .env
    php artisan migrate
        
Run in Development Mode:

    php artisan serve

***Easy!***
