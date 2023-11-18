<?php

namespace app\controllers;
use app\models\Basket;
use app\models\Patients;
use yii\db\Expression;
use yii\web\Controller;
use app\models\Doctors;
use app\models\Appointments;
use app\models\Diagnoses;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class AppointmentsController extends Controller
{
   public function actionTable(){
       $data = Appointments::find()->with('doctor', 'patient', 'diagnose')->all();
        return $this->render('table', [
            'data' => $data
        ]);

    }
    public function actionCreate()
    {
        $model = new Appointments();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->redirect(['table']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Appointments::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $previousData = $model->getOldAttributes();
            if ($model->save()) {
                $this->saveToBasket($previousData,'Appointments');
                return $this->redirect(['table']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Appointments::findOne($id);
        $this->saveToBasket($model,'Appointments');
        $model->delete();

        return $this->redirect(['table']);
    }
    protected function saveToBasket($attributes, $sourceTable)
    {
        $basketRecord = new Basket();
        $basketRecord->source_table = $sourceTable;
        $basketRecord->record_data = Json::encode($attributes);
        $basketRecord->deleted_at = new Expression('NOW()');
        $basketRecord->save();
    }
}
