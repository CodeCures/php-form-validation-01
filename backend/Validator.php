<?php

namespace Backend;
// assignment
class Validator{

    private static $data = [];

    public static function validate(array $data)
    {
        foreach($data as $key as $value){
            if(isset(key)){
                self::$data[$key] = $value;
            }else{
                Session::put('errors', "there was an error");
            }   
        }
    }

    public static function validated()
    {
        return self::$data;
    }
}