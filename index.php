<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\Page;
use App\StaticPages\PageList;
use App\StaticPages\File;

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);

$pages = (new PageList('static-pages'))->listPages();

foreach ($pages as $page) {
    dump($page->getParameters());
}

//$newPage = new Page();
//$newPage->makePage();

//dump($pages->getPage('/test'));

//mkdir(APP_DIR .'test1/test2', 0777);

//dump(APP_DIR . 'static-pages/example.html');




//$page = new Page;
//$page->setParameters([
//    'title' => 'Пример страницы new',
//    'url' => '/example-new.html',
//    'isHidden' => 0,
//    'navigationHidden' => 0
//]);
//$page->setHtmlContent('<h1>test</h1>');
//
//$file = new File;
//$page->makePage($file);


//$file = new File(APP_DIR . 'static-pages/test.html');
//$page = new Page($file);
//dump($page);

