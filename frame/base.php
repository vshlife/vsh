<?php

class base {
    public static $classMap=[ ];
    static public function run(){
        $route=new \core\route();
        $m=$route->module;
        $c=$route->controller;
        $a=$route->action;
        $controller_file=APP.'/'. $m.'/Controllers/'.$c.'Controller.php';
      
        $controller_class='App\\'. $m.'\\Controllers\\'.$c.'Controller';
        if(is_file( $controller_file)){
            include $controller_file;
            $model=new $controller_class();
            $model->$a();
        }else{
            throw new \Exception('找不到控制器' .$controller_file);
        }
    }
/**
 * 自动加载类库
 */
    static public function load($class){
    
        if(isset( self::$classMap[$class])){
            return true;
        }else{
            $class=str_replace('\\','/',$class);
            $file=IMOOC.'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class]=$class; 
            }else{
                return false;
            }
        }      
    }
}
