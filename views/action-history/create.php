<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ActionHistory */

$this->title = 'Create Action History';
$this->params['breadcrumbs'][] = ['label' => 'Action Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="action-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
