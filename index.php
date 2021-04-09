<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\Page;
use App\StaticPages\PageList;
use App\StaticPages\File;

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);


// Вывод списка статических страниц
$pages = new PageList('static-pages');
foreach ($pages->listPages() as $page) {
    dump($page->getParameters());
}

dump('Выводим конкретную страницу по Url');
$page = $pages->getPageByUrl('/example-new2');
dump($page);

//$page->setParameters([
//    'title' => 'Пример страницы new2',
//    'url' => '/example-new2',
//    'isHidden' => 1,
//    'navigationHidden' => 0
//]);
//$page->setHtmlContent('<h1>test save page</h1>');
//$page->savePage();




//dump('Удаляем конкретную страницу по Url');
//dump($pages->getPageByUrl('/test')->deletePage());


/**
 * Пример создания статической страницы
 */

//$page = new Page;
//$page->setParameters([
//    'title' => 'Пример страницы new',
//    'url' => '/example-new',
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