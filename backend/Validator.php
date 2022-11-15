<?php

namespace Backend;
// assignment
class Validator
{

    private static $data = [];
    private static $errors = [];

    public static function validate(array $data)
    {
        $keys = array_keys($data);

        for ($i = 0; $i < count($keys); $i++) {
            if (
                $data[$keys[$i]] === 'required' &&
                isset($_POST[$keys[$i]]) &&
                !empty($_POST[$keys[$i]])
            ) {
                self::$data[$keys[$i]] = $_POST[$keys[$i]];
            } else {
                self::$errors[$keys[$i]] = $keys[$i] . ' is  required';
            }
        }


        if (count(self::$errors) > 0) {
            Session::put('data', self::$data);
            Session::put('errors', self::$errors);
            return header("Location:http://rawphp.test/");
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
