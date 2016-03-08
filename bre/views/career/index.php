<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CareerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Vacancy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="career-index">

  <div class="panel panel-primary">
  <div class="panel-heading"><h1><center><?= Html::encode($this->title) ?></center></h1></div>
  </div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'showHeader' => false,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],


            array(
                'format' => 'raw',

                'value'=>function ($data) {
                    return Html::a(

                    '<div class="row">'
                    .'<div class="col-md-11"><span class="glyphicon glyphicon-calendar"></span> '
                    .date('j F Y',strtotime($data->created_date))
                    .'<h4>'.$data->position.'</h4>'
                    .$data->company

                    .' <span class="glyphicon glyphicon-map-marker"></span> '.$data->location
                    .' <span class="glyphicon glyphicon-option-vertical"></span> Experience : '.$data->experience
                    .' <span class="glyphicon glyphicon-option-vertical"></span> Salary : '.'IDR '.$data->salary_min. ' - '.$data->salary_max
                    .'</div></div>',

                            Yii::$app->params['siteUrl'].'career/'.$data->id_career,['target'=>'_blank']);
                },

            ),

            //'id_career',
            //'position',
            //'company',
            //'email:email',
            //'location',
            //'salary_min',
            //'salary_max',
            // 'function',
            // 'experience',
            // 'education',
            // 'requirements:ntext',
            // 'responsibilities:ntext',
            //'created_date',

            ['class' => 'yii\grid\ActionColumn',
        'header' => '',
        'template'=>'{update} {delete}',
          'buttons' => [
              'update' => function($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-edit"></span> Edit',$url, [
                    'title' => Yii::t('yii','update'),'class'=>'btn btn-primary btn-block'

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
