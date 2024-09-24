<?php 

// Трейты

// пример использования трейтов

trait ezcReflectionReturnInfo{
    function getReturnType(){
        //
    }
    function getReturnDescription(){
        //
    }
}

class ezcReflectionMethod extends ReflectionMethod{
    use ezcReflectionReturnInfo;
    ///
}

class azcReflectionFunction extends ReflectionFunction{
    use ezcReflectionReturnInfo;
    //
}


// Пример приоритета старшинства


class Base {
    public function sayHello(){
        echo 'Hello ';
    }
}
trait SayWorld{
    public function sayHello(){
        parent::sayHello();
        echo 'World';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$s = new MyHelloWorld();
$s->sayHello();

//ПРимер альтернативного порядка преоритета

trait HelloWorld{
    public function sayHello(){
        echo 'Hello World';
    }
}

class TheWorldNotEnough {
    use HelloWorld;
    public function sayHello()
    {
        echo 'Hello Universe!';
    }
}
$q = new TheWorldNotEnough;
echo '<br>';
$q->sayHello();


// Пример использования нескольких трейтов

trait Hello {
    public function sayHello() {
        echo 'Hello';
    }
}

trait World {
    public function sayWorld(){
        echo ' World';
    }
}

class MyHelloWorld2{
    use Hello, World;
    public function sayExclamationMark(){
        echo '!';
    }
}

$w = new MyHelloWorld2();
echo '<br>';
$w->sayHello();
$w->sayWorld();
$w->sayExclamationMark();

// Пример разрешения конфликтов 

trait A {
    public function smallTalk(){
        echo 'a';
    }
    public function bigTalk(){
        echo 'A';
    }
}

trait B {
    public function smallTalk(){
        echo 'b';
    }
    public function bigTalk(){
        echo 'B';
    }
}

class Talker {
    use A, B{
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
    }
}

class Aliased_Talker{
    use A, B{
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
        B::bigTalk as talk;
    }
}