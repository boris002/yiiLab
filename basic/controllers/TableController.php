<?php

namespace app\controllers;
use app\models\CountAppointmentsByDoctorForm;
use app\models\CountAppointmentsByDoctorInCurrentYearForm;
use app\models\FindDoctorsByPatientNameForm;
use app\models\Patients;
use app\models\TotalCostForm;
use Yii;
use  app\models\Doctors;
use app\models\Appointments;
use app\models\Diagnoses;
use yii\web\Controller;
use app\models\FindPatientsByBirthYearForm;


class TableController extends Controller
{
    public function actionTables()
   {
       $option = Yii::$app->request->get('option');

       switch ($option) {
           case 'diagnoses':
               $data = Diagnoses::find()->all();
               break;
           case 'doctors':
               $data = Doctors::find()->all();
               break;
           case 'patients':
               $data = Patients::find()->all();
               break;
           case 'appointments':
               $data = Appointments::find()->with('doctor', 'patient', 'diagnose')->all();
               break;
           default:
               $data = [];
               break;
       }

       return $this->render('tables', [
           'data' => $data,
           'option' => $option
       ]);
   }
    public function actionQueries()
    {
        $option = Yii::$app->request->get('option',);
        $model = null;

        switch ($option) {
            case 'findPatientsByBirthYear':
                $model = new Patients();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $model->search();
                }
                break;
            case 'TotalCost':
                $model = new Appointments();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $model->TotalCost();
                }
                break;
            case 'CountAppointmentsByDoctorInCurrentYear':
                $model = new Appointments();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $model->CountAppointmentsByDoctorInYear($model->doctorName,$model->year);
                }
                break;
            case 'CountAppointmentsByDoctor':
                $model = new Appointments();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $model->CountAppointmentsByDoctor($model->doctorName);
                }
                break;
            case 'FindDoctorsByPatientName':
                $model = new Doctors();
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $model->FindDoctors();
                }
                break;


        }

        return $this->render('queries', ['model' => $model,'option' => $option]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}