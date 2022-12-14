<?php

namespace app\controllers;

use app\models\CriminalRecord;
use app\models\CriminalRecordSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Registry;
use app\models\Address;
use yii\helpers\VarDumper;
use yii;

/**
 * CriminalrecordController implements the CRUD actions for CriminalRecord model.
 */
class CriminalrecordController extends Controller
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
     * Lists all CriminalRecord models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity->isAdmin())
            $this->layout = "sidenav";
        $searchModel = new CriminalRecordSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CriminalRecord model.
     * @param int $record_id Record ID
     * @param int $record_offense_id Record Offense ID
     * @param int $record_conviction_id Record Conviction ID
     * @param int $record_person_id Record Person ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($record_id)//, $record_offense_id, $record_conviction_id, $record_person_id)
    {
        if (Yii::$app->user->identity->isAdmin())
            $this->layout = "sidenav";
        return $this->render('view', [
            'model' => CriminalRecord::find()->where(["=", 'record_id', $record_id])->one(),//'findModel($record_id, $record_offense_id, $record_conviction_id, $record_person_id),
        ]);
    }

    /**
     * Creates a new CriminalRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = "sidenav";
        $model = new CriminalRecord();
        $registry = new Registry();
        $address = new Address();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $registry->load($this->request->post()) && $address->load($this->request->post())) {
                // save the person details first to generate person_id
                if ($registry->save()) {
                    // save the address
                    $address->address_person_id = $registry->person_id;
                    if ($address->save()) {
                        // save the record
                        $model->record_person_id = $registry->person_id;
                        if ($model->save()) {
                            return $this->redirect(['view', 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id]);
                        }
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'registry' => $registry,
            'address' => $address,
        ]);
    }

    public function actionCreatenew($person_id)
    {
        $this->layout = "sidenav";
        $model = new CriminalRecord();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->record_person_id = $person_id;
                if ($model->save())
                    return $this->redirect(['registry/view', 'person_id' => $model->record_person_id, 'record_id' => $model->record_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('createnew', [
            'model' => $model,
            'person_id' => $person_id,
        ]);
    }

    /**
     * Updates an existing CriminalRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $record_id Record ID
     * @param int $record_offense_id Record Offense ID
     * @param int $record_conviction_id Record Conviction ID
     * @param int $record_person_id Record Person ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($record_id, $record_offense_id, $record_conviction_id, $record_person_id)
    {
        $this->layout = "sidenav";
        $model = $this->findModel($record_id, $record_offense_id, $record_conviction_id, $record_person_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'record_id' => $model->record_id, 'record_offense_id' => $model->record_offense_id, 'record_conviction_id' => $model->record_conviction_id, 'record_person_id' => $model->record_person_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CriminalRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $record_id Record ID
     * @param int $record_offense_id Record Offense ID
     * @param int $record_conviction_id Record Conviction ID
     * @param int $record_person_id Record Person ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($record_id, $record_offense_id, $record_conviction_id, $record_person_id)
    {
        $this->layout = "sidenav";
        $this->findModel($record_id, $record_offense_id, $record_conviction_id, $record_person_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CriminalRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $record_id Record ID
     * @param int $record_offense_id Record Offense ID
     * @param int $record_conviction_id Record Conviction ID
     * @param int $record_person_id Record Person ID
     * @return CriminalRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($record_id, $record_offense_id, $record_conviction_id, $record_person_id)
    {
        if (($model = CriminalRecord::findOne(['record_id' => $record_id, 'record_offense_id' => $record_offense_id, 'record_conviction_id' => $record_conviction_id, 'record_person_id' => $record_person_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
