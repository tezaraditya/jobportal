<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Certification */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Certification',
]);

?>

<div class="panel panel-primary ">
  <div class="panel-heading">
<?= Html::encode($this->title) ?>
  </div>
  <div class="panel-body">
<div class="certification-update">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>
