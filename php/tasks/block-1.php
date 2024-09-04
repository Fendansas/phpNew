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