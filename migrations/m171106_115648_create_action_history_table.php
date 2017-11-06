<?php

use yii\db\Migration;

/**
 * Handles the creation of table `action_history`.
 * Has foreign keys to the tables:
 *
 * - `task`
 */
class m171106_115648_create_action_history_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('action_history', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'date' => $this->date(),
        ]);

        // creates index for column `task_id`
        $this->createIndex(
            'idx-action_history-task_id',
            'action_history',
            'task_id'
        );

        // add foreign key for table `task`
        $this->addForeignKey(
            'fk-action_history-task_id',
            'action_history',
            'task_id',
            'task',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `task`
        $this->dropForeignKey(
            'fk-action_history-task_id',
            'action_history'
        );

        // drops index for column `task_id`
        $this->dropIndex(
            'idx-action_history-task_id',
            'action_history'
        );

        $this->dropTable('action_history');
    }
}
