<?php
namespace Vsh;
class route {
    public static $module='Index';
    public static $controller='Default';
    public static $action='Index';

    public function __construct(){
        $config=Config::get('app');
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!=='/'){
            $path=$_SERVER['REQUEST_URI'];
            $path_arr=explode('/',trim($path,'/'));
            if(isset($path_arr[0])){
                self::$module=ucfirst($path_arr[0]);
            }
            if(isset($path_arr[1])){
                self::$controller=ucfirst($path_arr[1]);
            }
            if(isset($path_arr[2])){
                self::$action=ucfirst($path_arr[2]);
            }
            $count=count($path_arr)+3;
            $i=3;
            while($i<$count){
                if(isset($path_arr[$i+1])){
                    $_GET[$path_arr[$i]]=$path_arr[$i+1];
                }
                $i=$i+2;
            }
        }else{
            self::$module=$config['default_module'];
            self::$controller=$config['default_controller'];
            self::$action=$config['default_action'];
        }
    }

    public function srart(){
        $controller_file=ROOT.'/'.APP.'/'. self::$module.'/Controllers/'.self::$controller.'Controller.php';
        $controller_class='App\\'. self::$module.'\\Controllers\\'.self::$controller.'Controller';
        if(is_file( $controller_file)){
            include $controller_file;
            $model=new $controller_class();
            $a=self::$action;
            $model->$a();
        }else{
            throw new \Exception('找不到控制器' .$controller_file);
        }
    }
}