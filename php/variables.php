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