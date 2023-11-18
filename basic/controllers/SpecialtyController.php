<?php

namespace app\controllers;
use app\models\Basket;
use Yii;
use yii\web\Controller;
use yii\db\Expression;
use yii\helpers\Json;
use app\models\specialty;
use yii\web\NotFoundHttpException;
use app\models\Doctors;
use app\models\Appointments;
class SpecialtyController extends Controller
{
    public function actionTable(){
        $data = specialty::find()->all();
        return $this->render('table', [
            'data' => $data
        ]);

    }
    public function actionCreate()
    {
        $model = new specialty();

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
        $model = specialty::findOne($id);

        if ($model->load(Yii::$app->request->post())) {
            $previousData = $model->getOldAttributes();
            if ($model->save()) {
                $this->saveToBasket($previousData,'specialty');

                return $this->redirect(['table']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Specialty::findOne($id);
        $doctors = Doctors::findAll(['id_specialty' => $model->id]);
        foreach ($doctors as $doctor) {
            $appointments = Appointments::findAll(['id_doctor' => $doctor->id]);
            foreach ($appointments as $appointment) {
                $this->saveToBasket($appointment, 'Appointments');
            }
            $this->saveToBasket($doctor, 'Doctora');
        }
        $this->saveToBasket($model,'specialty');
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