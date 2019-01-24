<?php

class UnholyFactory
{
    private $fighters = Array();

    public function absorb($new) {
        if ($new instanceof Fighter) {
            $newName = $new->type;
            if (in_array($new, $this->fighters))
                print("(Factory already absorbed a fighter of type " . $newName . ")" . PHP_EOL);
            else {
                print("(Factory absorbed a fighter of type " . $newName . ")" . PHP_EOL);
                $this->fighters["$newName"] = $new;
            }
        }
        else {
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
        }
    }
    public function fabricate($fighterToFabricate) {
        $to_fabricate = false;
        foreach ($this->fighters as $key => $val) {
            if ($fighterToFabricate == $key) {
                $to_fabricate = true;
                break ;
            }
        }
        if ($to_fabricate) {
            print("(Factory fabricates a fighter of type " . $fighterToFabricate . ")" . PHP_EOL);
            return (new $this->fighters["$fighterToFabricate"]);
        }
        else
            print("(Factory hasn't absorbed any fighter of type " . $fighterToFabricate . ")" . PHP_EOL);
    }
}