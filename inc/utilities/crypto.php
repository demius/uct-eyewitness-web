<?php

namespace Eyewitness\Utilities;

class Crypto {
    private static $alpha_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    private static $special_chars = '!@#$%^&*()-_=+,.?';

    public static function generate_rnd_string($len, $allow_special_chars = false){
        $chars = self::$alpha_chars;
        if($allow_special_chars){
            $chars .= self::$special_chars;
        }

        $max_index = strlen($chars) - 1;
        $str = '';
        for($i = 0; $i < $len; $i++){
            $rnd = rand(0, $max_index);
            $str .= $chars[$rnd];
        }
        return $str;
    }
}