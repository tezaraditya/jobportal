<?php

use yii\helpers\Html;
use yii\grid\GridView;



$this->title = Yii::t('app', 'Job Vacancy');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-4 well">


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

</div>

<div class="col-md-8">



    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'showHeader' => false,
    'columns' => [

        array(
            'format' => 'raw',

            'value'=>function ($data) {
                return Html::a(

                '<div class="row" >'
                .'<div class="col-md-11"><span class="glyphicon glyphicon-calendar"></span> '.date('j F Y',strtotime($data->created_date)).'<h1>'.$data->position.'</h1>'
                .'<h4>'.$data->company.'</h4>'

                .' <span class="glyphicon glyphicon-map-marker"></span> '.$data->location
                .' <span class="glyphicon glyphicon-option-vertical"></span> Experience : '.$data->experience
                .' <span class="glyphicon glyphicon-option-vertical"></span> Salary : '.'IDR '.$data->salary_min. ' - '.$data->salary_max
                .'</div></div>',

                        ['career/detail','id'=>$data->id_career]);
            },

        ),






    ],
]); ?>



</div>
