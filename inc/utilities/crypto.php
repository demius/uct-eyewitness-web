<?php

namespace Eyewitness\Utilities;

class Crypto {
    private static $allowed_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890!@#$%^&*()-_=+,.?';

    public function generate_rnd_string($len){
        $max_index = sizeof(self::$allowed_chars) - 1;
        $str = '';
        for($i = 0; $i < $len; $i++){
            $rnd = rand(0, $max_index);
            $str .= self::$allowed_chars[$rnd];
        }
        return $str;
    }
}