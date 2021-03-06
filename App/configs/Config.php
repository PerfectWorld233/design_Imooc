<?php
namespace Imooc;

class Config implements \ArrayAccess
{
    protected $path;
    protected $configs = [];

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function offsetGet($key)
    {
        if(empty($this->configs[$key]))
        {
            $file_path = $this->path.'/'.$key.'.php';
            $config    = require $file_path;
            $this->configs[$key] = $config;

            
        }
    }

    public function offsetSet($key, $value)
    {
        throw new Exception("Error Processing Request", 1);

    }

    public function offsetExists($key)
    {
        return isset($this->configs[$key]);
    }

    public function offsetUnset($key)
    {
        unset($this->configs[$key]);
    }
}



 ?>
