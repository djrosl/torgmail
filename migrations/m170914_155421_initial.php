<?php

use yii\db\Migration;

/**
 * Class m170914_155421_initial
 */
class m170914_155421_initial extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
	    $this->createTable('category', [
	    	'id'=>$this->primaryKey(),
	    	'parent_id'=>$this->integer()->defaultValue(0),
		    'name'=>$this->string()
	    ]);

	    $this->createTable('product', [
	    	'id'=>$this->primaryKey(),
	    	'name'=>$this->string(),
		    'category_id'=>$this->integer(),
		    'model_id'=>$this->integer()->defaultValue(0),
		    'count'=>$this->integer(),
		    'min_price'=>$this->integer(),
		    'image'=>$this->string()
	    ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
			$this->dropTable('category');
	    $this->dropTable('product');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170914_155421_initial cannot be reverted.\n";

        return false;
    }
    */
}
