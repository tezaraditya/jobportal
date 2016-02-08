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
	<meta name="description" content="Situs Lowongan Kerja dan CV Online">
	<meta name="keyword" content="CV, Curriculum Vitae, Resume, Lamaran, Kerja, Work, Riwayat Hidup, Edit CV, CV Maker, CV Creator, CV Online, Pdf, job, karir, career, CV builder, Lowongan Kerja">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Yii::$app->homeUrl ?>favicon.ico">
    <?php $this->head() ?>

</head>
<body>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73413957-1', 'auto');
    ga('send', 'pageview');

  </script>

<?php $this->beginBody() ?>



    <?php
    NavBar::begin([
        'brandLabel' =>'',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    echo nav::widget([
          'options' => ['class' => 'navbar-nav navbar-left'],
          'items' => [
            ['label' => ''],
            ['label' => ''],
                ['label' => 'Job Vacancy','url'=>['/career/index']],
                ['label' => 'CV Editor','url'=>['/site/cv']],



          ],


      ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
           ['label' => 'Sign Up', 'url' => ['/users/signup'],'visible'=>Yii::$app->user->isGuest],

           Yii::$app->user->isGuest ?
                  ['label' => 'Login', 'url' => ['/site/login']] :
                  ['label' => Yii::$app->user->identity->fullname,
                       'items' => [

                           ['label' => 'Change Password', 'url' => ['/users/changepassword']],
                           ['label' => 'Logout','url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post']],
           ],
                  ],



               ],
           ]);
    NavBar::end();
    ?>

		<?= $content ?>

    <footer class="footer">
    <div class="container">
            <center>  <p>
            &copy; 2015 - <?php echo date('Y'); ?> <?= Yii::$app->params['siteName'] ?>
            </p>
            <p>
              <?= yii\helpers\Html::a('<span class="label label-success">About Us</span>',['site/about']) ?> .
                <?= yii\helpers\Html::a('<span class="label label-warning">Terms & Conditions</span>',['site/termsconditions']) ?> .
                <?= yii\helpers\Html::a('<span class="label label-primary">Contact Us</span>',['/site/contact']) ?>
            </p>
          </center>
    </div>
      </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
