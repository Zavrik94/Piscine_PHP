<?php

class NightsWatch {

    private $warriors = array();
    public function recruit($person) {
        if ($person instanceof IFighter) {
            $this->warriors[] = $person;
        }
    }
    public function fight() {
        foreach ($this->warriors as $val) {
            $val->fight();
        }
    }
}