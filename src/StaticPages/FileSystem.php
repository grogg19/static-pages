<?php


namespace App\StaticPages;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Exception;
use SplFileInfo;

class FileSystem
{
    /**
     * @var array
     */
    private $files = [];

    /**
     * FileSystem constructor.
     * @param $directory
     */
    public function __construct($directory)
    {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $filename)
        {
            if ($filename->isDir()) continue;
            $this->files[$filename->getFileName()] = $filename;
        }
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param $url
     * @return SplFileInfo
     */
    public function getFile($url): SplFileInfo
    {
        return $this->files[$url];
    }
}
