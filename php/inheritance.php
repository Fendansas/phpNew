<?php 

// Наследование

class Foo {
    public function printItem($string){
        echo 'Foo: ' . $string . '<br>';
    }

    public function printPHP(){
        echo 'PHP this best<br>';
    }

}

class Bar extends Foo {
    public function printItem($string)
    {
        echo 'Bar: ' . $string . '<br>';
    }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('Bax');
$foo->printPHP();
$bar->printItem('Baz');
$bar->printPHP();

//Переопределяющий метод не объявляет никакого типа возвращаемого объекта

class MyDateTime extends DateTime{
    // public function modify(string $modifier)
    // {
    //     return false;
    // }
}
// Deprecated: Return type of MyDateTime::modify(string $modifier)
//  should either be compatible with DateTime::modify(string $modifier): DateTime|false,
//   or the #[\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice
//    in /var/www/html/php/inheritance.php on line 33


// Преропределяющий метода объявляет неверный тип возвращаемого  значения

class MyDateTime2 extends DateTime{
    // public function modify(string $modifier): ?DateTime
    // {
    //     return null;
    // }
}
// [\ReturnTypeWillChange] attribute should be used to temporarily suppress the notice
//  in /var/www/html/php/inheritance.php on line 47

// Переопределяющий метод объявляет неверный тип вохвращаемого значения без уведомления об устаревании

class MyDateTime3 extends DateTime{
    #[\ReturnTypeWillChange]
    public function modify(string $modifier)
    {
        return false;
    }
}


