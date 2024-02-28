<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
     
## Features
- Rigester and login API  (User Model , user Table ,Auth : sanctum, loginController, regiesterController)
- users API (User Model,userTable, User controller)
- Products API (Product model , product controller , productResource)
- Show each type of user different product prices according to their type useing condition to price depended  on user type
        
## installation 
- Clone the repository: git clone <https://github.com/AlaaSoudan/band_tech.git>
- Install dependencies: composer install
- Copy .env.example to .env and configure your environment  cp .env.example .env

- Generate application key: php artisan key:generate

- Run migrations (if applicable): php artisan migrate
 


## Endpoint
- Register and login API :
* Register [post:http://localhost:8000/api/register]
* login [post:http://localhost:8000/api/login]

- user CURD API :
*  index function to show all user [get:http://localhost:8000/api/users]
* show function to show spacific user    [get:http://localhost:8000/api/users/{id}]
* store function to save user info before store need create function [post:http://localhost:8000/api/users]
* update function to update user info  [Put:http://localhost:8000/api/users]
* delete user [delete:http://localhost:8000/api/users/{id}]

- product CURD API : 
* index function to show all products [get:http://localhost:8000/api/products]
* show function to show spacific product [get:http://localhost:8000/api/api/producs/{slug}]
* store function to save product info before store need create function [post:http://localhost:8000/api/products]
* update function to update product info  [Put:http://localhost:8000/api/products/{slug}]
* delete product [delete:http://localhost:8000/api/products/{slug}]
here using slug to access to product


    

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
 