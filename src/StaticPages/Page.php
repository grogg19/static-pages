<?php

namespace App\StaticPages;


class Page
{
    /**
     * @var string The container name associated with the model, eg: pages.
     */
    protected $dirName = 'static-pages';

    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [
        'title' => 'required',
        'url'   => ['required', 'regex:/^\/[a-z0-9\/_\-\.]*$/i', 'uniqueUrl']
    ];

    /**
     * @var array The array of custom attribute names.
     */
    public $attributeNames = [
        'title' => 'title',
        'url' => 'url',
    ];

}
