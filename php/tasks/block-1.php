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

