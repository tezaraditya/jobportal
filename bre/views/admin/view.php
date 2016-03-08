<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

  <div class="panel panel-primary">
  <div class="panel-heading"><h2><center><?= Html::encode($this->title) ?></center></h2></div>
  </div>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_admin',
            'username',
            //'password',
            'authKey',
            //'accessToken',
        ],
    ]) ?>

</div>
