<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cuisines */

$this->title = 'Create Cuisines';
$this->params['breadcrumbs'][] = ['label' => 'Cuisines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuisines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
