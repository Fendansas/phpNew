<!-- Теги PHP  -->
<p>
    <?php echo 'Hi world'?>
</p>

<a href="">
    <?= 'Hi world' ?>
</a>

<p>
    <? echo 'этот код с короткими тегами, но он будет работать только если '.
                'включена опция "short_open_tag"'; ?>
</p>

<!-- Изолирование от HTML  -->
<a href="">
    <?= 'Hi world' ?>
</a>

<?php $expression = true; ?>

<?php if ($expression == true): ?>
  Это будет отображено, если выражение истинно.
<?php else: ?>
  В ином случае будет отображено это.
<?php endif; ?>

<!-- Коментарии  -->
<?php
 /** 
 ccxvcxzv
 zxczxczxc
 zxczxczxczczc
 zxcz
 */