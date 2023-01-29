### Environment

- **[Laravel v9](https://laravel.com/docs/9.x)**
- **[Composer v2](https://getcomposer.org/)**
- **[Mysql v8](https://www.mysql.com/)**
- **[Node v 16](https://nodejs.org/en/)**

### Installation Steps

- **Goto Project Root** ```cd project_root``` 
- **Copy .env.example as .env**
- **Add API_URL in .env along with port and url you are serving the project  in**
- **Configure database**
- **Install composer dependencies** ```composer install``` 
- **Generate Key** ```php artisan key:generate```
- **Run migration** ```php artisan migrate``` 
- **Run seeder** ```php artisan db:seed``` 
- **Install Npm** ```npm install```
- **Server the Project** ```php artisan serve```
- **Generate Assets and vite server** ```npm run dev```

*Note:: Run both laravel server and vite assets with php artisan serve and npm run dev in development server to up the frontend*  
### Email Configuration

- **ADD Email Configurations In .env** 

- MAIL_MAILER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME=YOUR_USERNAME
- MAIL_PASSWORD= YOUR_PASSWORD
- MAIL_ENCRYPTION=tls
- MAIL_FROM_NAME="${APP_NAME}"

### Credentials
- **email: admin@test.com**
- **password: password**



*Note:: Email configuration is required compulsorily for invitaiton purpose*  


***Warning : Do not change anything in the modules which you have not created. This may break other system*** 

