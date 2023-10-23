<?php

namespace hf04;

class ArrayManipulator
{
    private array $data = [];

    function __get(string $name)
    {
        if(isset($this->data[$name])){
            return $this->data[$name];
        } else {
            return null;
        }
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __isset($name) {
        return isset($this->data[$name]);
    }

    public function __unset($name) {
        unset($this->data[$name]);
    }

    public function __toString() {
        return implode(", ", $this->data);
    }

    public function __clone() {
        // Klónozási logika
        $this->data = array_map(function($item) {
            return (is_object($item) && method_exists($item, '__clone')) ? clone $item : $item;
        }, $this->data);
    }
}

$obj = new ArrayManipulator();
$obj->name = "John";
$obj->age = 30;
$obj->data = [1, 2, 3];

echo $obj->name;
echo $obj->age;
echo $obj->nonexistent;
echo isset($obj->name);
echo isset($obj->nonexistent);

unset($obj->age);
echo isset($obj->age);

echo $obj;

$cloneObj = clone $obj;
$cloneObj->name = "Jane";

echo $obj->name;
echo $cloneObj->name;