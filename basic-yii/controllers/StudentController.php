<?php

namespace app\controllers;

use app\models\Student;
use app\models\search\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use app\models\Country; 
use yii\helpers\ArrayHelper; 
use yii\web\UploadedFile;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
     * @param string $MASV Masv
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($MASV)
    {
        return $this->render('view', [
            'model' => $this->findModel($MASV),
        ]);
    }

    /**
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UploadForm();
        $modelStudent = new Student();
    
        $dataCountry = new Country();
        $dtcountry = ArrayHelper::map($dataCountry->getCountry(), 'code','name');
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                if ($model->loadImg()) {
                    return $this->redirect(['index']);
                }
            }
            if ($modelStudent->load($this->request->post()) && $modelStudent->save()) {
                return $this->redirect(['view', 'MASV' => $modelStudent->MASV]);
            }
        } 
    
        return $this->render('create', [
            'model' => $model,
            'modelStudent' => $modelStudent,
            'dtcountry' => $dtcountry,
        ]);
    }

    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $MASV Masv
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($MASV)
    {
        $model = $this->findModel($MASV);
       $dataCountry = new Country(); 
       $dtcountry = ArrayHelper::map($dataCountry->getCountry(), 'code','name'); 
       if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
           return $this->redirect(['view', 'MASV' => $model->MASV]);
       }
       return $this->render('update', [
           'model' => $model,
           'dtcountry' => $dtcountry 
        ]);
    }


    /**
     * Deletes an existing Student model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $MASV Masv
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($MASV)
    {
        $this->findModel($MASV)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $MASV Masv
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($MASV)
    {
        if (($model = Student::findOne(['MASV' => $MASV])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
