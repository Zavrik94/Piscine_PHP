<?php
/**
 * Created by PhpStorm.
 * User: azavrazh
 * Date: 1/24/19
 * Time: 6:55 PM
 */

class House {

    public function introduce() {
        echo "House " . $this->getHouseName() . " of " . $this->getHouseSeat() . " : \"" . $this->getHouseMotto() . "\"" . PHP_EOL;
    }

}