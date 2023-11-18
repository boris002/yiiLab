<?php

namespace app\controllers;
use app\models\Patients;
use yii\db\Expression;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use app\models\Basket;
use app\models\Appointments;





class PatientsController extends Controller
{
    public function actionTable(){
        $data = Patients::find()->all();
        return $this->render('table', ['data' => $data]);

    }
    public function actionCreate()
    {
        $model = new Patients();

        if ($model->load(Yii::$app->request->post())) {
            $model->discount = $model->discount / 100;
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
        $model = Patients::findOne($id);
        $model->discount = $model->discount * 100;
        if ($model->load(Yii::$app->request->post())) {
            $model->discount = $model->discount / 100;
            $previousData = $model->getOldAttributes();
            if ($model->save()) {
                $this->saveToBasket($previousData,'Patients');

                return $this->redirect(['table']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
{
    $model = Patients::findOne($id);
        $appointments = Appointments::findAll(['id_patient' => $model->id]);
        foreach ($appointments as $appointment) {
            $this->saveToBasket($appointment, 'Appointments');
        }
    $this->saveToBasket($model,'Patients');
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