<?php
namespace Vsh;
require  __DIR__ . '/vendor/autoload.php';
define('ROOT',realpath('./'));
define('APP','/app');

 define('DEBUG',true);
 if(DEBUG){
     ini_set('display_error','On');
 }else{
    ini_set('display_error','Off');
 }
vsh::run();
// 