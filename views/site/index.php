<?php

/* @var $this yii\web\View */

$this->title = 'Torg Mail';
?>
<main>
    <ul class="container categories-main">

        <?php foreach ($categories as $key => $category): ?>
            <li> <img src="html/images/c<?=$key+1?>.jpg"><a href="<?=\yii\helpers\Url::to(['site/category', 'id'=>$category->id])?>" class="heading"><?=$category->name?></a></li>
        <?php endforeach; ?>

<!--        <li> <img src="/images/c1.jpg"><a href="" class="heading">Продукты</a></li>-->
<!--        <li> <img src="/images/c2.jpg"><a href="" class="heading">Услуги</a></li>-->
<!--        <li> <img src="/images/c3.jpg"><a href="" class="heading">Бытовая техника</a></li>-->
<!--        <li> <img src="/images/c4.jpg"><a href="" class="heading">Детские товары</a></li>-->
<!--        <li> <img src="/images/c5.jpg"><a href="" class="heading">Подарки</a></li>-->
<!--        <li> <img src="/images/c6.jpg"><a href="" class="heading">оборудование</a></li>-->
<!--        <li> <img src="/images/c7.jpg"><a href="" class="heading">досуг</a></li>-->
<!--        <li> <img src="/images/c8.jpg"><a href="" class="heading">красота и здоровье</a></li>-->
<!--        <li> <img src="/images/c9.jpg"><a href="" class="heading">спорт</a></li>-->
<!--        <li> <img src="/images/c10.jpg"><a href="" class="heading">авто</a></li>-->
<!--        <li> <img src="/images/c11.jpg"><a href="" class="heading">электроника</a></li>-->
<!--        <li> <img src="/images/c12.jpg"><a href="" class="heading">дом</a></li>-->
<!--        <li> <img src="/images/c13.jpg"><a href="" class="heading">офис</a></li>-->
<!--        <li> <img src="/images/c14.jpg"><a href="" class="heading">комп. техника</a></li>-->
<!--        <li> <img src="/images/c15.jpg"><a href="" class="heading">одежда, обувь</a></li>-->
<!--        <li> <img src="/images/c16.jpg"><a href="" class="heading">товары для животных</a></li>-->
    </ul>
</main>