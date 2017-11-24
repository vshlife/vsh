<?php
namespace Vsh;
class Config{
    public static  $config=[];
    static  public function get($configure){
        $config_arr=explode('.',$configure);
        if(isset($config_arr[0])){
            if(isset(self:: $config[$config_arr[0]])){
                if(isset($config_arr[1])){
                    return self::$config[$config_arr[0]][$config_arr[1]];
                }else{
                    return self::$config[$config_arr[0]];
                }
            }else{
                $path=ROOT.'/'.APP.'/config/'.$config_arr[0].'.php';
                if(is_file($path)){
                    $conf=include $path;
                    self::$config[$config_arr[0]]=$conf;
                    if(isset($config_arr[1])){
                        return self::$config[$config_arr[0]][$config_arr[1]];
                    }else{
                        return self::$config[$config_arr[0]];
                    }
                }else{
                    throw new \Exception('找不到配置文件'.$path);
                }
            }
        }
    }
}