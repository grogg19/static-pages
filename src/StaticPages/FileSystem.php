<?php


namespace App\StaticPages;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Exception;
use SplFileInfo;
use SplFileObject;

class FileSystem
{
    /**
     * @var array
     */
    private $files = [];

    private $fileName = '';

    private $directory = 'static-pages';

    /**
     * FileSystem constructor.
     * @param $directory
     */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($this->directory)) as $filename)
        {
            if ($filename->isDir()) continue;
            $this->files[$filename->getFileName()] = $filename;
        }
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

    private function arrayToIni(array $dataArray, array $parentArray = array())
    {
        $out = '';
        foreach ($dataArray as $key => $value)
        {
            if (is_array($value))
            {
                //subsection case
                //merge all the sections into one array...
                $section = array_merge((array) $parentArray, (array) $key);
                //add section information to the output
                $out .= '[' . join('.', $section) . ']' . PHP_EOL;
                //recursively traverse deeper
                $out .= $this->arrayToIni($value, $section);
            }
            else
            {
                //plain key->value case
                $out .= "$key = $value" . PHP_EOL;
            }
        }
        return $out;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    public function saveFile(SplFileObject $file, array $dataArray): bool
    {
        $contentFile = $this->arrayToIni($dataArray);
        return ($file->fwrite($contentFile)) ? true : false;
    }

    public function createFile($path)
    {

    }

}
