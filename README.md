## Laravel introduction

### Commands Laravel

create table students

```php
php artisan make:migration create_students_table --create=students

```
commit migration or rollback or refresh rollback and commit

```php
php artisan migrate
php artisan migrate:rollback
php artisan migrate:refresh
```

### Commands MySQL

- connect to database ecole

```mysql
mysql --user=tony --password=tony
mysql> use ecole;

mysql --user=tony --password=tony --database ecole

show create table students

```

## Create Controller and model Tag

```php

php artisan make:controller TagController

php artisan make:model Tag

```

Inside mode specified fillable data, mass assignation

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   protected $fillable=[
       'name',
       'description'
   ];
}

```

Insert data with Tinker artisan
```php

php artisan tinker

>>> App\Tag::create(['name'=>'PHP', 'description'=>'blabla']);

```

inside controller TagController, create index method to show all tags with model Tag

```php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }
}

```

- inside routes.php connect controller and route

```php

// ...

Route::get('tag', 'TagController@index');

```

And test route into console with curl

```bash

curl http://localhost:8000/tag

```

List route

search command artisan route

```php
php artisan list | grep route

```
And use route list

```php
php artisan route:list

```
Part of sass

install node

```bash
npm install --global gulp
npm install gulp --save-dev
npm install gulp-sass gulp-rename gulp-minify-css gulp-concat --save-dev

```
tool bar laravel

```php
composer require barryvdh/laravel-debugbar
```

Provider config/app.php

```php
    'providers'
    'Debugbar' => Barryvdh\Debugbar\Facade::class,

```
link tool bar:

https://github.com/barryvdh/laravel-debugbar

### Eloquent relationships

first connect to database ecole with password and without password

```bash
mysql --user=tony --password=tony --database ecole
mysql --u tony -p --database ecole
```
Examples SQL insert

multiple values or single value

```mysql
INSERT INTO posts (title, category_id) values ('foo', 1), ('bar', 1), ('baz', 1);
INSERT INTO posts SET title='foo';
```

### commands SQL

```mysql
#connect to specific database with hidden password
mysql -u tony -p --database school

# sql to create specific table or database
mysql>show create table posts;
mysql>show create database school;

# structure table
mysql>describe posts;

```
### require laracast

```json
    "require-dev" :{
        "laracasts/generators": "^1.1"
    }

```
After we can do

```php
 php artisan generate:migration create_comments_table --fields="email:string, content:text, post_id:integer:unsigned:foreign"

```

### faker and seeds

```php
 php artisan make:seeder UserTableSeeder

```

file ModelFactory => data faker

```php
$factory->define(App\User::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->name,
      'email' => $faker->email,
      'password' => bcrypt(str_random(10)),
      'remember_token' => str_random(10),
  ];
});
```

inside file UserTableSeeder specified a number of data you want

```php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
       // définit dans le fichier ModelFactory dans le dossier database voir
       factory(App\User::class, 20)->create();
   }
}
```

### TP

Ajouter des posts et des commentaires liés à des posts, afficher le nombre de commentaire sous chaque post. Aidez-vous de la documentation en ligne:

http://laravel.com/docs/5.1/eloquent

Example
```php
$count = App\Flight::where('active', 1)->count();
```

Si vous avez le temps afficher les commentaires sous chaque post une fois que l'on a cliqué sur un post


### CRUD

CRUD create read update delete