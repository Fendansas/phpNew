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

// Пример изминения видимости метода

trait HelloTrate{
    public function sayTrait(){
        echo '<br>';
        echo 'Hello Trait';
    }
}
// изминение видимости метода sayTrait

class Trait1 {
    use HelloTrate{
        sayTrait as protected;
    }
}

// Создание псевдонима метода с измененной видимостью
// видимость sayTrait

class Trait2 {
    use HelloTrate{
        sayTrait as private myPrivateTait;
    }
}


// Трейты составленные из трейтов

trait Sas{
    public function saySas(){
        echo '<br>';
        echo 'sas';
    }
}
trait Sas2 {
    public function saySas2(){
        echo '<br>';
        echo 'Sas2';
    }
}
trait SasSas2 {
    use Sas, Sas2;
}

class MySasSas2{
    use SasSas2;
}

$s = new MySasSas2;
$s->saySas();
$s->saySas2();

// требования трейта при промощи обстрактных методов

trait HelloAb{
    public function sayHelloWorldAb(){
        echo 'Hello'.$this->getWorldAd();
    }
    abstract public function getWorldAd();
}

class MyHelloWorldAb{
    private $world;
    use HelloAb;
    public function getWorldAd(){
        return $this->world;
    }
    public function setWorldAb($val){
        $this->world = $val;
    }
}

// статические переменные
echo '<br>';
trait Counter {
    public function inc(){
        static $c = 0;
        $c = $c + 1;
        echo $c;
        echo '<br>';
    }
}

class C1{
    use Counter;
}

class C2 {
    use Counter;
}

$d = new C1;
$d->inc();
$p = new C2;
$p->inc();

// статические методы 

trait StaticExample{
    public static function doSomething (){
        echo ' Do';
        echo '<br>';
    }
}

class Exam {
    use StaticExample;
}

Exam::doSomething();

// статические свойства

trait StaticExample2 {
    public static $static = 'foo';
}

class Example2 {
    use StaticExample2;
}
echo Example2::$static;

// Определение свойств

trait ProprtiesTrait{
    public $x = 1;
}

class PropirtiesExample {
    use ProprtiesTrait;
}

$example = new PropirtiesExample;

$example->x;

// Разрешение конфликтов

trait ProprtiesTrait2{
    public $same = true;
    public $different1 = false;
    public bool $different2;
    public bool $different3;
}

class PropirtiesExample2{
    use ProprtiesTrait2;

    public $same = true;
//     public $different1 = true; // Фатальная ошибка
//     public string $different2; // Фатальная ошибка
//     readonly protected bool $different3; // Фатальная ошибка
}


// определение констант

trait ConstantTrait{
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUNABLE = 5;
}

class ConstantExample{
    use ConstantTrait;
}

$sass = new ConstantExample;

$sass::FLAG_MUTABLE; // 1

// Разрешение конфликтов 

trait ConstantTrait2 {
    public const FLAG_MUTABLE = 1;
    final public const FLAG_IMMUNABLE = 5;

}

class ConstantEcample2 {
    use ConstantTrait2;
    // public const FLAG_IMMUNABLE = 5; // Фатальная ошибка
}