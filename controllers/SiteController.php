<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\ActiveDataProvider;

use mPDF;




class SiteController extends Controller
{

  //public $layout = '';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['cv','logout','savecv'],
                'rules' => [
                    [
                        'actions' => ['cv','logout','savecv'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionCv()
    {
		 $personalData = new ActiveDataProvider([
            'query' => \app\models\Users::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		 $education = new ActiveDataProvider([
            'query' => \app\models\Education::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		$certification = new ActiveDataProvider([
            'query' => \app\models\Certification::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		$organizational = new ActiveDataProvider([
            'query' => \app\models\Organizational::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		$working = new ActiveDataProvider([
            'query' => \app\models\Working::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);



        return $this->render('cv',[
			'personalData' => $personalData,
			'education' => $education,
			'certification' => $certification,
			'organizational' => $organizational,
			'working' => $working,


		]);
    }


public function actionSavecv() {

	$personalData = new ActiveDataProvider([
            'query' => \app\models\Users::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		 $education = new ActiveDataProvider([
            'query' => \app\models\Education::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		$certification = new ActiveDataProvider([
            'query' => \app\models\Certification::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		$organizational = new ActiveDataProvider([
            'query' => \app\models\Organizational::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

		$working = new ActiveDataProvider([
            'query' => \app\models\Working::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);

        $mpdf = new mPDF;
        $mpdf->WriteHTML($this->renderPartial('pdf',[
		'personalData' => $personalData,
			'education' => $education,
			'certification' => $certification,
			'organizational' => $organizational,
			'working' => $working,


		]));
        $mpdf->Output('Curriculum Vitae '.Yii::$app->user->identity->fullname.'.pdf', 'D');
		$mpdf->Output();
        exit;
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionIndex()
    {

        $this->layout='front';
        return $this->render('index');
    }


    public function actionAbout()
    {


        return $this->render('about');
    }


    public function actionContact() {

        return $this->render('contact');


    }
}
