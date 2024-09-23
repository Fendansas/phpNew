<?php
// Интерфейсы

interface Template {
    public function setVariable($name, $var);
    public function getHtml($template);
}

class WorkingTemplate implements Template{
    private $vars = [];
    public function setVariable($name, $var)
    {
        $this->vars[$name] = $var;
    }
    public function getHtml($template)
    {
        foreach ($this->vars as $name => $value){ 
            $template = str_replace('{' . $name . '}' , $value, $template);
        }
        return $template;
    }
}

// Наследование интерфейсов

// interface A {
//     public function fo0();
// }

// interface B extends A{
//     public function baz(Baz $baz);

// }

// class C implements B{
//     public function foo(){}
//     public function baz(Baz $baz);
// }


// Совместимость с несколькими интерфейсами

// class Foof{};
// class Bar extends Foo{};
// interface Aaa{
//     public function myfunc(Foof $arg):Foof;
// }

// interface Bee {
//     public function myFunc (Bar $arg):Bar;
// }
// class MyClass implements Aaa, B {
//     public function myfunc(Foof $arg):Bar{
//         return new Bar();
//     }

// }

// Множественное наследование интерфеса


interface Sas1 {
    public function sas1();
}
interface Sas2 {
    public function sas2();
}
interface Sas3 extends Sas1, Sas2{
    public function sas3();
}

class SasClass implements Sas3{
    public function sas1(){}
    public function sas2(){}
    public function sas3(){}
}


// Пример интерфейса с константами

interface Rer1 {
    const B = 'константа интерфейса';
}
echo '<br>';
echo Rer1::B;

class Rer2 implements Rer1{
    const B = ' константа класса';
}
echo '<br>';
echo Rer2::B;

// интерфейсы с абстрактными классами

interface Qeq1 {
    public function foo(string $s): string;
    public function bar(int $i): int;
}

// Абстрактный класс может реализовывать только часть интерфейса
// Классы расширяющие абстрактный класс должны реализовать все остальные

abstract class Qeq2 implements Qeq1{
    public function foo(string $s): string {
        return $s;
    }
}

class Qeq3 extends Qeq2{
    public function bar(int $i):int{
        return $i+2;
    }
}

// Одновременное расширение ивнедрение

class One {
    //
}
interface Usable {
    //
}

interface Updatable{
    //
}

// порядок ключевых слов важен 

class Two extends One implements Usable, Updatable{
    //
}