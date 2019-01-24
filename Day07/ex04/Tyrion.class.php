<?php

class Tyrion {
    public function sleepWith($person) {
        if (is_subclass_of($person, Lannister) || $person instanceof Jaime) {
            print("Not even if I'm drunk !" . PHP_EOL);
        } else {
            print("Let's do this." . PHP_EOL);
        }
    }
}