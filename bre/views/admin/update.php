<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Update Admin: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_admin, 'url' => ['view', 'id' => $model->id_admin]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-update">

  <div class="panel panel-primary">
  <div class="panel-heading"><h2><center><?= Html::encode($this->title) ?></center></h2></div>
  </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
