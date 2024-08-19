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