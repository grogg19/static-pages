<?php


namespace App\StaticPages;

use App\StaticPages\FileSystem;
use App\StaticPages\Page;
use SplFileObject;
/**
 * Class PageList
 * @package App\StaticPages
 */
class PageList
{
    private $pages = [];

    public function __construct($directory)
    {
        $pages = (new FileSystem(APP_DIR . $directory))->getFiles();
        foreach ($pages as $page) {

            $filePath = $page->getRealPath();
            $fileSize = $page->getSize();

            $content = (new SplFileObject($filePath))->fread($fileSize);
            list($parameters, $htmlContent) = explode('====', $content);

            $parameters = parse_ini_string($parameters);
            $htmlContent = htmlspecialchars($htmlContent);

            $this->pages[$parameters['url']] = new Page($page, $parameters, $htmlContent);
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
     * @return \App\StaticPages\Page
     */
    public function getPage(string $url): Page
    {
        return $this->pages[$url];
    }
}
