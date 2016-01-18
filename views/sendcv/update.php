<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sendcv */

$this->title = 'Update Sendcv: ' . ' ' . $model->id_sendcv;
$this->params['breadcrumbs'][] = ['label' => 'Sendcvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sendcv, 'url' => ['view', 'id' => $model->id_sendcv]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sendcv-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
