<?php

namespace app\controllers;

use Yii;
use app\models\Career;
use app\models\CareerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\behaviors\SluggableBehavior;

/**
 * CareerController implements the CRUD actions for Career model.
 */
class CareerController extends Controller
{

  public $layout = 'career';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],

            [
              'class' => SluggableBehavior::className(),
            'attribute' => 'position',
            'slugAttribute' => 'slug',
          ],
        ];
    }

    /**
     * Lists all Career models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CareerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Career model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id)
    {
       $sendcvModel = new \app\models\Sendcv();

       if($sendcvModel->load(Yii::$app->request->post())) {

         Yii::$app->mailer->compose(['html' => '@app/mail/layouts/cv',])
           ->setFrom(['gudangjobcom@gmail.com'=>'Gudangjob.com'])
           ->setTo($sendcvModel->receiver_email)
           ->setReplyTo(Yii::$app->user->identity->email)
           ->setCC(Yii::$app->user->identity->email)
           ->setSubject($sendcvModel->subject)
           //->setHtmlBody($sendcvModel->content)
           ->send();

            $sendcvModel->save();
            Yii::$app->session->setFlash('sendCv_success');
            return $this->refresh();

       } else {

         return $this->render('detail', [
             'model' => $this->findModel($id),
             'sendcvModel' => $sendcvModel,
         ]);


       }


    }


    //Sluggable function
    public function actionSlug($slug) {
      $model = Career::find()->where(['position'=>$slug])->one();
      if (!is_null($model)) {
        return $this->render('detail',[
            'model'=>$model,
        ]);
      } else {
        return $this->render('404',['exception'=>Yii::$app->errorHandler->exception]);
      }
    }






    /**
     * Finds the Career model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Career the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Career::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
