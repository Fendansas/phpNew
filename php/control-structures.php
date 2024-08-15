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





