<?php

namespace app\controllers;
use Yii;
use app\models\CrbCheck;
use app\models\CrbCheckSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use app\models\Registry;
use app\models\CriminalRecord;
use app\models\CriminalRecordSearch;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;

/**
 * CrbcheckController implements the CRUD actions for CrbCheck model.
 */
class CrbcheckController extends Controller
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
     * Lists all CrbCheck models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CrbCheckSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['user_user_id'=>Yii::$app->user->identity->getId()]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CrbCheck model.
     * @param int $quiery_id Quiery ID
     * @param int $query_type_id Query Type ID
     * @param int $user_user_id User User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($quiery_id, $query_type_id, $user_user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($quiery_id, $query_type_id, $user_user_id),
        ]);
    }

    /**
     * Creates a new CrbCheck model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CrbCheck();
        Yii::error("1");
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->user_user_id = Yii::$app->user->identity->getId();
                $model->search_timestamp = date("Y-m-d H:i:s");
                if ($model->save()) {
                    return $this->redirect(['view', 'quiery_id' => $model->quiery_id, 'query_type_id' => $model->query_type_id, 'user_user_id' => $model->user_user_id]);
                } else {
                    VarDumper::dump($model);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CrbCheck model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $quiery_id Quiery ID
     * @param int $query_type_id Query Type ID
     * @param int $user_user_id User User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($quiery_id, $query_type_id, $user_user_id)
    {
        $model = $this->findModel($quiery_id, $query_type_id, $user_user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'quiery_id' => $model->quiery_id, 'query_type_id' => $model->query_type_id, 'user_user_id' => $model->user_user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CrbCheck model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $quiery_id Quiery ID
     * @param int $query_type_id Query Type ID
     * @param int $user_user_id User User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($quiery_id, $query_type_id, $user_user_id)
    {
        $this->findModel($quiery_id, $query_type_id, $user_user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CrbCheck model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $quiery_id Quiery ID
     * @param int $query_type_id Query Type ID
     * @param int $user_user_id User User ID
     * @return CrbCheck the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($quiery_id, $query_type_id, $user_user_id)
    {
        if (($model = CrbCheck::findOne(['quiery_id' => $quiery_id, 'query_type_id' => $query_type_id, 'user_user_id' => $user_user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionExecute($query_id)
    {
        $query = CrbCheck::find()->where(['=', 'quiery_id', $query_id])->one();
        $q1 = new Query();
        $q1->select('*')
            ->from('registry')
            ->where(['=', 'fisrt_name', $query->search_firstname])
            ->andWhere(['=', 'last_name', $query->search_lastname]);

        if ($query->dob != NULL)
            $q1->andWhere(['=', 'dob', $query->dob]);

        $users = $q1->all();
                
        $found = array();
        foreach ($users as $user) {
            var_dump($user);
            // Now build the query on what all is given iniinitial query
            $q2 = new Query();
            $q2->select('*')
                ->from('criminal_record')
                ->where(['=', 'record_person_id', $user['person_id']]);

            if ($query->query_type_id == 3) // FLAGGED
                $q2->andWhere(['=', 'alert_flag', 1]);

            if ($query->start_date != NULL)
                $q2->andWhere(['>=', 'conviction_date', $query->start_date]);

            if ($query->end_date != NULL)
                $q2->andWhere(['<=', 'conviction_date', $query->end_date]);

            $records = $q2->all();
            foreach($records as $record) {
                $model = new CriminalRecord();
                $model->record_id = $record['record_id'];
                $model->conviction_date = $record['conviction_date'];
                $model->conviction_place = $record['conviction_place'];
                $model->curr_status = $record['curr_status'];
                $model->alert_flag = $record['alert_flag'];
                $model->record_offense_id = $record['record_offense_id'];
                $model->record_conviction_id = $record['record_conviction_id'];
                $model->record_person_id = $record['record_person_id'];
                array_push($found, $model);
            }
        }

        $provider = new ArrayDataProvider([
            'allModels' => $found,
        ]);

        return $this->render('records', [
            'dataProvider' => $provider,
        ]);
    }
}
