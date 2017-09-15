<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<!--[if lt IE 11]>
<p class='browsehappy'>You are using an <strong>outdated</strong> browser. Please <a href='http://browsehappy.com/'>upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<header>
    <div class="container">
        <a href="/" class="logo">torg mail</a>
        <form>
            <input type="search" placeholder="Поиск">
            <button>Найти</button>
        </form>
        <div class="location">Москва</div>
    </div>
</header>
<nav>
    <ul class="container">
	    <?php foreach ($this->params['categories'] as $key => $category): ?>
        <li> <a href="<?=\yii\helpers\Url::to(['site/category', 'id'=>$category->id])?>"><?=$category->name?></a>
            <ul class="sub">
			    <?php foreach ($category->children as $skey => $sub): ?>
                    <li> <a href="<?=\yii\helpers\Url::to(['site/category', 'id'=>$sub->id])?>"><?=$sub->name?></a></li>
                <?php endforeach; ?>
                <li class="show-all"><a href="<?=\yii\helpers\Url::to(['site/category', 'id'=>$category->id])?>">Смотреть всё     </a></li>
            </ul>
        </li>
	    <?php endforeach; ?>

    </ul>
</nav>
<?=$content?>
<footer>
    <nav>
        <ul class="container">
	        <?php foreach ($this->params['categories'] as $key => $category): ?>
              <li> <a href="<?=\yii\helpers\Url::to(['site/category', 'id'=>$category->id])?>"><?=$category->name?></a></li>
	        <?php endforeach; ?>
        </ul>
    </nav>
    <div class="copy">

        &copy; Copyright
        &nbsp; &nbsp;
        Источник данных - Яндекс Маркет
    </div>
</footer>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
