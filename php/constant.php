<?php
// Константа — идентификатор, или имя, для простого значения. Как подсказывает название,
//  это значение нельзя изменять во время работы скрипта (кроме магических констант,
//   которые на самом деле не относятся к константам). Константы чувствительны к регистру.
//    По принятому соглашению, имена констант пишутся в верхнем регистре.

// правильные имена констант
define('FOO', 'test 1');
define('FOO2', 'test 2');
define('FOO_BAR', 'test 3');

// неправильное имя константы

// define('2FOO', 'test 3');


echo FOO;
echo '<br>';
echo FOO2;

// Определение констант через ключевое слово const

// Простое сколярное значение

const CONSTANT = 'Hello world';
echo '<br>';
echo CONSTANT;

//Сколярное выражение
const ANOTHER_CONST =  CONSTANT . 'Good buy world';
echo '<br>';
echo ANOTHER_CONST;

const ANIMALS = array( 'dog', 'cat', 'bird');
echo '<br>';
echo ANIMALS[2];

