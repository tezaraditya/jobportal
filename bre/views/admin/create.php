<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Create Admin';
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

  <div class="panel panel-primary">
<div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
