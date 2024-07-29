<?php

//                 Введение

// Всего в PHP 9 типов переменных

// null
// bool
// int
// float (floating-point number)
// string
// array
// object
// callable
// resource


$a_bool = true;   // логическое значение
$a_str  = "foo";  // строка
$a_str2 = 'foo';  // строка
$an_int = 12;     // целое число


echo get_debug_type($a_bool);
echo '<br>';
echo get_debug_type($an_int);
echo '<br>';
echo get_debug_type($a_str);

// get_debug_type() эта функция доступна только с версии PHP 8.0 
// gettype($an_int) эта функция рабоате на старой верси PHP 
echo '<br>';
echo gettype($an_int);

// NULL 
$a = array();

$a == null; // <== return true
$a === null; // < == return false
is_null($a); // <== return false

// Boolean values

function remove_element($element, $array)
{
   //array_search returns index of element, and FALSE if nothing is found
   $index = array_search($element, $array);
   unset ($array[$index]);
   return $array; 
};

// this will remove element 'A'
$array = ['A', 'B', 'C'];
$array = remove_element('A', $array);

//but any non-existent element will also remove 'A'!
$array1 = ['A', 'B', 'C'];
$array1 = remove_element('X', $array1);

// проблема этой функции в том что при попытке не существующего элемента будет удалет первый элемент
// т.к. индекс будет равен 0 а 0 это первый элемент массива.
// правильное написание такой функции должно быть таким
function remove_element1($element, $array)
{
   $index = array_search($element, $array);
   if ($index !== FALSE) 
   {
       unset ($array[$index]);
   }
   return $array; 
}


// INT

$a = 1234; // десятичное число
$a = 0123; // восьмеричное число (эквивалентно 83 в десятичной системе)
$a = "0o123"; // восьмеричное число (начиная с PHP 8.1.0)
$a = 0x1A; // шестнадцатеричное число (эквивалентно 26 в десятичной системе)
$a = 0b11111111; // двоичное число (эквивалентно 255 в десятичной системе)
$a = '1_234_567'; // десятичное число (с PHP 7.4.0)

$sas = 'test';

// float
$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
// $d = 1_234.567; // начиная с PHP 7.4.0

$x = 8 - 6.4;  // which is equal to 1.6
$y = 1.6;
var_dump($x == $y); // is not true

// string
echo 'Это — простая строка';

// Числовые строки

$foo = 1 + "10.5";                // $foo — число с плавающей точкой (11.5)
$foo = 1 + "-1.3e3";              // $foo — число с плавающей точкой (-1299)
// $foo = 1 + "bob-1.3e3";           // TypeError начиная с PHP 8.0.0. Ранее $foo принималось за целое число (1)
// $foo = 1 + "bob3";                // TypeError начиная с PHP 8.0.0, Ранее $foo принималось за целое число (1)
$foo = 1 + "10 Small Pigs";       // $foo — целое (11). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE
$foo = 4 + "10.2 Little Piggies"; // $foo — число с плавающей точкой (14.2). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE
$foo = "10.0 pigs " + 1;          // $foo — число с плавающей точкой (11). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE
$foo = "10.0 pigs " + 1.0;        // $foo — число с плавающей точкой (11). В PHP 8.0.0 выдаётся ошибка уровня E_WARNING, а в более ранних версиях — уровня E_NOTICE

// Массивы 

// Массив в PHP — это упорядоченная структура данных, которая связывает значения и ключи.
// Этот тип данных оптимизирован для разных целей, поэтому с ним работают как с массивом,
// списком (вектором), хеш-таблицей (реализацией карты), словарём, коллекцией, стеком,
// очередью и, возможно, чем-то ещё. Поскольку значениями массива бывают другие массивы,
// также доступны деревья и многомерные массивы.

$array = array(
   "foo" => "bar",
   "bar" => "foo",
);

// Работа с коротким синтаксисом массива
$array = [
   "foo" => "bar",
   "bar" => "foo",
];

$array = array(
   1    => "a",
   "1"  => "b",
   // 1.5  => "c",
   true => "d",
);
var_dump($array);
// Поскольку все ключи в приведённом примере преобразуются к 1,
//  значение будет перезаписано на каждый новый элемент и останется
//   только последнее присвоенное значение — «d».

// Ключ (key) — необязателен. Если он не указан, PHP инкрементирует предыдущее наибольшее целочисленное (int) значение ключа.
$array = array("foo", "bar", "hallo", "world");
var_dump($array);

// Доступ к элементам массива через синтаксис квадратных скобок ¶

$array = array(
   "foo" => "bar",
   42    => 24,
   "multi" => array(
        "dimensional" => array(
            "array" => "foo"
        )
   )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);

// Для изменения конкретного значения элементу просто присваивают новое значение, указывая его ключ.
//  Если нужно удалить пару ключ/значение, необходимо вызывать конструкцию unset().
$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // В этом месте скрипта это
                // то же самое, что и $arr[13] = 56;

$arr["x"] = 42; // Это добавляет в массив новый
                // элемент с ключом «x»

unset($arr[5]); // Это удаляет элемент из массива

unset($arr);    // Это удаляет весь массив

// Переиндексация: Нужно для пересоздания индексов массива
$array = array_values($array);
$array[] = 7;
print_r($array);


// Деструктуризация массива ¶

$source_array = ['foo', 'bar', 'baz'];
[$foo, $bar, $baz] = $source_array;
echo '<br>';
echo $foo;    // выведет «foo»
echo '<br>';
echo $bar;    // выведет «bar»
echo '<br>';
echo $baz;    // выведет «baz»
echo '<br>';

// Преобразование в массив
class A {
   private $B;
   protected $C;
   public $D;
   function __construct()
   {
       $this->{1} = null;
   }
}
var_export((array) new A());

