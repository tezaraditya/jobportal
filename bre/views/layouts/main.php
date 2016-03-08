<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->params['siteName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [

            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">

        <div class="col-md-3">

          <div class="panel panel-default">
<div class="panel-heading">
  <h2 class="panel-title"><span class="glyphicon glyphicon-briefcase"></span> Job Vacancy</h3>
</div>
<div class="panel-body">
  <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Job Vacancy',['career/create'],['class'=>'list-group-item list-group-item-primary']) ?>
  <?= Html::a('<span class="glyphicon glyphicon-th-list"></span> List Job Vacancy',['career/index'],['class'=>'list-group-item list-group-item-primary']) ?>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"><span class="glyphicon glyphicon-user"></span> User</h3>
</div>
<div class="panel-body">
<?= Html::a('<span class="glyphicon glyphicon-th-list"></span> List User',['users/index'],['class'=>'list-group-item list-group-item-primary']) ?>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"><span class="glyphicon glyphicon-tasks"></span> Job Function</h3>
</div>
<div class="panel-body">
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Job Function',['job-function/create'],['class'=>'list-group-item list-group-item-primary']) ?>
<?= Html::a('<span class="glyphicon glyphicon-list"></span> List Job Function',['job-function/index'],['class'=>'list-group-item list-group-item-primary']) ?>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"><span class="glyphicon glyphicon-transfer"></span> Feedback</h3>
</div>
<div class="panel-body">
<?= Html::a('<span class="glyphicon glyphicon-envelope"></span> Inbox',['feedback/index'],['class'=>'list-group-item list-group-item-primary']) ?>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"><span class="glyphicon glyphicon-cog"></span> Administrator</h3>
</div>
<div class="panel-body">
<?= Html::a('<span class="glyphicon glyphicon-plus"></span> Add Administrator',['admin/create'],['class'=>'list-group-item list-group-item-primary']) ?>
<?= Html::a('<span class="glyphicon glyphicon-th-list"></span> List Administrator',['admin/index'],['class'=>'list-group-item list-group-item-primary']) ?>
</div>
</div>



        </div>


        <div class="col-md-9 well">

          <?= $content ?>

        </div>

    </div>
</div>

<footer class="footer">
    <div class="container">

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
