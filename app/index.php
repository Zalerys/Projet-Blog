<?php
require_once 'vendor/autoload.php';

use App\Route\Route;

$key = 'author_id_test';
$explodedKey = explode('_', $key);
for ($i = 0; $i < count($explodedKey); $i++) {
    $explodedKey[$i] = ucfirst($explodedKey[$i]);
}
$key = implode('', $explodedKey);
echo $key;
die;
