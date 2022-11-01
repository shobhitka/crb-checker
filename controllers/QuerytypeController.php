<?php

namespace app\controllers;

use app\models\QueryType;
use app\models\QueryTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuerytypeController implements the CRUD actions for QueryType model.
 */
class QuerytypeController extends Controller
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
     * Lists all QueryType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "sidenav";
        $searchModel = new QueryTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single QueryType model.
     * @param int $type_id Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($type_id)
    {
        $this->layout = "sidenav";
        return $this->render('view', [
            'model' => $this->findModel($type_id),
        ]);
    }

    /**
     * Creates a new QueryType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = "sidenav";
        $model = new QueryType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'type_id' => $model->type_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing QueryType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $type_id Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($type_id)
    {
        $this->layout = "sidenav";
        $model = $this->findModel($type_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'type_id' => $model->type_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing QueryType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $type_id Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($type_id)
    {
        $this->layout = "sidenav";
        $this->findModel($type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the QueryType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $type_id Type ID
     * @return QueryType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($type_id)
    {
        if (($model = QueryType::findOne(['type_id' => $type_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
