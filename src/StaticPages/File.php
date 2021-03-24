<?php


namespace App\StaticPages;

use FilesystemIterator;

class File extends FilesystemIterator
{
    public function __construct($directory, $flags = FilesystemIterator::KEY_AS_PATHNAME | FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS)
    {
        parent::__construct($directory, $flags);
    }
}