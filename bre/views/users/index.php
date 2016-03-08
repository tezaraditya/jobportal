<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_user',
            'fullname',
            'birthplace',
            'birthdate',
            //'religion',
            // 'gender',
            // 'marital_status',
            // 'nationaly',
            // 'height',
            // 'weight',
            // 'identity_address:ntext',
            // 'postal_code',
            // 'domicile_address:ntext',
            // 'domicile_postal_code',
            'phone',
            'email:email',
            // 'password',
            // 'authKey',
            // 'accessToken',
            // 'join_date',
            // 'active',

            ['class' => 'yii\grid\ActionColumn',
        'header' => '',
        'template'=>'{delete}',
          'buttons' => [
              'delete' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span> Delete',$url, [
                    'title' => Yii::t('yii','delete'),'class'=>'btn btn-danger btn-sm btn-block',
                    'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
                    'data-method' => 'post',

                ]);
              }




          ],

      ],
        ],
    ]); ?>

</div>
