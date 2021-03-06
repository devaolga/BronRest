<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cuisines */

$this->title = $model->cuisine_id;
$this->params['breadcrumbs'][] = ['label' => 'Cuisines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuisines-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->cuisine_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->cuisine_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cuisine_id',
            'cuisine',
        ],
    ]) ?>

</div>
