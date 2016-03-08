<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

  <div class="panel panel-primary">
<div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_admin',
            'username',
            //'password',
            'authKey',
            //'accessToken',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
