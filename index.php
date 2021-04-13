<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

use App\StaticPages\Page;
use App\StaticPages\PageList;
use App\StaticPages\File;
use App\StaticPages\FilesList;

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR);

///** Вывод списка статических страниц */
//$files = new FilesList('static-pages');
//$pages = new PageList('static-pages');
//foreach ($pages->listPages() as $page) {
//    dump($page->getParameters());
//}

///** Вывод страницы по URL */
//dump('Выводим конкретную страницу по Url');
//$page = $pages->getPageByUrl('/example-new');
//dump($page);


/** Пример редактирования статической страницы */
//$page->setParameters([
//    'title' => 'Пример страницы new',
//    'url' => '/example-new',
//    'isHidden' => 1,
//    'navigationHidden' => 0
//]);
//$page->setHtmlContent('<h1>test save page</h1>');
//$page->savePage();

/** Пример удаления статической страницы */
//dump('Удаляем конкретную страницу по Url');
//dump($pages->getPageByUrl('/test')->deletePage());


/** Пример создания статической страницы */

//$page = new Page;
//$page->setParameters([
//    'title' => 'Test page',
//    'url' => '/test-new',
//    'isHidden' => 0,
//    'navigationHidden' => 0
//]);
//$page->setHtmlContent('<h1>Content test</h1>');
//$page->makePage(new File);
