<?php


namespace App\StaticPages;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
/**
 * Class PageList
 * @package App\StaticPages
 */
class PageList
{
    private $pages = [];

    public function __construct($directory)
    {
        $this->pages = (new FileSystem(APP_DIR . $directory))->getFiles();
    }


    /**
     * @return array
     */
    public function listPages(): array
    {
        return $this->pages;
    }

}
