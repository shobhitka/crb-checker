<?php

namespace app\controllers;

use app\models\Registry;
use app\models\RegistrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Address;
use yii\data\ActiveDataProvider;
use yii;

/**
 * RegistryController implements the CRUD actions for Registry model.
 */
class RegistryController extends Controller
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
     * Lists all Registry models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity->isAdmin())
            $this->layout = "sidenav";
        $searchModel = new RegistrySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Registry model.
     * @param int $person_id Person ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($person_id, $record_id)
    {
        if (Yii::$app->user->identity->isAdmin())
        if (Yii::$app->user->identity->isAdmin())$this->layout = "sidenav";
        $record_id = 2;

        $query = Address::find()->where(['=', 'address_person_id', $person_id]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('view', [
            'model' => $this->findModel($person_id),
            'dataProvider' => $dataProvider,
            'record_id' => $record_id,
        ]);
    }

    /**
     * Creates a new Registry model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = "sidenav";
        $model = new Registry();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'person_id' => $model->person_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Registry model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $person_id Person ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($person_id)
    {
        $this->layout = "sidenav";
        $model = $this->findModel($person_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'person_id' => $model->person_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Registry model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $person_id Person ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($person_id)
    {
        $this->layout = "sidenav";
        $this->findModel($person_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Registry model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $person_id Person ID
     * @return Registry the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($person_id)
    {
        if (($model = Registry::findOne(['person_id' => $person_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
