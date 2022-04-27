<?php


namespace App\controllers;

use League\Plates\Engine;
use League\Plates\Extension\Asset;

class Controller
{
    protected $templates;

    public function __construct(Engine $templates)
    {
        $this->templates = $templates;
        $templates->loadExtension(new Asset('./'));
    }
}