<?php 

// Анонимные классы 


// Использование явного класса

class Logger {
    public function log($msg){
        echo $msg;
    }
}

// $util->setLogger(new Logger());

// Использование анонимного класса

// $until->setLogger(new class {
//     public function log($msg) {
//         echo $msg;
//     }
// });

// они могут передовать аргуметы в конструкторыб расширять другие классы,
//  зелизовывать интерфейсы и использовать треты как обычный класс


class SomeClass{}
interface SomeInterface{}
trait SomeTrait{}

var_dump(new class(10)extends SomeClass implements SomeInterface {
    private $num;
    public function __construct($num)
    {
        $this->num = $num;
    }
    use SomeTrait;
});

// для того чтобы использовать закрыте свойства внешнего класса в анонимном класе,
//  их нужно передать в конструктор

class Outer{
    private $prop =1;
    protected $prop2 = 2;
    protected function func1(){
        return 3;
    }
    public function func2(){
        return new class($this->prop) extends Outer{
            private $prop3;
            public function __construct($prop)
            {
                $this->prop3 = $prop;
            }
            public function func3(){
                return $this->prop2 + $this->prop3 + $this->func1();
            }
        };
    }

}


echo (new Outer)->func2()->func3();

// Все объекты созданные одним и темже объявлеием анонимного класса,
//  являются экземплярами этого самого класса


function anonymous_class(){
    return new class {};
}
if(get_class(anonymous_class()) === get_class(anonymous_class())){
    echo '<br>Тот же класс <br>';
} else {
    echo 'Другой класс';
}