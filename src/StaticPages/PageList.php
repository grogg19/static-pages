<?php


namespace App\StaticPages;

use App\StaticPages\Page;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

/**
 * Class PageList
 * @package App\StaticPages
 */
class PageList
{
    private $pages = [];

    public function __construct(string $path = 'static-pages')
    {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path)) as $filename)
        {
            if ($filename->isDir()) continue;
            $page = new Page(new File($filename->getRealpath()));
            $this->pages[$page->getParameters()['url']] = $page;
        }
    }

    /**
     * @return array
     */
    public function listPages(): array
    {
        return $this->pages;
    }

    /**
     * @param string $url
     * @return \App\StaticPages\Page|null
     */
    public function getPageByUrl(string $url): Page|null
    {
        return (!empty($this->pages[$url])) ? $this->pages[$url] : null;
    }
}
