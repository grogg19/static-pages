<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\Page;
use App\StaticPages\PageList;

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);

$pages = new PageList('static-pages');

dump($pages->listPages());

$files = new \App\StaticPages\FileSystem('static-pages');

dump($files->getFile('test.html'));





