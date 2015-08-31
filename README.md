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