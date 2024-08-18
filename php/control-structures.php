<?php
// if

$a = 1;
$b = 2;

if ($a > $b){
    echo 'A > B';
}

// esle 

if ($a > $b){
    echo 'A > B';
} else {
    echo 'B > A';
}

// elseif/else if 

if ($a > $b){
    echo 'A > B';
} elseif($a < $b) {
    echo 'B > A';
}

if ($a > $b):
    echo 'A > B';
 elseif($a < $b) :
    echo 'B > A';
 endif;
 
//  Альтернативный синтаксис управляющих структур
?>

<?php if ($a < $b): ?>
   <br> Привет <br>
   <?php endif; ?>

   <!-- while  -->

   <?php
   $i = 1;
   while ($i <=10){
    echo '<br>' . $i++ . '<br>';
   }

//    do-while 

$p = 0;
do{
    echo $p;
} while ($p > 0);


do {
    if ($i < 5) {
        echo "Значение переменной \$i ещё недостаточно велико";
        break;
    }

    $i *= $factor;

    if ($i < $minimum_limit) {
        break;
    }

    echo "Теперь значение переменной \$i в порядке";

    /* Обрабатываем переменную $i */

} while (0);

// for
echo '<br>';
for($i = 0; $i <= 10; $i++){
    echo $i . '-> ';
}
echo '<br>';
for ($i = 0; ; $i++){
    if($i > 10){
        break;
    }
    echo $i . '-> ';
}

echo '<br>';
$i = 0;
for (; ; ){
    if($i >10){
        break;
    }
    echo $i . '-> ';
    $i++;
}
echo '<br>';
for ($i = 1, $j = 0; $i<=10; $j += $i, print $i, $i++);

$people = array (
    array('name' => 'Kalle', 'salt' => 43424),
    array('name' => 'Pierre', 'salt' => 32432)
);
for ($i = 0; $i < count($people); ++$i){
    $people[$i]['salt'] = mt_rand(00000, 99999);
    echo '<br>';
    echo $people[$i]['salt'] . ' ' . $people[$i]['name'];
}

// усовершенствованный цикл 

for ($i = 0, $j = count($people); $i < $j; ++$i){
    $people[$i]['salt'] = mt_rand(00000, 99999);
    echo '<br>';
    echo $people[$i]['salt'] . ' ' . $people[$i]['name'];
}


// foreach

// Чтобы непосредственно изменять элементы массива внутри цикла,
//  перед переменной $value указывают знак &. Тогда значение будет присвоено по ссылке.

$arr = array(1,2,3,4);
foreach ($arr as &$value) {
    $value = $value * 2;
}
unset($value); // разорвать ссылку на последний элемент

// Распаковка вложенных массивов языковой конструкцией list() 

$array = [
    [1,2],
    [3,4]
];

foreach($array as list($a, $b)){
    echo '<br>';
    echo "A: $a; B: $b\n ";
}
// Если массив содержит недостаточно элементов для заполнения переменных в конструкции list(),
//  то будет сгенерировано уведомление об ошибке:



// break

// Инструкция break прерывает выполнение текущей структуры for, foreach, while, do-while или switch.

$arr = array('один', 'два', 'три', 'четыре', 'стоп', 'пять');

foreach ($arr as $val) {
    if ($val === 'стоп') {
        break;    /* В этом месте можно было бы написать 'break 1;'. */
    }

    echo "$val<br />\n";
}

/* Передача необязательного аргумента. */

$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo "Итерация 5<br />\n";
            break 1;  /* Выйти только из конструкции switch. */
        case 10:
            echo "Итерация 10; выходим<br />\n";
            break 2;  /* Выходим из конструкции switch и из цикла while. */
        default:
            break;
    }
}

// continue


$arr = ['ноль', 'один', 'два', 'три', 'четыре', 'пять', 'шесть'];
foreach ($arr as $key => $value) {
    if (0 === ($key % 2)) { // пропуск чётных чисел
        continue;
    }
    echo $value . "\n";
}






