<?php
namespace Vsh;

require __DIR__ . '/Loader.php';
class Vsh{
    static public function run(){
    
        Loader::register();
        
        $route= new Route();
        $route->srart();
    //    print_r($a->srart());
    }
}


