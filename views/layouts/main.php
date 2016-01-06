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
	<meta name="description" content="Create and Edit Your CV Online">
	<meta name="keyword" content="CV, Curriculum Vitae, Resume, Lamaran, Kerja, Work, Riwayat Hidup, Edit CV, CV Maker, CV Creator, CV Online, Pdf, job, karir, career, CV builder, Lowongan Kerja">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
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
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->email . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

		<?= $content ?>

    <footer class="footer">
    <div class="container">
              <p class="pull-left">
            &copy; 2015 - <?php echo date('Y'); ?> <?= Yii::$app->params['siteName'] ?>
            </p>
            <p class="pull-right">
              <?= yii\helpers\Html::a('About Us',['site/about']) ?> .
              <?= yii\helpers\Html::a('Contact Us',['site/contact']) ?> .
                <?= yii\helpers\Html::a('Term of Use',['site/tos']) ?>
            </p>
    </div>
      </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
