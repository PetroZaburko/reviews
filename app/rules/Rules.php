<?php


namespace App\rules;

use App\Validator;

abstract class Rules
{
    protected $validate;

    public function __construct( Validator $validator)
    {
        $this->validate = $validator;
    }

    protected function getErrors()
    {
        return $this->validate->displayErrors();
    }

    protected function failed()
    {
        $this->ifFailed();
        exit();
    }

    public function validate()
    {
        $this->rules();
        return $this->validate->isPassed() ?  true : $this->failed() ;
    }

    abstract function rules();

    abstract function ifFailed();
}