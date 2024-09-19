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

interface A {
    public function fo0();
}

interface B extends A{
    public function baz(Baz $baz);

}

class C implements B{
    public function foo(){}
    public function baz(Baz $baz)
}


// Совместимость с несколькими интерфейсами

class Foof{};
class Bar extends Foo{};
interface A{
    public function myfunc(Foof $arg):Foof
}

interface Bee {
    public function myFunc (Bar $arg):Bar
}
class MyClass implements A, B {
    public function myfunc(Foof $arg):Bar{
        return new Bar();
    }

}

// Множественное наследование интерфеса