<?php


namespace App\controllers;

use App\Rules;
use League\Plates\Engine;
use League\Plates\Extension\Asset;

class Controller
{
    protected $templates;
    protected $rules;

    public function __construct(Engine $templates, Rules $rules)
    {
        $this->rules = $rules;
        $this->templates = $templates;
        $templates->loadExtension(new Asset('./'));
    }
}