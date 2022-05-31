<?php

class Foo {

    static $vals;

    public static function __callStatic($func, $args) {
        if (!empty($args)) {
            self::$vals[$func] = $args[0];
        } else {
            return self::$vals[$func];
        }
    }

}

Foo::username('john');
print Foo::username(); // prints 'john'
?>
