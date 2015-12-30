<?php

namespace app\controllers;

use Yii;
use app\models\Certification;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CertificationController implements the CRUD actions for Certification model.
 */
class CertificationController extends Controller
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
                'only' => ['index'],
                'rules' => [
                    [
                      'allow' => true,
                      'actions' => ['index'],
                      'roles' => ['@'],

                    ],

                ],
            ],



        ];
    }

    /**
     * Lists all Certification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Certification::find()->where(['id_user'=>Yii::$app->user->identity->id]),
        ]);



		 $model = new Certification();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

			Yii::$app->session->setFlash('savecertification');

			return $this->refresh();
        }


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }





    /**
     * Updates an existing Certification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Certification model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Certification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Certification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Certification::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
