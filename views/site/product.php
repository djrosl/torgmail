<?php

/* @var $this yii\web\View */

$this->title = 'Torg Mail';


//var_dump($product->info);
?>


<div class="container breadcrumbs">
	<?php foreach(array_reverse($crumbs) as $crumb){
		echo \yii\helpers\Html::a($crumb->name, \yii\helpers\Url::to(['site/category', 'id'=> $crumb->id]));
	} ?><span><?=$product->name?></span>
</div>


<div class="container product-page clearfix">
    <main>
        <div class="top">
            <div class="img-wrp">
                <img src="<?=$product->info['photo']['url']?>" width="200">
            </div>
            <div class="info">
                <div class="heading"><?=$product->name?></div>
                <div class="price">От <?=implode(' до ', $product['info']['prices'])?> <?=$product['info']['best']['currencyName']?></div>
                <div class="description"> <strong>Описание: </strong> <?=$product->info['description']?> </div>
            </div>
            <div class="best">
                <div class="best-heading">ВЫГОДНОЕ ПРЕДЛОЖЕНИЕ</div>
                <div class="website"><?=$product['info']['best']['shop']['name']?></div>
                <div class="price"><?=$product['info']['best']['price']?> <?=$product['info']['best']['currencyName']?></div><a href="<?=$product['info']['best']['url']?>" class="btn" target="_blank">В магазтин</a>
            </div>
        </div>
        <div class="tr"></div>
        <div class="tabs"><a href="" class="active">Цены</a><a href="">Отзывы</a></div>
        <div class="tab-content">
            <div class="prices">
                <?php foreach($product['info']['offers'] as $offer): ?>
                <div class="item">
                    <div class="link"><?=$offer['shop']['name']?>      </div>
                    <div class="price"><?=$offer['price']?> <?=$offer['currencyName']?></div><a href="<?=$offer['url']?>" class="btn" target="_blank">В магазин</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <aside>
        <?php if($product->info['related']){ ?>


        <div class="heading">ПОХОЖИЕ ТОВАРЫ</div>
        <ul class="category-list">
            <?php foreach($product->info['related'] as $related){ ?>

            <li><a href=""><img src="<?=$related['photo']['url']?>" alt="" width="120">
                    <div class="heading"><?=$related['name']?></div>
                    <div class="price"><?=$related['offers'][0]['price']?> <?=$related['offers'][0]['currencyName']?></div></a></li>

            <?php } ?>
        </ul>

        <?php } ?>
    </aside>
</div>