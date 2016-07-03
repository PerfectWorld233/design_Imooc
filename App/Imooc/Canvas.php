<?php
namespace Imooc;

class Canvas
{
    protected $data;
    protected $decorators = [];

    public function init($width = 20 , $height = 10)
    {
        $data = [];
        for ($i=0; $i < $height; $i++)
        {
            for ($i=0; $i < $width; $i++)
            {
                $data[$i][$j]  = '*';
            }

        }
        $this->data = $data;
    }

    public function addDecorator(DrawDecorator $decorator)
    {
        $this->decorators[] = $decorator;
    }

    public function beforeDraw()
    {
        foreach ($this->decorators as $decorator)
        {
            $decorator->beforeDraw();
        }
    }

    public function afterDraw()
    {
        $decorators = array_reverse($this->decorators);
        foreach ($decorators as $decorator)
        {
            $decorator->afterDraw();
        }
    }

    public function draw()
    {
        $this->beforeDraw();
        foreach ($this->data as $line)
        {
            foreach ($line as $char)
            {
                echo $char;
            }
            echo "<br/>".\n;
        }
        $this->afterDraw();
    }

    public function rect($a1, $a2, $b1 , $b2)
    {
        foreach ($this->data as $k1 => $line)
        {
            if($k1 < $a1 or $k1 > $a2 ) continue;
            foreach ($line as $k2 => $char)
            {
                if($k2 < $b1 or $k2 > $b2) continue;
                {
                    $this->data[$k1][$k2] = '&nbsp;';
                }
            }
        }

    }


}

 ?>