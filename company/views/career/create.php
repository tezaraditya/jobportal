<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Career */

$this->title = 'Create Job Vacancy';
$this->params['breadcrumbs'][] = ['label' => 'Careers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="career-create">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
