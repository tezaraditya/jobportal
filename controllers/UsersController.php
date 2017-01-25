<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\imagine\Image;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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


			//access_control

			'access' => [
					'class' => AccessControl::className(),
					'only' => ['index','upload','changepassword'],
					'rules' => [
							[
								'allow' => true,
								'actions' => ['index','upload','changepassword'],
								'roles' => ['@'],

							],

					],
			],
        ];
    }

  //Index
   public function actionIndex()
    {

		$idlogin = Yii::$app->user->identity->id;

        $model = $this->findModel($idlogin);
		$model->password = pack("H*",$model->password);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('savedata');

            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }




   //Sign Up
    public function actionSignup()
    {
		  if (Yii::$app->user->isGuest) {


		     $model = new Users();

		        if ($model->load(Yii::$app->request->post()) && $model->save()) {

					Yii::$app->session->setFlash('signupsuccess');


            return $this->refresh();
        } else {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }



	  } else {

		  return $this->redirect(['/']);

	  }
    }

    //Change Password User
    public function actionChangepassword() {

      $idlogin = Yii::$app->user->identity->id;

      $model = $this->findModel($idlogin);

      if($model->load(Yii::$app->request->post()) && $model->save()) {

        Yii::$app->session->setFlash('changepass_success');

        return $this->refresh();

      } else {
            return $this->render('changepassword',[
                'model'=> $model,

              ]);

      }




    }


    //Profile Pictures Upload
    public function actionUpload()
  {
      $fileName = 'file';
      $uploadPath = 'public/document/photos';

      if (isset($_FILES[$fileName])) {
          $file = \yii\web\UploadedFile::getInstanceByName($fileName);

          if ($file->saveAs($uploadPath. '/' . Yii::$app->user->identity->id . '.png')) {
              //Now save file data to database

              //Create Thumbnail Image and Resize
			 //Image::thumbnail($uploadPath.'/'.Yii::$app->user->identity->id.'.png',160,175)
				//->save(Yii::getAlias($uploadPath.'/'.Yii::$app->user->identity->id.'.png'));




          }

      }


  }


  	//delete profile picture Function

	public function actionDeletepp() {

	$idlogin = Yii::$app->user->identity->id;

	unlink('public/document/photos/'.$idlogin.'.png');



	}



  //Forgot Password Action
  public function actionForgotpassword() {

    $model = new Users;




    if($model->load(Yii::$app->request->post())) {


      $queryRetrieve = Users::find()->where(['email'=>$model->email])->one();

      if($queryRetrieve == TRUE){

      Yii::$app->mailer->compose()
        ->setFrom('gudangjobcom@gmail.com')
        ->setTo($model->email)
        ->setSubject('Forgot Password')
        ->setHtmlBody(
        "<p>Hi <b>".$queryRetrieve->fullname.",</b></p>

        <p>This is your Email and Password :</p>

        <h4>Your Email : ". $queryRetrieve->email ."</h4>
        <h4>Your Password : ". pack("H*",($queryRetrieve->password)) ."</h4>

        <p><b><i><h3>Note : Please Login Again and change your Password after login.</h3></b></i></p>
        <hr/>
        <p>Thank You for using <b>Gudangjob.com</b></p>

        <p>Have a Nice Day :)</p>
        "

        )
        ->send();

        Yii::$app->session->setFlash('forgotpassword_success');

      return $this->refresh();

    } else {

        Yii::$app->session->setFlash('account_notfound');


    }

    }
    return $this->render('forgotpassword',[

      'model' => $model,


      ]);


  }








    /**
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
