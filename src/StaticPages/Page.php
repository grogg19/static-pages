<?php

namespace App\StaticPages;

use SplFileObject;
use App\StaticPages\File;
/**
 * Class Page
 * @package App\StaticPages
 */
class Page
{
    /**
     * @var mixed|string
     */
    private $parameters = [];

    /**
     * @var string
     */
    private $htmlContent = '';

    private SplFileObject $file;

    /**
     * Page constructor.
     * @param \App\StaticPages\File|null $fileObject
     */
     public function __construct(File $fileObject = null)
    {
        if($fileObject !== null) {
            list($parameters, $htmlContent) = explode('====', $fileObject->content);
            $this->parameters = parse_ini_string($parameters);
            $this->htmlContent = $htmlContent;
            $this->file = $fileObject->file;
        }
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
     * @param string $parameter
     * @return mixed|string
     */
    public function getParameter(string $parameter): string
    {
        return $this->parameters[$parameter];
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
     * @return string
     */
    public function getFileName(): string
    {
        return $this->file->getFilename();
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

    /**
     * @param string $htmlContent
     */
    public function setHtmlContent(string $htmlContent): void
    {
        $this->htmlContent = $htmlContent;
    }

    public function saveToFile(string $data): bool
    {

        //dd($file->getRealPath());
        //$file = new FileSystem($file->getRealPath());
    }

    public function makePage()
    {
        $this->setParameters([
            'title' => 'Пример страницы',
            'url' => '/example',
            'isHidden' => 0,
            'navigationHidden' => 0
        ]);
        $file = new FileSystem();
        $this->file->fwrite('test saving...');
        dd($this->file);
        $file->saveFile($newPage, $this->getParameters());
    }


}
