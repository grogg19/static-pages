<?php

namespace App\StaticPages;

use SplFileObject;
use SplFileInfo;
use Exception;

class Page
{
    private $parameters;

    private $htmlContent;

    /**
     * @var SplFileObject
     */
    public $file;

    /**
     * Page constructor.
     * @param $pageName
     */
    public function __construct($pageName)
    {
        try {
            $this->file = $this->findPageByUrl($pageName);
            $this->parsePage();
        } catch (Exception $exception) {
            return 'Ошибка: ' . $exception->getMessage();
        }
    }

    /**
     * @param $pageName
     * @return SplFileInfo
     */
    private function findPageByUrl($pageName)
    {
        $fullPath = APP_DIR . 'static-pages' . DIRECTORY_SEPARATOR. $pageName . '.html';
        return (new SplFileObject($fullPath))->getFileInfo();
    }

    private function parsePage()
    {
        $content = (new SplFileObject($this->file->getRealPath()))->fread($this->file->getSize());
        list($parameters, $htmlContent) = explode('====', $content);
        $this->parameters = parse_ini_string($parameters);
        $this->htmlContent = htmlspecialchars($htmlContent);
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @return mixed
     */
    public function getHtmlContent()
    {
        return $this->htmlContent;
    }
}
