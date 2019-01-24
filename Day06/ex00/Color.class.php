<?php
/**
 * Created by PhpStorm.
 * User: azavrazh
 * Date: 1/22/19
 * Time: 9:36 PM
 */

class Color
{
    public $red;
    public $green;
    public $blue;
    public $rgb;
    public static $verbose = false;

    public function __construct($arr) {

        if ( isset($arr['rgb']) ) {
            $rgb = intval($arr['rgb']);
            $this->red = ($rgb >> (8 * 2)) & 0xff;
            $this->green = ($rgb >> 8) & 0xff;
            $this->blue = $rgb & 0xff;
        } else {
            $this->red = intval($arr['red']);
            $this->green = intval($arr['green']);
            $this->blue = intval($arr['blue']);
        }
        $this->rgb = array("red" => $this->red, "green" => $this->green, "blue" => $this->blue);


        if (self::$verbose) {
            echo $this->__toString() . ' constructed.' . PHP_EOL;
        }
        return ($this->rgb);
    }

    public function __destruct() {
        if (self::$verbose) {
            echo $this->__toString() . ' destructed.' . PHP_EOL;
        }
    }

    public function __toString() {
        return "Color(red: $this->red, green: $this->green, blue: $this->blue)";
    }

    public function doc() {
        return file_get_contents("Color.doc.txt");
    }

    public function add($red, $green, $blue) {
        $r = $this->red + $red;
        $g = $this->green + $green;
        $b = $this->blue + $blue;
        return new Color(array('red'=>$r, 'green'=>$g, 'blue'=>$b));
    }

    public function sub($red, $green, $blue) {
        $r = $this->red - $red;
        $g = $this->green - $green;
        $b = $this->blue - $blue;
        return new Color(array('red'=>$r, 'green'=>$g, 'blue'=>$b));
    }

    public function mult($red, $green, $blue) {
        $r = $this->red * $red;
        $g = $this->green * $green;
        $b = $this->blue * $blue;
        return new Color(array('red'=>$r, 'green'=>$g, 'blue'=>$b));
    }
}
