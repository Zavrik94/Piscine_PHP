<?php

require_once '../ex00/Color.class.php';

class Vertex
{
    public $x;
    public $y;
    public $z;
    public $w;
    public $color;
    public static $verbose;

    public function __construct($arr) {
        $this->x = $arr['x'];
        $this->y = $arr['y'];
        $this->z = $arr['z'];
        if (isset($arr['w'])) {
            $this->w = $arr['w'];
        } else {
            $this->w = 1.0;
        }
        if (isset($arr['color'])) {
            $this->color = new Color($arr['color']);
        } else {
            $this->color = new Color(array('rgb'=>0xFFFFFF));
        }

        if (self::$verbose) {
            echo $this->__toString() . ' constructed.' . PHP_EOL;
        }
    }

    public function __toString()
    {
        if (self::$verbose) {
            return sprintf("Vertex(x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s)", $this->x, $this->y, $this->z, $this->w, $this->color);
        }
        else {
            return sprintf("Vertex(x: %.2f, y: %.2f, z:%.2f, w:%.2f)", $this->x, $this->y, $this->z, $this->w);
        }
    }

    public function doc() {
        return file_get_contents("Vertex.doc.txt");
    }

    public function getX()
    {
        return $this->x;
    }
    public function getY()
    {
        return $this->y;
    }
    public function getZ()
    {
        return $this->z;
    }
    public function getW()
    {
        return $this->w;
    }
    public function getColor()
    {
        return $this->color;
    }
}