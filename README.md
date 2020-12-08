<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# slighty-flip

How to install
<ol>
    <li>copy this folder to your htdocs folder (if using windows)</li>
    <li>make DB with name "slightly_flip" (because on my env, I'm using this name)</li>
    <li>run command "php artisan migrate" to migrate all your DB on CLI in the root directory place</li>
    <li>run command "php artisan db:seed --class=UserSeeder" for create admin account on CLI in the root directory place</li>
    <li>you can login with account email="admin@gmial.com"; passowrd="admin"</li>
    <li>dashboard page only show blank page just for landing page after login</li>
    <li>you can create or do sync or see detail of disbursment on Disbursment page</li>
    <li>I attached some postman file to test some function (create and sync one by one data status) via postman (because I'm as backend engineer, i think every function should include it API) </li>
    <li>if you want to sync all off data, you can use command "php artisan disburse:sync" (I'm already add button to performe this on index of disbursment page )</li>
    <li>TBH, I just studied the unit test last night. I tried to make it this morning and it still fails. if this is considered a deficiency I do not feel a problem, but if this is not a problem I am very grateful.</li>
    <li>Because I'm running sync with queue laravel, user or admin must run command "php artisan queue:work --tries=3" on CLI in the root directory place</li>
</ol>
