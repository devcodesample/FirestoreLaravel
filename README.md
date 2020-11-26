# Firestore Laravel

## Requirements

- PHP 7.4
- Composer 2.x
## Installation

- Install `PHP` <br>
    Follow the instructions on the [official website](https://www.php.net/manual/en/install.php)
    
- Install `Composer` <br>
    Follow the instructions on the [official website](https://getcomposer.org/download/)
    
- Clone the repository <br>
    `git clone https://github.com/hamad2/firestorelaravel.git`

- Navigate to the repo directory <br>
    `cd firestorelaravel`

- Make `.env` file <br>
    `cp .env.example .env`

- Provide database credentials <br>
    Open `.env` file using your favourite editor
    and update database detail by change values for the following variables: <br>
    `DB_HOST=127.0.0.1` <br>
    `DB_PORT=3306` <br>
    `DB_DATABASE=firestorelaravel` <br>
    `DB_USERNAME=root` <br>
    `DB_PASSWORD=` <br>
    
- Install dependencies <br>
    `composer install`
    
- Generate `APP_KEY`
    `php artisan key:generate`
    
- Run migrations and seed the database with dummy data <br>
    `php artisan migrate:fresh --seed`

- Start development server
    `php artisan serve`


## Directory structure

Laravel follows `MVC` structure which means the app is divided into three main parts: `Models`, `Views`, and `Controllers`.
- `Models` deal with the database and relationships between data. Location - `app/Http/Models`
- `Views` contain `HTML Blade Templates` responsible for rendering the frontend. Location - `resources/views`
- ` Controllers` contain most of the business logic. Location - `app/Http/Controllers`

### Important files / directories
- `routes/web.php` - This file contains all the `URLs` being used in the app
