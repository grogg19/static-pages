<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\Page;

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);

$page = (new Page('test'));

dump($page->getParameters());
dump(html_entity_decode($page->getHtmlContent()));




