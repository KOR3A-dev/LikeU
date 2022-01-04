# Laravel 8.0 API LIKEU
This API is created using Laravel 8.0 API Resource. It has Users and Agenda's. Protected routes are also added. Protected routes are accessed via Bearer (JWT) access token.

#### Following are the Models
* User
* Agenda
## Comenzando 🚀
Clone the project via git clone or download the zip file.
##### .env
Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.
##### Composer Install
cd into the project directory via terminal and run the following  command to install composer packages.
###### `composer install`
##### Generate Key Laravel
generate app key
###### `php artisan key:generate`
##### Run Migration
then run the following command to create migrations in the databbase.
###### `php artisan migrate --seed`
##### Generate jwt packages
require tymon/jwt-auth
###### `composer require tymon/jwt-auth`
##### Generate Key JWT
then run the following command to generate fresh key.
###### `php artisan jwt:secret`
### Run Server
it's time to run our server
###### `php artisan serve`
### Running local server via postman
have a registered postman account, login to workspace and work on bearer token requests and parameters. 
### Api testing 📋
Enter request URL POST register `/api/auth/register`
the attributes you should put in BODY followed by form-data where you should type
```
KEY = name EXAMPLE = test
KEY = id_card EXAMPLE = 100255324
KEY = date_of_birth EXAMPLE = 2000/01/01
KEY = email EXAMPLE = prueba@test.com
KEY = password EXAMPLE = 123456789
```
then write
Enter request URL POST login `/api/auth/login`
```
KEY = email EXAMPLE = prueba@test.com
KEY = password EXAMPLE = 123456789
```
you will get a token.
Enter the URL of the request POST me `/api/auth/me`
then you will need to go to Authorization and change the type to Bearer Token and enter the token finally.
Click on send then you will receive your data.  
```
{
    "id": 21,
    "name": "Test",
    "id_card": 10203045,
    "date_of_birth": "2022-01-01",
    "email": "test@gmail.com",
    "email_verified_at": null,
    "created_at": "2022-01-04T00:17:34.000000Z",
    "updated_at": "2022-01-04T00:17:34.000000Z"
}
```
Once authenticated, you will be able to access the agenda requests.
Agenda attributes and examples:
as POST Create `/api/agenda`
```
{
    "message": "Agenda successfully created!",
    "agenda": {
        "subject": "drink",
        "date": "2022-02-04 09:02:00",
        "status": "approved",
        "user_id": "21",
        "updated_at": "2022-01-04T02:43:22.000000Z",
        "created_at": "2022-01-04T02:43:22.000000Z",
        "id": 24
    }
}
```

### Documentation 
swagger documentation
##### `/api/documentation`
### API EndPoints
##### User
* User POST register `/api/auth/register`
* User POST login `/api/auth/login`
* User POST me `/api/auth/me`
##### Agenda
* Agenda GET All `/api/agenda`
* Agenda GET Single `/api/agenda/{id}`
* Agenda POST Create `/api/agenda`
* Agenda POST Update `/api/agenda/{id}`
* Agenda DELETE destroy `/api/agenda/{id}`
