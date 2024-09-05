<?php
// Константы классов

//  Обявление и использование констан
class MyClass
{

    const CONSTANT = 'значение константы';

    function showConstant()
    {

        echo self::CONSTANT;
        echo '<br>';
    }
}

echo MyClass::CONSTANT;
echo '<br>';

$className = 'MyClass';
echo '<br>';
echo $className::CONSTANT;
echo '<br>';
$class = new MyClass();
$class->showConstant();

echo '<br>';
echo $class::CONSTANT;

// Пример выведения константы ::class в классе пространства имен
echo '<br>';
// namespace foo {
    class Bar{
    }
    echo bar::class;
    echo '<br>';
// }

// Пример константного выражения класса

const ONE=1;
class Ree {
    const TWO = ONE * 2;
    const THREE = ONE+self::TWO;
    const SENTENCE = 'Значение константы THREE -' . self::THREE;
}
echo '<br>';
$ree = new Ree();
echo $ree::TWO;
echo '<br>';
echo $ree::THREE;
echo '<br>';
echo $ree::SENTENCE;
echo '<br>';

// Модификаторы видимости констант класса

class Gee{
    public const BAR = 'bar';
    private const BAZ = 'baz';

}

echo  Gee::BAR;
echo '<br>';
// echo  Gee::BAZ;
// Fatal error: Uncaught Error: Cannot access private constant Gee::BAZ
//  in /var/www/html/php/class_constants.php:67 Stack trace: #0 {main} 
// thrown in /var/www/html/php/class_constants.php on line 67

// Перезаписывание константы в бызовом класе через детей класс

abstract class dbObject{

    const TABLE_NAME = 'undefined';

    public function GetAll(){
        $c = get_called_class();
        $name = $c::TABLE_NAME;
        return $name;
    }
}

class dbPerson extends dbObject{
    const TABLE_NAME = 'person';
}

class dbAdmin extends dbPerson{
    const TABLE_NAME = 'admin';
}
$sas = new dbPerson;

echo $sas->GetAll();
// не рабоатет в 

// echo dbPerson::GetAll() . '<br>';
// echo dbAdmin::GetAll() . '<br>';
