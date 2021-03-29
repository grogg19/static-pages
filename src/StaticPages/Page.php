<?php

namespace App\StaticPages;

use SplFileInfo;
use Exception;

class Page
{
    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @var string
     */
    private $htmlContent = '';

    /**
     * @var SplFileInfo
     */
    private $fileInfo;

    /**
     * Page constructor.
     * @param SplFileInfo $page
     * @param array $parameters
     * @param string $htmlContent
     */
    public function __construct(SplFileInfo $page, array $parameters, string $htmlContent)
    {
        $this->parameters = $parameters;
        $this->htmlContent = $htmlContent;
        $this->fileInfo = $page;
    }

    /**
     * Возвращает параметры страницы
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Возвращает содержимое страницы
     * @return string
     */
    public function getHtmlContent(): string
    {
        return $this->htmlContent;
    }

    /**
     * @return SplFileInfo
     */
    public function getFileInfo(): SplFileInfo
    {
        return $this->fileInfo;
    }
}
