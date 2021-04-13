<?php

namespace App\StaticPages;

/**
 * Interface PageListCompatible
 * @package App\StaticPages
 */
interface PageListCompatible
{
    /**
     * @return array
     */
    public function list(): array;
}