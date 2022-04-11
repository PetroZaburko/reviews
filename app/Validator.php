<?php


namespace App;


class Validator
{
    protected $field = null;
    protected $db = null;
    protected $errors = [];
    protected $request = null;


    public function __construct(array $values = null) {
        if ($values == null) {
            $this->request = !empty($_POST) ? $_POST : $_GET;
        }
        else {
            $this->request = $values;
        }
//        $this->db = Database::getInstance();
    }

    /**
     * Set the value of the field
     * @param string $field         field name
     * @return object
     */
    public function field(string $field) {
        $this->field = $field;
        return $this;
    }

    /**
     * Add an error
     * @param string $error         an error text
     * @return object
     */
    protected function serError(string $error) {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * Check are there any errors
     * @return bool
     */
    public function isPassed() {
        return (empty($this->errors)) ? true : false;
    }

    /**
     * Return all errors if they are, or return false
     * @return array|bool
     */
    protected function getErrors() {
        return !$this->isPassed() ? $this->errors : false;
    }

    /**
     * Display all errors in format unordered list
     * @return string
     */
    public function displayErrors() {
        $result = '<ul>';
        foreach ($this->getErrors() as $error) {
            $result .= '<li>' . $error . '</li>';
        }
        $result .= '</ul>';
        return $result;
    }

    /**
     * Validates an email address
     * @return object
     */
    public function email() {
        if(!filter_var($this->request[$this->field], FILTER_VALIDATE_EMAIL)) {
            $this->serError("The $this->field must be a valid email address.");
        }
        return $this;
    }

    /**
     * Validates a phone in +380********* format
     * @return object
     */
    public function phone() {
        if(!preg_match("/^\+380\d{3}\d{2}\d{2}\d{2}$/", $this->request[$this->field])) {
            $this->serError("The $this->field must be a valid phone number.");
        }
        return $this;
    }

    /**
     * Validates the minimum string length
     * @param int $length
     * @return object
     *
     */
    public function min(int $length) {
        if (strlen($this->request[$this->field]) < $length) {
            $this->serError("The $this->field must be at least $length characters.");
        }
        return $this;
    }

    /**
     * Validates the maximum string length
     * @param int $length
     * @return object
     *
     */
    public function max(int $length) {
        if (strlen($this->request[$this->field]) > $length) {
            $this->serError("The $this->field must be at most $length characters.");
        }
        return $this;
    }

    /**
     * Compare with the value of another field
     * @param string $field         compare field
     * @return object
     */
    public function matches(string $field) {
        if($this->request[$this->field] != $this->request[$field]) {
            $this->serError("The $this->field must match with $field");
        }
        return $this;
    }

//    /**
//     * Validates the unique value in the table
//     * @param string $table         table name
//     * @return object
//     */
//    public function unique(string $table) {
//        if($this->db->get($table, [$this->field, '=', $this->request[$this->field]])->count()) {
//            $this->serError("This $this->field already exists.");
//        }
//        return $this;
//    }

    /**
     * This field is required
     * @return object
     */
    public function required() {
        if($this->request[$this->field] == '' || $this->request[$this->field] == null) {
            $this->serError("The $this->field field is required.");
        }
        return $this;
    }

    /**
     * Validates a date in yyyy-mm-dd format
     * @return object
     */
    public function date() {
        if(!preg_match("/^(19|20)\d\d-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/", $this->request[$this->field])) {
            $this->serError("Please enter a $this->field in the YYYY-MM-DD format");
        }
        return $this;
    }
}