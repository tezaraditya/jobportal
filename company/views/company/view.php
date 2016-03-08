<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Company */

$this->title = $model->company;

?>
<div class="company-view">
  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'company',
            'about:ntext',
            'address',
            'city',
            'province',
            'postal_code',
            'email:email',
            'phone',

        ],
    ]) ?>

</div>
