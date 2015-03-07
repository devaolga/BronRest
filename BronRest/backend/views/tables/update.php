<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tables */

$this->title = 'Update Tables: ' . ' ' . $model->table_id;
$this->params['breadcrumbs'][] = ['label' => 'Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->table_id, 'url' => ['view', 'id' => $model->table_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tables-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
