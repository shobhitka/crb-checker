<?php

namespace app\controllers;

use app\models\Convictions;
use app\models\ConvictionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConvictionsController implements the CRUD actions for Convictions model.
 */
class ConvictionsController extends Controller
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
     * Lists all Convictions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "sidenav";
        $searchModel = new ConvictionsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Convictions model.
     * @param int $conviction_id Conviction ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($conviction_id)
    {
        $this->layout = "sidenav";
        return $this->render('view', [
            'model' => $this->findModel($conviction_id),
        ]);
    }

    /**
     * Creates a new Convictions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = "sidenav";
        $model = new Convictions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'conviction_id' => $model->conviction_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Convictions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $conviction_id Conviction ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($conviction_id)
    {
        $this->layout = "sidenav";
        $model = $this->findModel($conviction_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'conviction_id' => $model->conviction_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Convictions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $conviction_id Conviction ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($conviction_id)
    {
        $this->layout = "sidenav";
        $this->findModel($conviction_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Convictions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $conviction_id Conviction ID
     * @return Convictions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($conviction_id)
    {
        if (($model = Convictions::findOne(['conviction_id' => $conviction_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
