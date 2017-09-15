<?php

namespace app\models;

use Yii;
use yii\helpers\Json;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int $model_id
 * @property int $count
 * @property int $min_price
 * @property string $image
 */
class Product extends \yii\db\ActiveRecord
{

	public $info;

	public $api = 'http://widget.admitad.com/market/search?place=18809&limit=5&offers=30&q=';

	public function getInfo() {
		$link = str_replace(' ','+',$this->api.$this->name);
		$json = file_get_contents($link);

		$result = Json::decode($json)['result'];

		$info = array_shift($result);

		usort($info['offers'], function($a, $b) {
			return $b['price'] - $a['price'];
		});

		$info['best'] = $info['offers'][0];

		$info['prices'] = [
			$info['best']['price'],
			end($info['offers'])['price']
		];

		$info['related'] = $result;

		$this->info = $info;
	}

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'model_id', 'count', 'min_price'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    public function getCategory(){
    	return $this->hasOne(Category::className(), [
    		'id'=>'category_id'
	    ]);
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'model_id' => 'Model ID',
            'count' => 'Count',
            'min_price' => 'Min Price',
            'image' => 'Image',
        ];
    }
}