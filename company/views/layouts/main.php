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
    <title><?= Html::encode($this->title) ?> - Resumeditor.com</title>
    <link rel="shortcut icon" href="<?= Yii::$app->homeUrl ?>favicon.ico">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' =>'',
        'brandUrl' => Yii::$app->params['siteUrl'],
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
          ['label' => 'Home','url' => ['site/index'],'visible'=>!Yii::$app->user->isGuest],
          ['label' => 'Pasang Lowongan Kerja','url' => ['career/create'],'visible'=>!Yii::$app->user->isGuest],
          ['label' => 'Signup','url' => ['company/signup'],'visible'=>Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                ['label' => Yii::$app->user->identity->company,
                     'items' => [
                         ['label' => 'View Profile', 'url' => ['/company/view', 'id'=>Yii::$app->user->identity->id]],
                         ['label' => 'Edit Profile', 'url' => ['/company/update']],
                         ['label' => 'Job Openings', 'url' => ['/career/index']],
                         ['label' => 'Change Password', 'url' => ['/company/changepassword']],
                         ['label' => 'Logout','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
         ],
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">

        <?= $content ?>
    </div>
</div>

<footer class="footer">
<div class="container">
        <center>  <p>
        &copy; 2015 - <?php echo date('Y'); ?> Resumeditor.com
        </p>
        <p>
          <?= yii\helpers\Html::a('<span class="label label-success">About Us</span>',Yii::$app->params['siteUrl'].'aboutus') ?> .
            <?= yii\helpers\Html::a('<span class="label label-warning">Terms & Conditions</span>',Yii::$app->params['siteUrl'].'termsconditions') ?> .
            <?= yii\helpers\Html::a('<span class="label label-primary">Contact Us</span>',Yii::$app->params['siteUrl'].'contactus') ?>
        </p>
      </center>
</div>
  </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
