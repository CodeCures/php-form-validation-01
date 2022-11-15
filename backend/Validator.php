<?php

namespace Backend;
// assignment
class Validator
{

    private static $data = [];
    private static $errors = [];
    private static $postData = ['username' => 'Courage', 'password' => 'pass123'];

    public static function validate(array $data)
    {
        $keys = array_keys($data);

        for ($i = 0; $i < count($keys); $i++) {
            if (
                $data[$keys[$i]] === 'required' &&
                isset(self::$postData[$keys[$i]]) &&
                !empty(self::$postData[$keys[$i]])
            ) {
                self::$data[$keys[$i]] = self::$postData[$keys[$i]];
            } else {
                self::$errors[$keys[$i]] = $keys[$i] . ' is  required';
            }
        }


        if (count(self::$errors) > 0) {
            self::$data = [];
            Session::put('errors', self::$errors);
            header("Location:http://rawphp.test/");
        }

        return new self;
    }

    public function validated()
    {
        return self::$data;
    }

    public function errors()
    {
        return self::$errors;
    }
}

$validator = Validator::validate([
    'username' => 'required',
    'password' => 'required'
]);

var_dump($validator->validated());
var_dump($validator->errors());
