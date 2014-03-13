<?php namespace Tech\Services\Validation;

use Illuminate\Validation\Factory;

abstract class Validator {

    protected $validator;

    function __construct(Factory $validator) {
        
        $this->validator = $validator;
    }

    public function validate(array $input,  array $rules = [], array $messages = [])
    {
        $rules    = array_merge(static::$rules, $rules);
        $messages = array_merge(static::$messages, $messages);

         $validation = $this->validator->make($input, $rules, $messages);

        if ($validation->fails()) throw new ValidationException($validation->messages());

        return true;
    }

    public function fire($input)
    {
        $this->validate($input);
    }

}