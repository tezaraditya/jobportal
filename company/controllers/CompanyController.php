<?php

namespace app\controllers;

use Yii;
use app\models\Company;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],


            'access' => [
                'class' => AccessControl::className(),
                'only' => ['update','changepassword'],
                'rules' => [
                    [
                        'actions' => ['update','changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }



    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSignup()
    {
      if (!\Yii::$app->user->isGuest) {
          return $this->goHome();
      }

        $model = new Company();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          Yii::$app->session->setFlash('signupsuccess');

            return $this->refresh();


        } else {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $id_login = Yii::$app->user->identity->id ;
        $model = $this->findModel($id_login);
        $model->password = pack("H*",$model->password);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->homeUrl);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    //Change Password Company
    public function actionChangepassword() {

      $id_login = Yii::$app->user->identity->id;

      $model = $this->findModel($id_login);

      if($model->load(Yii::$app->request->post()) && $model->save()) {

        Yii::$app->session->setFlash('changepass_success');

        return $this->refresh();

      } else {
            return $this->render('changepassword',[
                'model'=> $model,

              ]);

      }




    }


    //Forgot Password Action
    public function actionForgotpassword() {

      $model = new Company;




      if($model->load(Yii::$app->request->post())) {


        $queryRetrieve = Company::find()->where(['email'=>$model->email])->one();

        Yii::$app->mailer->compose()
          ->setFrom('resumeditorcom@gmail.com')
          ->setTo($model->email)
          ->setSubject('Forgot Password Company')
          ->setHtmlBody(
          "<p>Hi <b>".$queryRetrieve->company.",</b></p>

          <p>This is your Email and Password :</p>

          <h4>Your Email : ". $queryRetrieve->email ."</h4>
          <h4>Your Password : ". pack("H*",($queryRetrieve->password)) ."</h4>

          <p><b><i><h3>Note : Please Login Again and change your Password after login.</h3></b></i></p>
          <hr/>
          <p>Thank You for using <b>Resumeditor.com</b></p>

          <p>Have a Nice Day :)</p>
          "

          )
          ->send();

          Yii::$app->session->setFlash('forgotpassword_success');

        return $this->refresh();


      }
      return $this->render('forgotpassword',[

        'model' => $model,


        ]);


    }



    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
