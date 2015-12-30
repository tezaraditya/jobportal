<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Education');

?>





<div class="panel panel-primary ">
  <div class="panel-heading">
    <?= Html::encode($this->title) ?>
  </div>
  <div class="panel-body">


  <?php if (Yii::$app->session->hasFlash('saveedu')): ?>
   <div class="alert alert-success">
        <h1><span class="glyphicon glyphicon-ok"></span> Education Has Been Saved</h1>
    </div>
<?php endif; ?>

<div class="education-index">

<?php

Modal::begin([
  'closeButton' =>['label' => 'X', 'class' => 'btn btn-default col-md-offset-11','data-dismiss'=>'modal'],
    'toggleButton' => ['label' => 'Add Education','class' => 'btn btn-danger btn-lg'],
]);
?>

<?php
echo $this->render('_form', [
    'model' => $model,
]);
?>



<?php
Modal::end();

 ?>

    <p>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [



            'degree',
            'institution',
            'majors',
            'start_date',
            'end_date',
            'gpa',

            ['class' => 'yii\grid\ActionColumn',
				'header' => '<center>Update</center>',
				'template'=>'{update}',
					'buttons' => [
							'update' => function($url, $model) {
								return Html::a('<center><span class="glyphicon glyphicon-edit"></span></center>',$url, [
										'title' => Yii::t('yii','update'),

								]);


							}


					],

			],


			    ['class' => 'yii\grid\ActionColumn',
				'header' => '<center>Delete</center>',
				'template'=>'{delete}',
					'buttons' => [
							'delete' => function($url, $model) {
								return Html::a('<center><span class="glyphicon glyphicon-remove"></span></center>',$url, [
										'title' => Yii::t('yii','delete'),
										'data-confirm' => Yii::t('yii','Are You Sure Delete this Data ?'),
										'data-method' => 'post',

								]);


							}


					],

			],

        ],
    ]); ?>

</div>
</div>
</div>
