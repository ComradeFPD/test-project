<?php

use yii\db\Migration;

/**
 * Handles the creation of table `task`.
 * Has foreign keys to the tables:
 *
 * - `task_category`
 */
class m171106_115630_create_task_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-task-category_id',
            'task',
            'category_id'
        );

        // add foreign key for table `task_category`
        $this->addForeignKey(
            'fk-task-category_id',
            'task',
            'category_id',
            'task_category',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `task_category`
        $this->dropForeignKey(
            'fk-task-category_id',
            'task'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-task-category_id',
            'task'
        );

        $this->dropTable('task');
    }
}
