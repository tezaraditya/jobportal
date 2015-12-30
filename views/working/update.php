<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Working */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Working',
]);

?>

<div class="panel panel-primary ">
  <div class="panel-heading">
<?= Html::encode($this->title) ?>
  </div>
  <div class="panel-body">

<div class="working-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</div>
</div>
