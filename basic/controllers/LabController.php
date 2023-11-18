<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\DoctorsForm;
use app\models\patientsForm;
use app\models\DiagnosesForm;
class LabController extends Controller
{
    public function actionWork1()
    {
        $model = new  DoctorsForm();
        $model ->load(Yii::$app->request->post());
        return $this->render('work1', ['model' => $model, 'submittedData' => $model->attributes]);

        }


    public function actionInfo()
    {
        return $this->render('info');
    }
    public function  actionWork2(){
        return $this->redirect(['table/index']);

    }
    public function  actionWork3(){
        return $this->redirect(['table/index']);

    }
    public function  actionWork4(){
        return $this->redirect(['/admin/default/index']);

    }
}

