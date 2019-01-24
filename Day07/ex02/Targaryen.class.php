<?php

class Targaryen {

    public function getBurned() {
        if ($this->resistsFire()) {
            return "emerges naked but unharmed";
        } else {
            return "burns alive";
        }
    }

    function resistsFire() {
        return false;
    }
}