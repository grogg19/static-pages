<?php


namespace App\StaticPages;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Exception;

class FileSystem
{
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
    public function getFiles()
    {
        return $this->files;
    }

    public function getFile($url)
    {
        return $this->files[$url . '.htm'];
    }

}
