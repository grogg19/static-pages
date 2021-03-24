<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\File;

$test = new File('static-pages');

