<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sendcv */

$this->title = $model->id_sendcv;
$this->params['breadcrumbs'][] = ['label' => 'Sendcvs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sendcv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_sendcv], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_sendcv], [
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
            'id_sendcv',
            'id_career',
            'receiver_name',
            'receiver_email:email',
            'subject',
            'content:ntext',
            'id_user',
        ],
    ]) ?>

</div>
