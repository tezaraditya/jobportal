<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\ActiveDataProvider;
use app\models\Feedback;
use app\models\Users;

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

    //Curriculum Vitae Module
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

//Save File to PDF Format
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

    //Login Function
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

    //Logout Function
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    // Index or Welcome Page
    public function actionIndex()
    {

        $this->layout='front';
		
		$LatestJobs = new ActiveDataProvider([
            'query' => \app\models\Career::find()->orderBy(['created_date'=>SORT_DESC]),
				'pagination'=>[
						'pageSize' => 10,
				],
        ]);
		
		$JobFunction = new ActiveDataProvider([
				'query' => \app\models\JobFunction::find()->orderBy('id_job_function'),
				'pagination' => [
						'pageSize'=>10,
				],
		]);
		
		$Location = new ActiveDataProvider([
				'query' => \app\models\Location::find()->orderBy('id_location'),
				'pagination' => [
						'pageSize'=>10,
				],
		]);
		
        return $this->render('index',[
			'LatestJobs'=>$LatestJobs,
			'JobFunction'=>$JobFunction,
			'Location'=>$Location,
		
		]);
    }

    //About Page
    public function actionAbout()
    {


        return $this->render('about');
    }

    //Send Feedback Page
    public function actionContact()
    {
        $model = new Feedback();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('feedbacksuccess');


            return $this->refresh();
        }

        return $this->render('feedback',[

          'model'=> $model

        ]);
    }

    //Terms And Conditions Page
    public function actionTermsconditions() {

        return $this->render('termsconditions');


    }

    

}