// Сравнение ¶
// Массивы сравнивают функцией array_diff() и операторами массивов.


// Объекты ¶

// Создание объекта

class foo {
   function do_foo(){
      echo '<br>Код Foo';
   }
}

$bar = new foo;
$bar->do_foo();

// Перечисления 
// Перечисления — это ограничивающий слой над классами и константами классов,
// предназначенный для предоставления способа определения закрытого набора возможных значений для типа.

// enum Suit
// {
//     case Hearts;
//     case Diamonds;
//     case Clubs;
//     case Spades;
// }

function do_stuff(Suit $s)
{
    // ...
}

// do_stuff(Suit::Spades);


// Ресурсы ¶
// Resource — переменная, которая хранит ссылку на внешний ресурс

// Callable как выражение или тип и callback-функции

// пример функции
function my_callback_function(){
   echo '<br>Привет мир';
}

// Пример метда

class MyClass{
   static function myCallbackMethod(){
      echo '<br>Привет мир';
   }
}

// Тип 1: Простой вызов callback-функции

call_user_func('my_callback_function');

call_user_func(array('MyClass', 'myCallbackMethod'));

$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

call_user_func('MyClass::myCallbackMethod');

class C
{
    public function __invoke($name)
    {
        echo '<br>Привет ', $name, "\n";
    }
}

$c = new C();
call_user_func($c, 'PHP!');


$double = function($a) {
   return $a * 2;
};

// Диапазон чисел
$numbers = range(1, 5);

// Передаём замыкание как callback-функцию,
// чтобы удвоить каждый элемент диапазона
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);

// Void
// void — это тип, который допустимо указывать только как возвращаемое значение,
//  которое указывает, что функция не возвращает значение, зато работу функции
//   по-прежнему можно прерывать. Поэтому его нельзя объявлять в объединении типов. Тип доступен
//    с PHP 7.1


// Never

// never — тип, который разрешается указывать только как возвращаемое значение,
//  которое указывает, что функция прекратит работу без возврата значения.
//   Функция либо вызывает конструкцию языка exit(), либо выбрасывает исключение,
//    либо это бесконечный цикл. Поэтому этот тип нельзя объявлять в объединении типов.
//     Тип доступен с PHP 8.1.0.

// На языке теории типов, never — нижний тип. Это означает, что он — подтип остальных 
// типов и заменяет другие возвращаемые типы при наследовании.

function sayHello (string $name): never {
   echo "<br>Hello $name";
   exit(); // if we comment this line, php throws fatal error
}
sayHello("sas");


// Относительные типы классов ¶
// Эти объявления типов можно использовать только внутри классов.

// self ¶
// Значение должно быть instanceof того же класса, что и класс, в котором используется объявление типа.

// parent ¶
// Значение должно быть instanceof родительского класса, наследуемого классом, в котором объявляется тип.

// static ¶
// static — это тип только для возвращаемого значения, который требует, чтобы возвращаемое значение
//  было instanceof того же класса, что и класс, в котором вызывается метод.
//   Доступен начиная с PHP 8.0.0.

// Объявление типов

// function test(boolean $param){}
//    test(trye);

//    Псевдонимы имён для скалярных типов (bool, int, float, string) не поддерживаются.
//     Вместо этого они рассматриваются как имена классов или интерфейсов.
//      Наример, когда в качестве типа указан boolean, ожидается, что значение выполняет
//       условие instanceof в отношении класса или интерфейса boolean, а не значение
//        типа bool:


function test(): void {}
test();
// Возврат по ссылке из void-функции устарел начиная с PHP 8.1.0,
//  поскольку такая функция противоречива. Ранее при её вызове выдавалась
//   ошибка уровня E_NOTICE: Только ссылки на переменные должны возвращаться по ссылке.


function array_bazz(array $arr){
   $arr = 1;
}

// Типизированные параметры, передаваемые по ссылке
$param = [];
array_dazz($param);
var_dump($param);
array_bazz($param);

// Старый способ указания nullable-аргументов

class C {}

function f(C $c = null){
   echo $c;
}

f(new C);
f(null);

// Повторяющиеся и избыточные типы
// function foo(): int|INT {} // Запрещено
// function foo(): bool|false {} // Запрещено
// function foo(): int&Traversable {} // Запрещено
// function foo(): self&Traversable {} // Запрещено

// use A as B;
// function foo(): A|B {} // Запрещено («use» — часть разрешения имён)
// function foo(): A&B {} // Запрещено («use» — часть разрешения имён)

class_alias('X', 'Y');
// function foo(): X|Y {} // Разрешено (избыточность известна только во время выполнения)
// function foo(): X&Y {} // Разрешено (избыточность известна только во время выполнени

// Пример объявления типа класса

class F {}
class G extends F {}

// Не наследует C.
class G {}

function g(C $c) {
   $sas = get_class($c)."\n";
   dump($sas);
}

g(new F);
g(new G);
g(new E);

// Пример объявления типа интерфейса
interface I { public function f(); }
class C implements I { public function f() {} }

// Не реализует I.
// class E {}

// function f() I $i) {
//     echo get_class($i)."\n";
// }

// f(new C);
// f(new E);

function sum($a, $b){
   return $a + $b;
}

// Обратите внимание, что будет возвращено значение float.
$a = sum(1,2);
echo $a;

// Строгая типизация для значений аргументо


function sum1(int $a, int $b) {
    return $a + $b;
}

var_dump(sum(1, 2));
var_dump(sum(1.5, 2.5));

function sum4(int $a, int $b) {
   return $a + $b;
}

var_dump(sum4(1, 2));

// Переданные значения будут приведены к целым числам: обратите внимание на вывод ниже!
var_dump(sum(1.5, 2.5));