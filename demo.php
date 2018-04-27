<?php

/**
 * Created by PhpStorm.
 * User: Yanlongli
 * Date: 2018/4/27/0027
 * Time: 上午 10:06
 * APPLICATION:
 */
use socket\service;
use socket\message;

include 'vendor/autoload.php';

$config = require 'config.php';

$socket = new service($config);

//注册服务
$socket::Register('system',function (message $message){
    echo $message->get("message").PHP_EOL;
});
$socket::Register('message',function (message $message){
    echo $message->get("message").PHP_EOL;
});
$socket::register('default',function (message $message){
    echo 'Undefined type:'.$message->get('type').PHP_EOL;
});

$socket->read();