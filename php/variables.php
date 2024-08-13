<?php
$var ="car";
$Var = "Var";
echo "$var, $Var";

// $4car = "4var"; так объявлять переменные нельзя
$_var = '_var';
$täyte = 'täyte';

// Присвоени переменной по ссылке

$foo = '<br>foo';
$bar = &$foo; 
echo $bar;
$bar = '<br>Hi'.$bar; // переменная перезаписана
echo $bar;

//  Послке писваетются только именнованые переменные 

$foo = 24;
$bar = &$foo; // верное присваивание
// не ваерное присваивание

// $bar = &(8*8);
// function test(){
//     return 25
// }

// $bar = &test();
// облость видимости переменной

$a = 1;
// include 'b.inc'; // переменная а будет доступна в файле

$b = 1; // глобальная область видимости

function test(){
    $b = 1;
    echo $b; //  ссылка еа переменную в локальной области видимости

}
test();

// Использование global

$r = 1;
$t = 2;
function sum(){
    global $r, $t;
    $t = $r + $t;
}
sum();
echo $t;
echo '<br>';

// Объявление статической переменно

function static_count(){
    static $u = 0;
    echo '<br>';
    echo $u;
    $u++;
}
static_count();
static_count();

// статические преременные в унаследуемых методах

class Foo {
    public static function counter2(){
        static $counter2 = 0;
        $counter2++;
        return $counter2;
    }
}

class Bar extends Foo{}
echo '<br>';
var_dump(Foo::counter2());
echo '<br>';
var_dump(Foo::counter2());
echo '<br>';
var_dump(Bar::counter2());
echo '<br>';
var_dump(Bar::counter2());

function test_global_ref(){
    global $obj;
    $new = new stdClass();
    $obj = &$new;
}
function test_global_noref(){
    global $obj;
    $new = new stdClass();
    $obj = $new;
}
echo '<br>';
test_global_ref();
echo '<br>';
var_dump($obj);
test_global_noref();
echo '<br>';
var_dump($obj);

// переменные переменных

$o = 'hello'; // стандартаная переменная

$$o = 'world';// Теперь дерево символов пхп два определения переменных $o, 
// которая содержит знаяение hello  и переменная $hello  котокая содержит значение 
// world

echo '<br>';
echo "$o {$$o}";


$sas = 'a';
$sasa = 'bar';
$sasas = 'foo';
$sasasa = 'world';
$sa = 'hello';


echo '<br>';
echo $sa;
echo '<br>';
echo $$sa;
echo '<br>';
// echo $$$sa; дальше не работает

// обработка форм

?>
<form action="variables.php" method="post">
Name: <input type="text" name="username"><br>
Email: <input type="text" name="email"> <br>
<input type="submit" name="submit" value="Send me">
</form>

<?php 

echo '<br>';
echo $_POST['username'];
echo '<br>';
echo $_REQUEST['username'];







