<?php

namespace app\controllers;
use app\models\Appointments;
use app\models\Basket;
use Yii;
use yii\db\Expression;
use yii\helpers\Json;
use yii\web\Controller;
use app\models\Diagnoses;
class DiagnosesController extends Controller
{
    public function actionTable(){
        $data = Diagnoses::find()->all();
        return $this->render('table', [
            'data' => $data
        ]);

    }
    public function actionCreate()
    {
        $model = new Diagnoses();
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
        $model = Diagnoses::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $previousData = $model->getOldAttributes();
            if ($model->save()) {
                $this->saveToBasket($previousData,'Diagnoses');

                return $this->redirect(['table']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Diagnoses::findOne($id);
        $appointments = Appointments::findAll(['id_patient' => $model->id]);
        foreach ($appointments as $appointment) {
            $this->saveToBasket($appointment, 'Appointments');
        }
        $this->saveToBasket($model,'Diagnoses');
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