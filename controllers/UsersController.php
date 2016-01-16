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
					'only' => ['index','upload'],
					'rules' => [
							[
								'allow' => true,
								'actions' => ['index','upload'],
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
