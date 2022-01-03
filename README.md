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
### Run Server
it's time to run our server
###### `php artisan serve`
### Running local server via postman
have a registered postman account, login to workspace and work on bearer token requests and parameters. 

##### Documentation 
*documentation `/api/documentation`
### API EndPoints
##### User
* User POST register `/api/auth/register`
* User POST login `/api/auth/login`
* User POST me `/api/auth/me`
##### Agenda
* Agenda GET All `/api/agenda`
* Agenda GET Single `/api/agenda/{id}`
* Agenda POST Create `/api/agenda`
* Agenda PUT Update `/api/agenda/{id}`
* Agenda DELETE destroy `/api/agenda/{id}`
