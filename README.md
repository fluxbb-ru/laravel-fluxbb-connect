## About Laravel FluxBB Connect

Set of classes and demo project to extend [FluxBB](https://fluxbb.org) forum in Laravel way. 
This project owner is not affiliated with FluxBB and its respective maintainers.

## Installation

First, create new project on empty directory:
```bash
$ composer create-project -s dev fluxbb-ru/laravel-fluxbb-connect .
$ composer install
$ npm i && npm run dev
```
Then you have two options depending on your current forum state:
 - connect to existing forum database
 - create new one via migrations and seeder
 
**If you're conecting to existing DB**

Look at the form config.php and copy DB credentials to .env of you Laravel project.
To simulate that existing tables have been created by Laravel, you need to create `migrations` table.
I made special command for it:
```bash
$ php artisan fluxbb:fake-migrate
```
It will create the table and fill it by rows.

**If you'd like to create new database**

```bash
$ php artisan migrate --seed
```

## Usage

The `App\Models` namespace contains 17 model classes of FluxBB.
All required relationships are set as well. 
You can use standard Laravel authentication and guards. Users and all forum data will be shared 
with FluxBB forum.

*NOTE*:  
Laravel and FluxBB work with auth cookie differently. 
So, the given user can be logged in in terms of Laravel and in the same time not logged in in terms 
of FluxBB. I'm going to offer mod for the forum to utilize common services.  

In the demo app I will provide login and register actions and functional copy of the main forum page. 
 
## License

The Laravel framework and Laravel FluxBB Connect are open-sourced software licensed under the 
[MIT license](https://opensource.org/licenses/MIT).
