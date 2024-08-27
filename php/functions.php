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


//  Аноимные функции

echo preg_replace_callback(
    '~-([a-z])~',
    function ($match) {
        return strtoupper($match[1]);
    },
    'hello-world'
);

// Пример присвоения анонимной функции функции как значение переменной


$message = 'привет';

// Без конструкции use
$example = function () {
    var_dump($message);
};
$example();

// Наследуем переменную $message
$example = function () use ($message) {
    var_dump($message);
};
$example();

// Анонимная функция наследует переменную с тем значением, которое переменная
// содержала перед определением функции, а не в месте вызова функции
$message = '<br>мир';
$example();

// Сбросим message
$message = '<br>привет';

// Наследование по ссылке
$example = function () use (&$message) {
    var_dump($message);
};
$example();

// Значение, которое изменили в родительской области видимости,
// отражается внутри вызова функции
$message = '<br>мир';
echo $example();

// Замыкания умеют принимать обычные аргументы
$example = function ($arg) use ($message) {
    var_dump($arg . ', ' . $message);
};
$example("<br>привет");

// Объявление типа значения, которое вернёт функция, идёт после конструкции use
$example = function () use ($message): string {
    return "<br>привет, $message";
};
var_dump($example());


// Замыкание в области видимости

class Cart
{
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.95;

    protected $products = array();

    public function addToCard($product, $quantity)
    {
        $this->products[$product] = $quantity;
    }

    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] :
               FALSE;
    }

    public function getTotal($tax)
    {
        $total = 0.00;

        $callback = function ($quantity, $product) use ($tax, &$total)
        {
            $pricePerItem = constant(
                __CLASS__ . "::PRICE_" . strtoupper($product)
            );

            $total += ($pricePerItem * $quantity) * ($tax + 1.0);
        };

        array_walk($this->products, $callback);
        return round($total, 2);
    }
}

$my_cart = new Cart;


$my_cart->addToCard('butter', 1);
$my_cart->addToCard('milk', 3);
$my_cart->addToCard('eggs', 6);


print $my_cart->getTotal(0.05) . "\n";
// Результат будет равен 54.29



