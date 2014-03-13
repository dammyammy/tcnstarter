<?php namespace Tech\Exceptions;


class BaseException extends \Exception {

	 protected $errors;

    function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}