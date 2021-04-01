<?php


namespace App\StaticPages;

use App\StaticPages\FileSystem;
use App\StaticPages\Page;
use SplFileObject;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

/**
 * Class PageList
 * @package App\StaticPages
 */
class PageList
{
    public $pages = [];

    public function __construct(string $path)
    {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename)
        {
            if ($filename->isDir()) continue;
            $page = new Page(new File($filename->getRealpath()));
            $this->pages[$page->getParameters()['url']] = $page;
        }
    }

//    /**
//     * @return array
//     */
//    public function listPages(): array
//    {
//        return $this->pages;
//    }

    /**
     * @param string $url
     * @return \App\StaticPages\Page
     */
    public function getPage(string $url): Page
    {
        return $this->pages[$url];
    }
}
