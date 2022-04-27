<?php


namespace App\rules;


class ReviewRules extends Rules
{
    public function rules()
    {
        $this->validate->field('title')->min('3');
        $this->validate->field('review')->min('10');
        $this->validate->field('nickname')->min('3');
        $this->validate->field('email')->email();
    }

    function ifFailed()
    {
        $errors = $this->getErrors();
        header('HTTP/1.1 422 Unprocessable Entity');
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($errors, JSON_UNESCAPED_SLASHES);
    }
}