<?php

class Jaime {
    public function sleepWith($person) {
        if ($person instanceof Cersei) {
            print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
        } else if (is_subclass_of($person, Lannister)  || $person instanceof Tyrion) {
            print("Not even if I'm drunk !" . PHP_EOL);
        } else {
            print("Let's do this." . PHP_EOL);
        }
    }
}