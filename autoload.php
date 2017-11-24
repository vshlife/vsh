<?php
/**
 * 自动载入
 *
 * @author Flc <2016-10-25 17:35:52>
 * @link http://flc.ren 
 */
spl_autoload_register(function ($classname) {
    $baseDir = __DIR__  . DIRECTORY_SEPARATOR . 'frame' . DIRECTORY_SEPARATOR . 'vshswy' . DIRECTORY_SEPARATOR;

    if (strpos($classname, "vsh\\") === 0) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, substr($classname, strlen('vsh\\')));
        $file = $baseDir . $path . '.php';

        if (is_file($file))
            require_once $file;
    }
});