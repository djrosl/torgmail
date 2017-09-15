<?php

/* @var $this yii\web\View */

$this->title = 'Torg Mail';
?>
<div class="container breadcrumbs">
    <?php foreach(array_reverse($crumbs) as $crumb){
        echo \yii\helpers\Html::a($crumb->name, \yii\helpers\Url::to(['site/category', 'id'=> $crumb->id]));
    } ?><span><?=$count?$count.' результатов':''?></span>
</div>

<main>


    <ul class="container categories-main">
      <?php foreach ($category->children as $key => $category): ?>
          <li> <img src="/html/images/c<?=$key+1?>.jpg"><a href="<?=\yii\helpers\Url::to(['site/category', 'id'=>$category->id])?>" class="heading"><?=$category->name?></a></li>
      <?php endforeach; ?>
    </ul>

    <ul class="category-list container">
	    <?php foreach ($products as $key => $product): ?>
        <li><img src="/html/images/product.jpg" alt="">
            <div class="heading"><?=$product->name?></div>
            <div class="price">От <?=$product->min_price?> руб.</div><a href="<?=\yii\helpers\Url::to(['site/product', 'id'=>$product->id])?>" class="btn">ПОСМОТРЕТЬ</a>
        </li>
	    <?php endforeach; ?>
    </ul>

    <div class="container">
        <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </div>
</main>