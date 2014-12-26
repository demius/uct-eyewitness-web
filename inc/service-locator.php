<?php

function get_spot_instance(){
    static $spot;
    if($spot == null){
        $spot_cfg = new Spot\Config();
        $spot_cfg->addConnection('mysql', [
            'dbname' => 'eyewitness-web',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ]);
        $spot = new \Spot\Locator($spot_cfg);
    }
    return $spot;
}