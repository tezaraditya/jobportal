<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sendcv */

$this->title = 'Create Sendcv';
$this->params['breadcrumbs'][] = ['label' => 'Sendcvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sendcv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
