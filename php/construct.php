<?php

// Конструкторы и деструкторы


class BaseClass {
    function __construct()
    {
        print 'Конструктора класса BaseClass <br>';
    }
}

class SubClass extends BaseClass {
    function __construct()
    {
        parent::__construct();
        print 'Конструктор класса SubClass <br>';
    }
}

class OtherSubClass extends BaseClass{}

$obj = new BaseClass();

$obj2 = new SubClass();

$obj3 = new OtherSubClass();

// Обявление аргументов в конструкторе

 class Point {
    protected int $x;
    protected int $y;

    public function __construct(int $x, int $y = 0){
        $this->x = $x;
        $this->y = $y;
    }
 }

 $p = new Point(4,5);// передаем все параметры
 $p2 = new Point(4); // Передаем только обязательный параметр 

 $p3 = new Point(y: 5, x: 4); // Вызываем с иминованными параметрами(PHP 8 and >)

 // Продвижение параметров конструктора до свойств. Класс выше можно переписать так.

 class Point2 {
    public function __construct(protected int $x, protected int $y = 0){}
 }

 // Ключевое слово new в инициализаторах

 //ПРимер ключивого слова new при инициализации класса

 // Все допустимо
 class Foo {};
 static $x = new Foo;
 const C = new Foo;

 function test($param = new Foo){}

//  #[AnAttribute(new Foo)]
 class Test2 {
    public function __construct($prop = new Foo){}
 }

 // Все запрещено (ошибка времени компиляции)

//  function test2(
//     // $z = new (CLASS_NAME_CONSTANT)(),// динамическое имя класс
//     $x = new class{},// Анонимный класс
//     $c = new a(...[]), // Распаковка аргументов
//     // $v = new B($abc), // Неподдерживаемое постоянное выражение
//  ){}

 //Использованеи статических методов для создания обектов


 class Product{
    private ?int $id;
    private ?string $name;

    private function __construct(?int $id = null, ?string $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromBasicData(int $id, string $name): static {
        $new = new static($id, $name);
        return $new;
    }
    public static function formJson(string $json) : static {
        $data = json_decode($json, true);
        return new static ($data['id'], $data['name']);
    }

    public static function fromXml (string $xml): static {

        $data = convert_xml_to_array($xml);
        $new = new static();
        $new->id = $data['id'];
        $new->name = $data['name'];
        return $new;
    }

 }

 $p1 = Product::fromBasicData(5,'Wiget');
 $p2 = Product::formJson($some_json_string);
 $p3 = Product::fromXml($some_xml_string);

 // Деструкторы 

 // Привер использования деструктора


 class MyDestructorClass {
    function __construct()
    {
       print 'Конструктор'; 
    }

    function __destruct()
    {
        print'уничтожается класс ' . __CLASS__ . '<br>';
    }
 }

 $object2 = new MyDestructorClass();