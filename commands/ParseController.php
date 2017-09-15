<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14.09.17
 * Time: 19:00
 */

namespace app\commands;


use app\models\Category;
use app\models\Product;
use yii\web\Controller;

class ParseController extends \yii\console\Controller {

	public function actionFile(){
		$file_path = \Yii::getAlias('@app/products/data.csv');

		$rows = array_map(function($item){
			return str_getcsv(iconv('Windows-1251', 'utf-8', $item));
		}, file($file_path));
		$header = array_shift($rows);
		$csv = array();
		foreach ($rows as $row) {
			$csv[] = array_combine($header, $row);
		}

		Product::deleteAll();

		foreach ( $csv as $item ) {
			$category = Category::findOne(['name'=>$item['Категория']]);
			if(!$category){
				$category = new Category();
				$category->name = $item['Категория'];
				$category->save();
			}

			$sub_category = Category::findOne(['name'=>$item['Подкатегория']]);
			if(!$sub_category){
				$sub_category = new Category();
				$sub_category->name = $item['Подкатегория'];
				$sub_category->parent_id = $category->id;
				$sub_category->save();
			}

			$subsub_category = Category::findOne(['name'=>$item['Подкатегория 2']]);
			if(!$subsub_category){
				$subsub_category = new Category();
				$subsub_category->name = $item['Подкатегория 2'];
				$subsub_category->parent_id = $sub_category->id;
				$subsub_category->save();
			}

			$product = new Product();
			$product->category_id = $subsub_category->id;
			$product->name = $item['Название'];
			$product->min_price = $item['мин. Цена'];
			$product->count = $item['кол-во предложений'];
			$product->image = $item['картинка'];
			$product->save();
		}

		return 1;
	}

}