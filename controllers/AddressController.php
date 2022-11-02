<?php

namespace app\controllers;

use app\models\Address;
use app\models\AddressSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Address models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity->isAdmin())
            $this->layout = "sidenav";
        $searchModel = new AddressSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Address model.
     * @param int $address_id Address ID
     * @param int $address_person_id Address Person ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($address_id, $address_person_id)
    {
        if (Yii::$app->user->identity->isAdmin())
            $this->layout = "sidenav";
        return $this->render('view', [
            'model' => $this->findModel($address_id, $address_person_id),
        ]);
    }

    /**
     * Creates a new Address model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($address_person_id)
    {
        $this->layout = "sidenav";
        $model = new Address();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['registry/view', 'person_id' => $model->address_person_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'address_person_id' => $address_person_id,
        ]);
    }

    /**
     * Updates an existing Address model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $address_id Address ID
     * @param int $address_person_id Address Person ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($address_id, $address_person_id)
    {
        $this->layout = "sidenav";
        $model = $this->findModel($address_id, $address_person_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'address_id' => $model->address_id, 'address_person_id' => $model->address_person_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Address model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $address_id Address ID
     * @param int $address_person_id Address Person ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($address_id, $address_person_id)
    {
        $this->layout = "sidenav";
        $this->findModel($address_id, $address_person_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Address model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $address_id Address ID
     * @param int $address_person_id Address Person ID
     * @return Address the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($address_id, $address_person_id)
    {
        if (($model = Address::findOne(['address_id' => $address_id, 'address_person_id' => $address_person_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
