<?php

require_once __DIR__ . '/../bootstrap/autoload.php';

$databaseFileSqlite = __DIR__.'/../storage/database.sqlite';

exec('touch '. $databaseFileSqlite);