<?php

class config{
    public $config=[];
    static  public function get($configure){
        // $config_arr=explode('.',$config);
        if(isset(self:: $config[$configure])){
            return self::$config[$configure];
        }else{
            $path="app/config/".$configure.'.php';
            if(is_file($path)){
                $conf=include $path;
                self::$config[$configure]=$conf;
                return self::$config[$configure];  
            }else{
                throw new \Exception('找不到配置文件'.$path);
            }

        }

    }
}