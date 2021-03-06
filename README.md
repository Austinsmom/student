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
Example create seeder Category without factory

```bash

php artisan make:seeder CategoryTableSeeder

```

```php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'title' => 'php'
                ],
                [
                    'title' => 'mysql'
                ],
            ]
        );
    }
}

// into DatabaseSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // dans quel ordre faire les seeders
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(EventTableSeeder::class);

        Model::reguard();
    }
}

```
And factory ModelFactory.php
```php
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title'       => $faker->word(1),
        'content'     => $faker->paragraph(3),
        'category_id' => rand(1, 2)
    ];
});

```
don't forget refresh and make seeder

```bash

php artisan migrate:refresh --seed

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

### Controller resource

- controller and resource

```bash
#create controller resource
$ php artisan make:controller EventController

#create resource event with Event and seeder
$ php artisan make:migration:schema create_events_table --schema="name:string"
$ php artisan make:seeder EventTableSeeder
# see databases/seeds/EventTableSeeder.php and factories/ModelFactory.php
$ php artisan migrate --seed
```

- routes.php connect EventController to REST routes:

```bash

Route::resource('event', 'EventController');

```

- all application routes student:

 ```bash

 $ php artisan route:list

```

- use Curl testing routes REST

```bash

# verb get method EventController::index

curl -i  http://localhost:8000/event

# verb post  EventController::store
# disable into Kernel.php csrf protection... => token

curl -i -X POST -d 'name=foo' http://localhost:8000/event

```

# relations classes

- Composition

```php

class Connexion
{

}

// composition hard coding
class Model
{
	protected $c;

	public function __construct()
	{
		$this->c = new Connexion;
	}
}

// injection dependency
class Model2
{
	protected $c;

	public function __construct(Connexion $c)
	{
		$this->c = $c;
	}
}

$model2 = new Model2(new Connexion);

```

// Dependency injection and interface segregation


```php

interfaces IConnexion{
	function link(); // method public
}


class MySQLConnexion implements IConnexion
{
	public function link()
	{

	}
}

class ElasticSearchConnexion implements IConnexion
{
	public function link()
	{

	}
}

class Model
{
	protected $c;

	public function __construct()
	{
		$this->c = new Connexion;
	}

	public function all()
	{
		$link = $this->c->link();
	}
}

$model = new Model;

class Model2
{
	protected $c;

	public function __construct(IConnexion $c)
	{
		$this->c = $c;
	}
}

// easy injection dependencies
$model2 = new Model2(new MySQLConnexion);

$model3 = new Model2(new ElasticSearchConnexion);

```

# Comments protection

add akismet

```bash
    composer require nickurt/laravel-akismet:dev-master
```

configure into your config/app.php

```php

    // provider

    nickurt\Akismet\ServiceProvider::class,

    // aliases
        'Akismet'   => nickurt\Akismet\Facade::class,

```

Create automatic file (akismet.php) into config directory with this command.

```php
php artisan vendor:publish

```
Put your api key and url blog into akismet.php

```php
return [
    'api_key'  => 'XXXXXXXX',
    'blog_url' => 'http://localhost:8000',
];

```
How protect my comments into process seeds data in application. Direct into form request and method rules i have. Doesn't forget your field spam into assignation mass model Comment...

See method rules CommentFormRequest class

```php
public function rules()
    {
        // all values
        $input = $this->all();

        // service Aksimet checked content and email
        \Akismet::setCommentContent($input['content'])
            ->setCommentAuthorEmail($input['email']);

        // determine a value for spam field
        $input['spam'] = (\Akismet::isSpam()) ? 1 : 0;

        // add field spam into all fields values for assignation mass (nice!)
        $this->replace($input);

        return [
            'email'        => 'email|required',
            'content'      => 'required',
            'post_id'      => 'integer',
            'published_at' => 'regex:/[0-9]{4}\-[0-9]{2}\-[0-9]{2} [0-9]{2}\:[0-9]{2}\:[0-9]{2}/',
        ];
    }

#testing

project:
we wont test CommentObserver class in application but not with all tables and we wont use sqlite to accelerated tests

- first create directory migrations into directory tests Laravel and put your migrations posts and comments (see directory repository)
- second create file bootstrap.php, just for create file testing.sqlie, sqlitelite need this file to run.
- modified the phpunit.xml to bootstrap my bootstrap.php

Into my xml file determine you wont use sqlite database just values testing and sqlite:

```xml
 <php>
    <env name="APP_ENV" value="testing"/>
    <env name="DB_CONNECTION" value="sqlite"/>
    <env name="CACHE_DRIVER" value="array"/>
    <env name="SESSION_DRIVER" value="array"/>
 </php>
```

## into my CommentObserverTest

- i use a method with annotation @before just above method then this method executed before a test (remember a test is a method into class test)

this part of CommentObserverTest bootstrap environment database sqlite test

```php

 protected $post;

    /**
     * @before
     */
    public function runDatabaseMigrations()
    {
//        $this->artisan('migrate');

        $this->artisan('migrate', [
            '--path' => './tests/migrations',
        ]);

        $this->post = Post::create(['title' => 'foo', 'comments_count' => 0, 'content'=> '']);


        // laravel method TestCase
        $this->beforeApplicationDestroyed(function () {
            $this->artisan('migrate:rollback');
        });
    }

```
Now my test time with phpunit is Time: 984 ms
Have fun !















