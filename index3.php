<?php
class cloneTrooper
{
    static $count = 0;
    public $amount;

    public function __construct() {
        $this->amount = ++self::$count;
    }

    public function __clone() {
        $this->amount = ++self::$count;
    }
}

class MyArmy
{
    public $trooper1;
    public $trooper2;

    function __clone()
    {
        $this->trooper1 = clone $this->trooper2;
    }
}

$obj = new MyArmy();

$obj->trooper1 = new cloneTrooper();
$obj->trooper2 = new cloneTrooper();
$obj1 = clone $obj;
$obj2 = clone $obj;


print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj1);

print("Cloned Object:\n");
print_r($obj2);