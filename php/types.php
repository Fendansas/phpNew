<?php

//                 Введение

// Всего в PHP 9 типов переменных

// null
// bool
// int
// float (floating-point number)
// string
// array
// object
// callable
// resource


$a_bool = true;   // логическое значение
$a_str  = "foo";  // строка
$a_str2 = 'foo';  // строка
$an_int = 12;     // целое число


echo get_debug_type($a_bool);
echo '<br>';
echo get_debug_type($an_int);
echo '<br>';
echo get_debug_type($a_str);

// get_debug_type() эта функция доступна только с версии PHP 8.0 
// gettype($an_int) эта функция рабоате на старой верси PHP 
echo '<br>';
echo gettype($an_int);

// NULL 
$a = array();

$a == null; // <== return true
$a === null; // < == return false
is_null($a); // <== return false

// Boolean values

function remove_element($element, $array)
{
   //array_search returns index of element, and FALSE if nothing is found
   $index = array_search($element, $array);
   unset ($array[$index]);
   return $array; 
};

// this will remove element 'A'
$array = ['A', 'B', 'C'];
$array = remove_element('A', $array);

//but any non-existent element will also remove 'A'!
$array1 = ['A', 'B', 'C'];
$array1 = remove_element('X', $array1);

// проблема этой функции в том что при попытке не существующего элемента будет удалет первый элемент
// т.к. индекс будет равен 0 а 0 это первый элемент массива.
// правильное написание такой функции должно быть таким
function remove_element1($element, $array)
{
   $index = array_search($element, $array);
   if ($index !== FALSE) 
   {
       unset ($array[$index]);
   }
   return $array; 
}


// INT

$a = 1234; // десятичное число
$a = 0123; // восьмеричное число (эквивалентно 83 в десятичной системе)
$a = "0o123"; // восьмеричное число (начиная с PHP 8.1.0)
$a = 0x1A; // шестнадцатеричное число (эквивалентно 26 в десятичной системе)
$a = 0b11111111; // двоичное число (эквивалентно 255 в десятичной системе)
$a = '1_234_567'; // десятичное число (с PHP 7.4.0)

$sas = 'test';
