<?php 

// Наследование

use MyClass as GlobalMyClass;

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

// Оператор разрешения области видимости

// Использование :: вне обявления класса

class MyClass {
    const CONST_VALUE = 'Значение константы';
}
$className = 'MyClass';

echo $className::CONST_VALUE;
echo  '<br>';
echo MyClass::CONST_VALUE;
echo  '<br>';


//  Использование :: внутри объявления класса

class OtherClass extends MyClass{
    public static $my_static = 'статическая переменная';

    public static function doubleColon(){
        echo parent::CONST_VALUE;
        echo  '<br>';
        echo self::$my_static;
        echo  '<br>';
    }
}

$classname = 'OtherClass';
// $className::doubleColon();

OtherClass::doubleColon();


// обращение к методу в родительком классе

 class SecondClass{
    protected function myFunc(){
        echo 'SecondClass::myFunc()<br>';
    }
 }
 class SecondClass2 extends SecondClass{
    public function myFunc(){
        parent::myFunc();
        echo 'SecondClass2::myFunc()<br>';
    }
 }
$class = new SecondClass2();
$class->myFunc();