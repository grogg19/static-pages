<?php

namespace App\StaticPages;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use SplFileObject;
use Exception;

class File
{
    public $file;
    public $content;

    public function __construct(string $pathToFile)
    {
        $this->open($pathToFile);
    }

    /**
     * @param string $path
     * @throws Exception
     */
    public function open(string $path): void
    {
        if(file_exists($path) && is_file($path)) {
            $this->file = new SplFileObject($path);
            $this->content = $this->getContent();
        } else {
            echo "Файл не найден";
        }
    }

    /**
     * @return string
     */
    private function getContent(): string
    {
        return $this->file->fread($this->file->getSize());
    }

    public function write()
    {

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
}
