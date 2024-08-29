<?php 

// Пример посторения класс

class SimpleClass{

    // Объявление свойства    
    public $var = 'значение по умолчанию';

    // Объявление метода

    public function displayVar(){
        echo $this->var;
    }
}

// Псевдо переменная $this доступна, когда метод вызывается из контекста объекта.
// Переменая $this значение вызывающего объекта

// Примеры псевдопеременной $this

class A {
    function foo(){
        if(isset($this)){
            echo 'переменная $this определена (';
            echo get_class($this);
            echo ')\n';
        } else {
            echo 'Переменная \ $this не определена.  \n';
        }
    }
}

class B {
    function bar(){
        // A::foo();
    }
}

$a = new A();
$a->foo();

// A::foo();
$b = new B();
$b->bar();

// B::var();

// Начиная 8.2 класс можно пометить модификатором readonly. Такая пометка не разрешит создавать
// динамичские свойства

// В классах только для чтения нельзя объявлять нетипезированные и статические свойства,
// поскольку такие свыоства нельзя помечать модификатором readonly

readonly class ReadClass{
    // public $sas  вызовет критическую ошибку не указан тип
    // public static int $sas; вызовет критическую ошибку не может быть статическим
}

// Создание экземпляра класса

$instance = new SimpleClass();

// Создание класса через преременную
$className = 'SimpleClass';

$instance = $className;

// Пример новых объектов которые создали через произвольные выражения

class ClassA extends \stdClass{}
class ClassB extends \stdClass{}
class ClassC extends ClassB{} 
class ClassD extends ClassA{}

function getSomeClass ():string{
    return 'ClassA';
}
echo '<br>';
var_dump(new( getSomeClass()));
echo '<br>';
var_dump(new('Class' . 'B'));
echo '<br>';
var_dump(new('Class' . 'C'));
echo '<br>';
var_dump(new(ClassD::class));
echo '<br>';

// Присваивание объекта

$someObject = new SimpleClass();

$someObject2 = $someObject;
$reference = & $someObject;

$someObject->var = 'У экземпляра класса, который содержит пременная $someObject2 тоже будет это значение';

$someObject = null; // значения переменных $someObject2 $someObject2 станут равны null

echo '<br>';
var_dump($someObject);
echo '<br>';
var_dump($reference);
echo '<br>';
var_dump($someObject2);
echo '<br>';

// https://www.php.net/manual/ru/language.oop5.basic.php

// #6

