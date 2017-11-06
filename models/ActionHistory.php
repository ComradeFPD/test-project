<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action_history".
 *
 * @property integer $id
 * @property integer $task_id
 * @property string $description
 * @property string $date
 *
 * @property Task $task
 */
class ActionHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id'], 'required'],
            [['task_id'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор действия',
            'task_id' => 'Название задачи',
            'description' => 'Описание задачи',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    public function write_history($task_id,$description)
    {
        try {
            $transaction = Yii::$app->db->beginTransaction();
            $this->task_id=$task_id;
            $this->description=$description;
            $this->date=date('Y/m/d/h:i');
            $this->save();
            $transaction->commit();

        } catch (Exception $e)
        {
            $transaction->rollback();
        }
    }
}
