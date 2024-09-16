<?php
// https://code.mu/ru/php/tasker/stager/   
?>
<a href="https://code.mu/ru/php/tasker/stager/">https://code.mu/ru/php/tasker/stager/   </a>
<h2>1.1</h2>
<h3>1</h3>
<p>Дано число. Проверьте, отрицательное оно или нет. Выведите об этом информацию в консоль.</p>
<form action="block-1.php" method="post">
Видите чило: <input type="number" name="number"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3>Это число 
<?php 
$number = $_POST['number'];
if( $number > 0){
    echo 'положительное ' . $_POST['number'] ;
} elseif ( $number < 0){
    echo 'отрицательное ' . $_POST['number'];
} else {
    echo  $_POST['number'];
}
?>
</h3> 


<h2>1.1</h2>
<h3>2</h3>
<p>Дана строка. Выведите в консоль длину этой строки.</p>
<form action="block-1.php" method="post">
Видите строку: <input type="text" name="text"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Длинна строки = 
<?php 
    echo mb_strlen($_POST['text']);
?>
</h3> 


<h2>1.1</h2>
<h3>3</h3>
<p>Дана строка. Выведите в консоль последний символ строки.</p>
<form action="block-1.php" method="post">
Видите строку: <input type="text" name="text-line"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Последний символ строки = 
<?php 

    $string = $_POST['text-line'];
    $lastChar = mb_substr($string, -1);
    echo $lastChar;
?>
</h3> 

// 

<h2>1.1</h2>
<h3>4</h3>
<p>Дано число. Проверьте, четное оно или нет.</p>
<form action="block-1.php" method="post">
Видите строку: <input type="number" name="number2"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> 
<?php 
    if ($_POST['number2'] % 2 == 0){
    echo 'число четное';
    } else {
        echo 'число не четное';
    }
?>
</h3>


 <!-- Даны два слова. Проверьте, что первые буквы этих слов совпадают. -->
 <h2>1.1</h2>
<h3>5</h3>
<p>Даны два слова. Проверьте, что первые буквы этих слов совпадают.</p>
<form action="block-1.php" method="post">
Видите строку 1: <input type="text" name="text51"><br>
Видите строку 2: <input type="text" name="text52"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> 
<?php 
    if ($_POST['text51'][0] == $_POST['text52'][0]){
    echo 'первые буквы слов совпадают ' .$_POST['text51'][0] . ' равно ' . $_POST['text52'][0] ;
    } else {
        echo 'не совпадают';
    }
?>
</h3>


<h2>1.1</h2>
<h3>6</h3>
<p>Дано слово. Получите его последнюю букву.
     Если слово заканчивается на мягкий знак, то получите предпоследнюю букву.</p>
<form action="block-1.php" method="post">
Видите лово: <input type="text" name="text-line2"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Последний символ строки = 
<?php 

    $text = $_POST['text-line2'];
    $length = mb_strlen($text);
    $lastChar = mb_substr($text, $length - 1);
    if($lastChar !== 'ь') {
        echo "<br>{$lastChar}";
    } else {
        echo "<br>{$text[$length-1]}";
    }

?>
</h3> 

<h2>1.2</h2>
<h3>1</h3>
<p>Дано число. Выведите в консоль первую цифру этого числа.</p>
<form action="block-1.php" method="post">
Видите число: <input type="number" name="num-line2"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Первая цифра = 
<?php 

    $num = $_POST['num-line2'];

    $firstDigit = (int) $num[0];
        echo "{$firstDigit}<br>";
    
?>
</h3> 


<h2>1.2</h2>
<h3>2</h3>
<p>Дано число. Выведите в консоль последнюю цифру этого числа.</p>
<form action="block-1.php" method="post">
Видите число: <input type="number" name="num-line3"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Первая цифра = 
<?php 

    $num = $_POST['num-line3'];

    $firstDigit = (int) $num[-1];
        echo "{$firstDigit}<br>";
    
?>
</h3> 

<h2>1.2</h2>
<h3>3</h3>
<p>Дано число. Выведите в консоль сумму первой и последней цифры этого числа.</p>
<form action="block-1.php" method="post">
Видите число: <input type="number" name="num-line4"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> сумма первой и последней цифры = 
<?php 

    $num = $_POST['num-line4'];
    $firstNum = $num[0];
    $lastNum = $num[-1];
    $res = $firstNum + $lastNum;
        echo "{$res}<br>";
    
?>
</h3> 

Дано число. Выведите количество цифр в этом числе.

<h2>1.2</h2>
<h3>4</h3>
<p>Дано число. Выведите количество цифр в этом числе.</p>
<form action="block-1.php" method="post">
Видите число: <input type="number" name="num-line5"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Колличество цыфр в числе = 
<?php 

    $num1 = $_POST['num-line5'];
    $quantity = strlen($num1);
        echo "{$quantity}<br>";
    
?>
</h3> 

<h2>1.2</h2>
<h3>5</h3>
<p>Даны два числа. Проверьте, что первые цифры этих чисел совпадают.</p>
<form action="block-1.php" method="post">
Видите число 1: <input type="number" name="num-line3"><br>

Видите число 2: <input type="number" name="num-line4"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Первая цифра = 
<?php 

    $num1 = $_POST['num-line3'];
    $num2 = $_POST['num-line4'];
    if ($num1[0] == $num2[0]){
        echo "{$num1[0]} первое чилсо введенных чифр<br>";
    }else{
        echo "{$num1[0]} =/ {$num2[0]} первые числа не равны<br>";
    }

    
?>
</h3> 


<h2>1.3</h2>
<h3>1</h3>
<p>Дана строка. Если в этой строке более одного символа, выведите в консоль предпоследний символ этой строки.</p>
<form action="block-1.php" method="post">
Видите строку: <input type="text" name="text1-3-1"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> последний символ строки
<?php 
    $str = $_POST['text1-3-1'];
    if (mb_strlen($_POST['text1-3-1']) > 1){
        echo mb_substr($str, -1);
    } else {
    echo '-----------------';
    }
?>
</h3> 

<h2>1.3</h2>
<h3>2</h3>
<p>Даны два целых числа. Проверьте, что первое число без остатка делится на второе.</p>
<form action="block-1.php" method="post">
Видите число 1: <input type="number" name="num-line5"><br>

Видите число 2: <input type="number" name="num-line6"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3> Первая цифра = 
<?php 

    $number1 = $_POST['num-line5'];
    $number2 = $_POST['num-line6'];
    $unsver = $number1 % $number2;
    if ($unsver == 0){
        echo  $number1 .  " делется без остатка <br>";
    } else {
        echo  $number1 .  " делется c остатком <br>"; 
    }
?>
</h3> 
