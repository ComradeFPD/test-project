<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_name',


        ],
    ]); ?>
</div>
