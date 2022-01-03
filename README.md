# Laravel 8.0 API LIKEU
This API is created using Laravel 8.0 API Resource. It has Users and Agenda's. Protected routes are also added. Protected routes are accessed via Bearer (JWT) access token.

#### Following are the Models
* User
* Agenda
#### Usage
Clone the project via git clone or download the zip file.
##### .env
Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.
##### Composer Install
cd into the project directory via terminal and run the following  command to install composer packages.
###### `composer install`
##### Generate Key JWT
then run the following command to generate fresh key.
###### `php artisan jwt:secret`
##### Run Migration
then run the following command to create migrations in the databbase.
###### `php artisan migrate --seed`

### API EndPoints
##### User
* Post POST register `http://localhost:8000/api/auth/register`
* Post POST login `http://localhost:8000/api/auth/login`
* Post POST me `http://localhost:8000/api/auth/me`
##### Agenda
* Post GET All `http://localhost:8000/api/agenda`
* Post GET Single `http://localhost:8000/api/agenda/{id}`
* Post POST Create `http://localhost:8000/api/agenda`
* Post PUT Update `http://localhost:8000/api/agenda/{id}`
* Post DELETE destroy `http://localhost:8000/api/agenda/{id}`
Same For Comments.
