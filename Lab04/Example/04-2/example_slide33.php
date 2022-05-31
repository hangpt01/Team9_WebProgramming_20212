<?php

abstract class Shape {

    abstract function getArea();
}

abstract class Polygon extends Shape {

    abstract function getNumberOfSides();
}

class Triangle extends Polygon {

    public $base;
    public $height;

    public function getArea() {
        return(($this->base * $this->height) / 2);
    }

    public function getNumberOfSides() {
        return(3);
    }

}

class Rectangle extends Polygon {

    public $width;
    public $height;

    public function getArea() {
        return($this->width * $this->height);
    }

    public function getNumberOfSides() {
        return(4);
    }

}

class Circle extends Shape {

    public $radius;

    public function getArea() {
        return(pi() * $this->radius * $this->radius);
    }

}

class Color {

    public $name;

}

$myCollection = array();
$r = new Rectangle;
$r->width = 5;
$r->height = 7;
$myCollection[] = $r;
unset($r);
$t = new Triangle;
$t->base = 4;
$t->height = 5;
$myCollection[] = $t;
unset($t);
$c = new Circle;
$c->radius = 3;
$myCollection[] = $c;
unset($c);
$c = new Color;
$c->name = "blue";
$myCollection[] = $c;
unset($c);
foreach ($myCollection as $s) {
    if ($s instanceof Shape) {
        print("Area: " . $s->getArea() . "<br>\n");
    }
    if ($s instanceof Polygon) {
        print("Sides: " . $s->getNumberOfSides() . "<br>\n");
    }
    if ($s instanceof Color) {
        print("Color: $s->name<br>\n");
    }
    print("<br>\n");
}
?>