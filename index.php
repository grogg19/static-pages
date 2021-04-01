<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\Page;
use App\StaticPages\PageList;
use App\StaticPages\File;

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);

$pages = (new PageList('static-pages'))->pages;

//dump($pages);
foreach ($pages as $page) {
    dump($page->getParameter('title'));
}
//dump($pages->getPage('/test'));

//mkdir(APP_DIR .'test1/test2', 0777);

//dump(APP_DIR . 'static-pages/example.html');
//$page = new Page();
//$page->makePage();

//$file = new File(APP_DIR . 'static-pages/test.html');
//$page = new Page($file);
//dump($page);
