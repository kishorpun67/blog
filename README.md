<ol type="1">
    <h3>
        Set up :
    </h3>
    <li> php version required >= 8.1 <li>
    <li>Clone the repo and cd into it</li>
    <li>In your terminal composer install</li>
    <li>Rename or copy .env.example file to .env</li>
    <li>php artisan key:generate</li>
    <li>Set your database credentials in your .env file</li>
    <li>Import db file(blog.sql) into your database  or migrate using command (php artisan make:migration) </li>
    <li>run command[laravel file manager]:- php artisan storage:link</li>
    <li>Run php artisan serve and Visit localhost:8000 in your browser</li>
    
</ol>
