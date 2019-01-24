<?php

require_once '../ex01/Vertex.class.php';

class Vector {
    public static $verbose = false;
    private $x;
    private $y;
    private $z;
    private $w = 0.0;

    public function __construct( $arr ) {
        if (isset($arr['dest']) && $arr['dest'] instanceof Vertex) {
            if (isset($arr['orig']) && $arr['orig'] instanceof Vertex) {
                $orig = $arr['orig'];
            }
            else {
                $orig = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
            }
            $this->x = $arr['dest']->getX() - $orig->getX();
            $this->y = $arr['dest']->getY() - $orig->getY();
            $this->z = $arr['dest']->getZ() - $orig->getZ();
        }
        if (Self::$verbose) {
            echo $this . ' constructed' . PHP_EOL;
        }
    }

    public function __destruct() {
        if (Self::$verbose) {
            echo $this . ' destructed' . PHP_EOL;
        }
    }

    public static function doc() {
        return file_get_contents('Vector.doc.txt');
    }

    public function __toString() {
        return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->x, $this->y, $this->z, $this->w);
    }

    public function magnitude() {
        return (float)sqrt($this->x ** 2 + $this->y ** 2 + $this->z ** 2);
    }

    public function normalize() {
        $magn = $this->magnitude();
        if ($magn == 1) {
            return clone $this;
        }
        return new Vector(array( 'dest' => new Vertex(array(
            'x' => $this->x / $magn, 'y' => $this->y / $magn, 'z' => $this->z / $magn
        ))));
    }

    public function add(Vector $rhs) {
        return new Vector(array( 'dest' => new Vertex(array(
            'x' => $this->x + $rhs->getX(), 'y' => $this->y + $rhs->getY(), 'z' => $this->z + $rhs->getZ()
        ))));
    }

    public function sub(Vector $rhs) {
        return new Vector(array( 'dest' => new Vertex(array(
            'x' => $this->x - $rhs->getX(), 'y' => $this->y - $rhs->getY(), 'z' => $this->z - $rhs->getZ()
        ))));
    }

    public function opposite() {
        return new Vector(array( 'dest' => new Vertex(array(
            'x' => $this->x * -1, 'y' => $this->y * -1, 'z' => $this->z * -1
        ))));
    }

    public function scalarProduct($k) {
        return new Vector(array( 'dest' => new Vertex(array(
            'x' => $this->x * $k, 'y' => $this->y * $k, 'z' => $this->z * $k
        ))));
    }

    public function dotProduct(Vector $rhs) {
        return (float)($this->x * $rhs->getX() + $this->y * $rhs->getY() + $this->z * $rhs->getZ());
    }

    public function cos(Vector $rhs) {
        $a = $this->x * $rhs->getX() + $this->y * $rhs->getY() + $this->z * $rhs->getZ();
        $b = $this->x * $this->x + $this->y * $this->y + $this->z * $this->z;
        $c = $rhs->getX() * $rhs->getX() + $rhs->getY() * $rhs->getY() + $rhs->getZ() * $rhs->getZ();
        return ($a / sqrt($b * $c));
    }

    public function crossProduct(Vector $rhs) {
        return new Vector(array('dest' => new Vertex(array(
            'x' => $this->y * $rhs->getZ() - $this->z * $rhs->getY(),
            'y' => $this->z * $rhs->getX() - $this->x * $rhs->getZ(),
            'z' => $this->x * $rhs->getY() - $this->y * $rhs->getX()
        ))));
    }

    public function getX() {
        return $this->x;
    }

    public function getY() {
        return $this->y;
    }

    public function getZ() {
        return $this->z;
    }

    public function getW() {
        return $this->w;
    }
}