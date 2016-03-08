<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = 'Feedback from : '. $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_feedback',
            'name',
            'subject',
            'feedback:ntext',
            'email:email',
            'phone',
        ],
    ]) ?>

</div>
