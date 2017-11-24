<?php

class route {
    public $module='Index';
    public $controller='Default';
    public $action='Index';

    public function __construct(){
    
        // p($_SERVER);

        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!=='/'){
            $path=$_SERVER['REQUEST_URI'];
            $path_arr=explode('/',trim($path,'/'));
            if(isset($path_arr[0])){
                $this->module=ucfirst($path_arr[0]);
            }
            if(isset($path_arr[1])){
                $this->controller=ucfirst($path_arr[1]);
            }
            if(isset($path_arr[2])){
                $this->action=$ucfirst(path_arr[2]);
            }
            $count=count($path_arr)+3;
            $i=3;
            while($i<$count){
                if(isset($path_arr[$i+1])){
                    $_GET[$path_arr[$i]]=$path_arr[$i+1];
                }
                $i=$i+2;
            }
            // p(  $this->action);
        }
    }
}