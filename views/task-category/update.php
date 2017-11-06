<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaskCategory */

$this->title = 'Update Task Category: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
