<?php


namespace App;


class Rules
{
    protected $validate;

    public function __construct( Validator $validator)
    {
        $this->validate = $validator;
    }

    public function validateOnAdd()
    {
        $this->validate->field('title')->min('3');
        $this->validate->field('review')->min('10');
        $this->validate->field('nickname')->min('3');
        $this->validate->field('email')->email();
        return $this->validate->isPassed();
    }

    public function getValidationErrors()
    {
        return $this->validate->displayErrors();
    }

}