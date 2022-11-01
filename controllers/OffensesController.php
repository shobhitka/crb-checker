<?php

namespace app\controllers;

use app\models\Offenses;
use app\models\OffensesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OffensesController implements the CRUD actions for Offenses model.
 */
class OffensesController extends Controller
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
     * Lists all Offenses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "sidenav";
        $searchModel = new OffensesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Offenses model.
     * @param int $offense_id Offense ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($offense_id)
    {
        $this->layout = "sidenav";
        return $this->render('view', [
            'model' => $this->findModel($offense_id),
        ]);
    }

    /**
     * Creates a new Offenses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = "sidenav";
        $model = new Offenses();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'offense_id' => $model->offense_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Offenses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $offense_id Offense ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($offense_id)
    {
        $this->layout = "sidenav";
        $model = $this->findModel($offense_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'offense_id' => $model->offense_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Offenses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $offense_id Offense ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($offense_id)
    {
        $this->layout = "sidenav";
        $this->findModel($offense_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Offenses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $offense_id Offense ID
     * @return Offenses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($offense_id)
    {
        if (($model = Offenses::findOne(['offense_id' => $offense_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
