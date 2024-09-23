<?php
// https://code.mu/ru/php/tasker/stager/   
?>
<a href="https://code.mu/ru/php/tasker/stager/">https://code.mu/ru/php/tasker/stager/   </a>

<h2>1.4</h2>
<h3>1</h3>
<p>Выведите в консоль все целые числа от 1 до 100.</p>
<form action="block-2.php" method="post">
Видите чило: <input type="number" name="number"><br>
<input type="submit" name="submit" value="Ответ">
</form>
<h3>Это число <br>
<?php 
$number = $_POST['number'];
for ($i=1; $i <=$number ; $i++) { 
    echo $i;
    echo '<br>';
}
?>
</h3>



<h2>1.4</h2>
<h3>2</h3>
<p>Выведите в консоль все целые числа от -100 до 0.</p>
<h3>Это число <br>
<?php 

for ($i=-100; $i <=0 ; $i++) { 
    echo $i;
    echo '<br>';
}
?>
</h3>