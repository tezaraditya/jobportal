<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobFunctionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Functions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-function-index">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_job_function',
            'function',

            ['class' => 'yii\grid\ActionColumn',
        'header' => '',
        'template'=>'<center>{update} {delete}</center>',
          'buttons' => [
              'update' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-edit"></span> Edit',$url, [
                    'title' => Yii::t('yii','update'),'class'=>'btn btn-primary btn-sm'

                ]);
              },

              'delete' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span> Delete',$url, [
                    'title' => Yii::t('yii','delete'),'class'=>'btn btn-danger btn-sm',
                    'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
                    'data-method' => 'post',

                ]);
              }




          ],

      ],
        ],
    ]); ?>

</div>
