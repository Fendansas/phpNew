<!-- Пользовательские функции   -->
 <?php

 function say_hi() {
        echo '<br>';
        echo 'Hi';
 }

 say_hi();

//  Аргументы функции

 function makecoffee($type = "капучино")
{
    echo '<br>';
    echo "Готовим чашку $type.\n";
}

makecoffee();
makecoffee(null);
makecoffee("эспрессо");

// Возврат значений

$number = 6;

function summ($number){
    return $number + $number;
}
echo '<br>';
echo summ($number);

// Функции переменных

function foo (){
    echo "B foo() <br/>\n ";
}

function bar($arg = ''){
    echo "В bar(); аргумент был '$arg' .<br/>\n ";
}

// функция обертка для echo

function echoit($string){
    echo $string;
}

$func = 'foo';
$func(); // вызывает функцию foo()

$func = 'bar';
$func ('test'); //  вызывает функцию bar()

$func = 'echoit';
$func('test'); //  вызывает функцию echoit

//Пример метода переменной

class Foo {
    function Variable(){
        $name = 'Bar';
        $this->$name(); // вызывает метод Bar()
    }
    function Bar(){
        echo '<br>Это Bar<br>';
    }
}

$foo = new Foo();
$funcname = 'Variable';
$foo->$funcname(); //вызывает $foo->Variable()



//Пример вызова метода переменной со статическим свойством

class Foo2 {
    static $variable = 'статическое свойство';

    static function Variable (){
        echo '<br>Вызов метода Variable<br>'; 
    }
}

echo Foo2::$variable; // Это выведет «статическое свойство». В области видимости класса нужна переменная $variable
$variable = 'Variable';
Foo2::$variable();// Вызывает $foo->Variable() после прочтения переменной $variable в текущей области видимости