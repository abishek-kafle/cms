Perform the following steps for cms project on your device:
1. clone the project on your xampp/htdocs folder
2. open cmd inside xampp/htdocs/cms
3. type the command ( composer update ) to update composer
4. open project inside your text editor
5. create a database which is mentioned inside .env file
            or
    you can create database of your name but you have to replace the name inside the
    .env file with your database name
6. inside the terminal of code editor type the following commands
    a. php artisan migrate
    b. php artisan db:seed
7. turn on xampp and start the apache and mysql server
8. inside your browser url type (localhost/cms/)
    to login to admin panel type (localhost/cms/admin/login)
9. details for admin login are
    email : admin@admin.com
    password : password
