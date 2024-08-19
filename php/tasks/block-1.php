<?php
// https://code.mu/ru/php/tasker/stager/   
?>
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

