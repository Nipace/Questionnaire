### Environment

- **[Laravel v9](https://laravel.com/docs/9.x)**
- **[Composer v2](https://getcomposer.org/)**
- **[Mysql v8](https://www.mysql.com/)**
- **[Node v 16](https://nodejs.org/en/)**

### Installation Steps

- **Copy .env.example as .env**
- **Add API_URL in .env along with port and url you are serving the project**
- **Configure database**
- **Install composer dependencies** ```composer install``` 
- **Generate Key** ```php artisan key:generate```
- **Run migration** ```php artisan migrate``` 
- **Run seeder** ```php artisan seed``` 
- **Install Npm** ```npm install```
- **Server the Project** ```php artisan serve```
- **Generate Assets and vite server** ```npm run dev```


*Note:: Run both laravel server and vite assets with php artisan serve and npm run dev in development server to up the frontend*  

***Warning : Do not change anything in the modules which you have not created. This may break other system*** 

