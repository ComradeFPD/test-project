<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task_category`.
 */
class m171106_114857_create_task_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('task_category', [
            'id' => $this->primaryKey(),
            'category_name' => $this->string(30)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('task_category');
    }
}
