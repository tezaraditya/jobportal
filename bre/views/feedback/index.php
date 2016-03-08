<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_feedback',
            'subject',
            'feedback:ntext',
            'name',
            'email:email',
            // 'phone',

            ['class' => 'yii\grid\ActionColumn',
        'header' => '',
        'template'=>'{view} {delete}',
          'buttons' => [
              'view' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span> View',$url, [
                    'title' => Yii::t('yii','view'),'class'=>'btn btn-primary btn-block'

                ]);
              },

              'delete' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span> Delete',$url, [
                    'title' => Yii::t('yii','delete'),'class'=>'btn btn-danger btn-block',
                    'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
                    'data-method' => 'post',

                ]);
              }




          ],

      ],
        ],
    ]); ?>

</div>
