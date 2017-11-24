<?php
namespace Vsh;
class Loader {
    public static $classMap=[];
 
    public static function register($autoload = '')    {
        // 注册系统自动加载
        spl_autoload_register( $autoload ?$autoload : 'Vsh\\Loader::autoload');
    }
/**
 * 自动加载类库
 */
    static public function autoload($class){
 
        if(isset( self::$classMap[$class])){
            return true;
        }else{
            $class=str_replace('\\','/',$class);
            $file='/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class]=$class; 
            }else{
                return false;
            }
        }      
    }
}
