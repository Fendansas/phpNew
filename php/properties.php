<?php

class SimpleClass{
    
    public $var1 = 'hello ' . 'world';
    public $var2 = <<<EOD
     hello world 
     EOD;
    public $va3 = 1+2;
    // не правильное определение свойств

    // public $var4 = self::myStaticMethod();
    // public $var5 = $myVar;

    // Привильное определение свойств

    // public $var6 = myConstant;
    public $var7 = [true, false];
    public $var8 = <<<'EOD'
    hello world
    EOD;
    
    // без можификатора области видимости

    static $var9;
    // readonly int $var10;

}
$var11 = new SimpleClass();
echo $var11->var8;

// Пример типизированных свойств

class User {

    public int $id;
    public ?string $name;

    public function __construct(int $id, ?string $name){

        $this->id = $id;
        $this->name = $name;
    }
}

$user = new User(1, null);
echo '<br> ';
var_dump($user->id);
var_dump($user->name);

// Обращение к свойствам

class Shape{

    public int $numberOfSides;
    public string $name;

    public function setNumberOfSides(int $numberOfSides): void {

        $this->numberOfSides = $numberOfSides;
    }

    public function setName(string $name) : void {

        $this->name = $name;

    }

    public function getNumberOfSides(): int{
        return $this->numberOfSides;
    }

    public function getName(): string {
        return $this->name;
    }
}

$triangle = new Shape();

$triangle->setName('triangle');
$triangle->setNumberOfSides('3');
echo '<br> ';
var_dump($triangle->getName());
echo '<br> ';
var_dump($triangle->getNumberOfSides());

$circle = new Shape();
$circle->setName('Circle');
echo '<br> ';
var_dump($circle->getName());
echo '<br> ';
// var_dump($circle->getNumberOfSides());

// Fatal error: Uncaught Error: Typed property Shape::$numberOfSides must not be accessed before
//  initialization in /var/www/html/php/properties.php:70 Stack trace:
 #0 /var/www/html/php/properties.php(92): Shape->getNumberOfSides() 
 #1 {main} thrown in /var/www/html/php/properties.php on line 70


 //   Примеры readonly свойств

 class Test {
    public readonly string $prop;
    public function __construct(string $prop){
        $this->prop = $prop;
    }
 }

 $test = new Test('foobar');
 
 echo '<br> ';
 // правильно течтение
 var_dump($test->prop);

 //   неправильое переопределение. Не имеет значения что присвоенное значение такоеже

//  $test->prop = 'fobar';

 // Fatal error: Uncaught Error: Cannot modify readonly property 
//  Test::$prop in /var/www/html/php/properties.php:117 Stack trace: 
#0 {main} thrown in /var/www/html/php/properties.php on line 117

// Модификатор readonly разрешается применять только к типизированным свойствам
// Тип свойства обявляют как Mixed когда требуется создать это свойство без ограничения типа

// Неправильная инициализация readonly свойств

class Test1 {
    public readonly string $prop;
}

$test1 = new Test1();

// $test1->prop = 'fobar';

// Fatal error: Uncaught Error: Cannot initialize readonly property 
// Test1::$prop from global scope in /var/www/html/php/properties.php:134 Stack trace: 
#0 {main} thrown in /var/www/html/php/properties.php on line 134
