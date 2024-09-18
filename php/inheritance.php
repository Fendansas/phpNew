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

// Ключивое слово static

// Пример статического метода

class Foo2 {
    public static function aStaticMethod(){
        echo 'sas';
    }
}
Foo2::aStaticMethod();
$className = 'Foo2';
$className::aStaticMethod();


// Пример статичекого свойства 

class stasicClass{
    public static $my_static = 'foo';

    public function staticValue(){
        return self::$my_static;
    }
}

class stasicClass2 extends stasicClass{
    public function fooStatic(){
        return parent::$my_static;
    }
}

print stasicClass::$my_static;
echo  '<br>';
 $staticClass = new stasicClass();
print $staticClass->staticValue();
echo  '<br>';
print $staticClass->$my_static;
echo  '<br>';
print $staticClass::$my_static;
echo  '<br>';
$name = 'stasicClass';
print $name::$my_static;
echo  '<br>';
print stasicClass2::$my_static;
echo  '<br>';
$name2 = new stasicClass2;
print $name2->fooStatic();

// Абсрактные классы

// Пример обстрактного класса

abstract class AbctractClass{
    //данные методы должны быть определены в дочернем класс
    abstract protected function getValue();
    abstract protected function prefixValue($prefis);

    // Общий метод

    public function printOut()  {
        print $this->getValue();
        echo  '<br>';
    }
}

class ConcreteClass extends AbctractClass{

    protected function getValue()
    {
        return 'ConcreteClass';
    }
    public function prefixValue($prefix){
        return "{$prefix} ConcreteClass";

    }

}
class ConcreteClass2 extends AbctractClass{
    protected function getValue()
    {
        return 'ConcreteClass2';
    }
    public function prefixValue($prefix){
        return "{$prefix} ConcreteClass2";

    }
}
$concreteClass =new ConcreteClass();
echo  '<br>';
$concreteClass->printOut();
echo  '<br>';
echo $concreteClass->prefixValue('FOO_');
echo  '<br>';

$concreteClass2 = new ConcreteClass2();

$concreteClass2->printOut();
echo  '<br>';
echo $concreteClass2->prefixValue('FOO_');
echo  '<br>';

// ПРимер обстрактного класса 2

abstract class Sas{
    abstract protected function prefixName($name);
}

class Sas1 extends Sas{
    public function prefixName($name, $separator = "."){
        if($name =='Pacman'){
            $prefix = 'Mr';
        } elseif($name == 'Pacwoman'){
            $prefix = 'Mrs';
        } else {
            $prefix = '';
        }

        return "{$prefix}{$separator}{$name}";
    }
} 
$sas = new Sas1();
echo  '<br>';
echo $sas->prefixName('Pacman');
echo  '<br>';
echo $sas->prefixName('Pacwoman');
