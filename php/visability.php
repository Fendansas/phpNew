<?php

// Области видимости

// Объявления свойст класса

class MyClass{

    public $public = 'Public';
    protected $protected = 'Protected';
    private $private ='Private';

    function printHello(){
        echo $this->public;
        echo '<br>';
        echo $this->protected;
        echo '<br>';
        echo $this->private;
        echo '<br>';
    }
}

$myClass = new MyClass();
echo $myClass->public;
echo '<br>';
// echo $myClass->protected;
echo '<br>';
// echo $myClass->private;
echo '<br>';

$myClass->printHello();

class MyClass2 extends MyClass {
    // Мы можем переопределить общедоступные и защищенные свойства, но не закрытые

    public $public = 'Public2';
    protected $protected = 'Protected2';

    function printHello(){
        echo $this->public;
        echo '<br>';
        echo $this->protected;
        echo '<br>';
        // echo $this->private;
    }
}

$myCass2 = new MyClass2();
echo $myCass2->public;
echo '<br>';
// echo $myCass2->protected;
echo '<br>';
// echo $myCass2->private;

$myCass2->printHello();

// Область видимости метода

class MyMethod{


    public function __construct(){}

    public function MyPoblic(){}

    protected function Myprotected(){}

    private function MyPrivate(){}

    function Foo(){
        $this->MyPoblic();
        $this->Myprotected();
        $this->Myprotected();
    }
}

$myMethod = new MyMethod;
$myMethod->MyPoblic(); // работает
// $myMethod->Myprotected(); // ошибка
// $myMethod->MyPrivate(); // ошибка

class MyMethod2 extends MyMethod {
    function Foo2(){
        $this->MyPoblic();
        $this->Myprotected();
        // $this->MyPrivate(); // ошибка
    
    }
}
$myMethod2 = new MyMethod2;
$myMethod2->MyPoblic(); // работает
$myMethod2->Foo2(); // не работает

class Bar {
    public function test(){
        $this->testPrivate();
        $this->testPublic();
    }

    public function testPublic(){
        echo 'Bar::testPublic<br>';
    }

    private function testPrivate(){
        echo 'Bar::testPrivate<br>';
    }
}

class Bar2 extends Bar {
    public function testPublic()
    {
        echo 'Bar2::testPublic<br>';
    }

    private function testPrivate() {
        echo 'Bar2::testPrivate<br>';
    }
}

$bar2 = new Bar2;
$bar2->test();


// Область видимости констант
class MyConst{

    public const MY_PUBLIC = 'public';

    protected const MY_PROTECTED = 'protected';
    private const MY_PRIVATE = 'private';

    public function foo(){
        echo self::MY_PUBLIC;
        echo '<br>';
        echo self::MY_PROTECTED;
        echo '<br>';
        echo self::MY_PRIVATE;
        echo '<br>';
    }
}

$myConst = new MyConst();
$myConst::MY_PUBLIC;
// $myConst::MY_PROTECTED; ошибка
// $myConst::MY_PRIVATE; ошибка

$myConst->foo();

class MyConst2 extends MyConst {
    function foo2(){
        echo self::MY_PUBLIC;
        echo '<br>';
        echo self::MY_PROTECTED;
        echo '<br>';
        // echo self::MY_PRIVATE; ошибка
        echo '<br>';
    }
}

$myConst2 = new MyConst2;
echo $myConst2::MY_PUBLIC;
echo '<br>';
$myConst2->foo2();// private не выводится.

// Доступ к элементам с модификатором private из объектов одного типа

class Test {
    private $foo;

    public function __construct($foo)
    {
        $this->foo = $foo;
    }
    private function bar(){
        echo '<br>Доступ к закрытому методу.<br>';
    }

    public function baz(Test $other){
        $other->foo = 'привет';
        var_dump($other->foo);
        $other->bar();
    }

}

$testss = new Test('test');
$testss->baz(new Test('other'));