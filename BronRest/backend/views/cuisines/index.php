<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CuisinesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cuisines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuisines-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cuisines', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cuisine_id',
            'cuisine',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
