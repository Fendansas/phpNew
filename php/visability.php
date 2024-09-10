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