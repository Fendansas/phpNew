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



// #6 Новые обекты

class TestObj {
    public static function getNew(){
        return new static();
    }
}

class TestChild extends TestObj{}

$obj1 = new TestObj(); // по имение класса
$obj2 = new $obj1(); // через переменную которая содержит объект
var_dump($obj1 !== $obj2);
echo '<br>';

$obj3 = TestObj::getNew(); // через метод класса
var_dump($obj3 instanceof TestObj);
echo '<br>';
$obj4 = TestChild::getNew(); //через метода класса наследника
var_dump($obj4 instanceof TestChild);
echo '<br>';


//Даступ к свойствам и методам только что созданного объекта

echo '<br>';
echo (new DateTime())->format('Y');
echo '<br>';

// Сравнение доступа к свойству и вызова метода

class FooTest {
    public $testBar = 'свойство';

    public function testBar(){
        return 'метод';
    }
}

$newObj = new FooTest();

echo '<br>';
echo $newObj->testBar, PHP_EOL,  $newObj->testBar(), PHP_EOL;
echo '<br>';
// ВЫзов анонимной функции которую содежит свойство

class NewSee {
    public $seeText;

    public function __construct(){
        $this->seeText = function(){
            return 42;
        };
    }
}

$SeeObj = new NewSee();
echo '<br>';
echo ($SeeObj->seeText)(), PHP_EOL;
echo '<br>';


// Простое наследование классов

class ExtendClass extends SimpleClass{

    // переопределение родительского метода

    function displayVar(){
        echo "Расширенный класс\n";
        parent::displayVar();
    }
}

$extended = new ExtendClass();
$extended->displayVar();

 // Совместимость дочерних методов

 echo '<br>';

 class Base {
    public function baseFoo(int $a){
        echo "Допустимо\n";
    }

 }
 class Extends1 extends Base{
    function baseFoo(int $a = 5){
        parent::baseFoo($a);
    }
 }

 class Extends2 extends Base{
    function baseFoo(int $a, $b = 5){
        parent::baseFoo($a);
    }
 }

 $extend1 = new Extends1;
 $extend1->baseFoo();

 echo '<br>';
 $extend2 = new Extends2;
 $extend2->baseFoo(1);

 //Фатальная ошибка когда дочерние метод удаляет параметр


 echo '<br>';


 class DellBase{
    public function foo(int $a = 5){
        echo "Дщпустимо";
        echo '<br>';
    }
 }

 class DellExtend extends DellBase{
    // function foo(){   Fatal error: Declaration of DellExtend::foo() must be compatible with DellBase::foo(int $a = 5) in /var/www/html/php/oop-basics.php on line 230
    //     parent::foo(1);
    // }
 }


 // фатальная ошибка, когда дочерний метод делает необязательный
 //  параметр обязательным

 class RequiredBase{
    public function foo(int $a = 5){
        echo 'required <br>';
    }
 }

 class RequiredExtend extends RequiredBase{
    // function foo(int $a){
    //     parent::foo($a);
    // }

    // Fatal error: Declaration of RequiredExtend::foo(int $a) must be compatible
    //  with RequiredBase::foo(int $a = 5) in /var/www/html/php/oop-basics.php on line 246
 }

 // https://www.php.net/manual/ru/language.oop5.basic.php


 // Ошибка передачи именованных аргументов в параметры, которые переименовали в дочернем классе

 class Atest {
    public function test($foo, $bar){}
 }
class Btest extends Atest {
    public function test($a, $b){}
}
$atest = new Btest();

// передача параметров согласно контракту метода Atest::test()

// $atest->test(foo: 'foo', bar:'bar');// Ошибка
// Fatal error: Uncaught Error: Unknown named parameter $foo in /var/www/html/php/oop-basics.php:269 Stack trace:
 #0 {main} thrown in /var/www/html/php/oop-basics.php on line 269

 // Разрешение имени класс
//  namespace NS {
    class ClassName{}
    echo ClassName::class;
//  }

 // разрешение имени несуществующего класса
 echo '<br>';
 print Does\Not\Exist::class;


 // Разрешение имени обекта
 echo '<br>';
 class ClassName2{}
 $c = new ClassName2();
 print $c::class;
 echo '<br>';


 // ПРимеры работы Nullsafe оператора

 // Начиная с PHP 8.0.0
 $result = $repository?->getUser(5)?->name;
// Эквивалентна след блоку

if (is_null($repository)){
    $result = null;
} else {
    $user = $repository->getUser(5);
    if (is_null($user)){
        $result = null;
    } else {
        $result = $user->name;
    }
}

// Разница между  $this и self

// Статические функции должны использовать только статические переменные
// self только для статических функци. Но так же можно вызвать не статический метод
// как статические через self

// this только для нестатических 

// this требует чтобы класс был проинстацирован self не требует

// $this это ссылка на текущий объект и она нужно чтобы обратится к переменной в контексте класса

class human{

    public $name;

    public function __construct($name){
    $this->name = $name;
    // $name = $nameж // будет ошибка 
    }


    // public function klassFunc(){};
    // function getName(){
    //     echo $name; //  не правильно обратится не к переменной public name
    //     echo $this->name; // правильно
    //     $this->klassFunc(); // вызов метода класса
    // }

    // self используктся в том же самом ключе но уже для статических свойств

    static $lastName = 'ololol';

    public function klassFunc2(){}

    function getLasName(){
        echo self:: $lastName; // обращение к lastname
        echo $this_lasrName; //  null  или ошибка
    }
}

//Проверочная программа которая показывает главную разницу между self и this

class Klass{
    const STAT = 'S'; // константы всегда статичны
    // $stat = 'Static' ;
    public $publ = 'Public';
    private $priv = 'Private';
    protected $prot = 'Protected';

    function __construct(){}

    public function show(){
        print '<br> self::STAT: ' . self::STAT;//ссылается а контстанту
        // print '<br> self::$stat: ' . self::$stat; // статическая переменная
        // prinе '<br> $this->stat: ' . $this->stat; // Ошибки нет но вывидет пустую строку
        print '<br> $this->publ: ' . $this->publ;
        print '<br>';
    }
}
$me = new Klass();
$me->show();

