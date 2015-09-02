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