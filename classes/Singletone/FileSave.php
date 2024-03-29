<?php

namespace Singletone;

class FileSave {
    private $filePath;

    private static $_instance = null;

    private function __construct()
    {
        $this->filePath = md5(microtime()).'.txt';
    }

    public static function getInstance() : FileSave
    {
        // instanceof
        if( null === self::$_instance ){
            self::$_instance = new static();
        }
        return self::$_instance;
    }

    public function save( $dir )
    {
        $content = " text ";

        if( file_exists($dir. '/'. $this->filePath )){
            $content = file_get_contents($dir. '/'. $this->filePath ) . $content;
        }

        file_put_contents($dir. '/'. $this->filePath, $content );
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

}