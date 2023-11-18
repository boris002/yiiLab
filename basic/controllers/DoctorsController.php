<?php

namespace app\controllers;
use app\models\Appointments;
use app\models\Basket;
use yii\db\Expression;
use yii\web\Controller;
use app\models\Doctors;
use app\models\specialty;
use Yii;
use yii\helpers\Json;
class DoctorsController extends Controller
{

    public function actionTable(){
        $data = Doctors::find()->with('specialty')->all();
        return $this->render('table', [
            'data' => $data
        ]);

    }
    public function actionCreate()
    {
        $model = new Doctors();
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
        $model = Doctors::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $previousData = $model->getOldAttributes();
            if ($model->save()) {
                $this->saveToBasket($previousData,'Doctora');
            }
            return $this->redirect(['table']);

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = Doctors::findOne($id);
        $appointments = Appointments::findAll(['id_doctor' => $model->id]);
        foreach ($appointments as $appointment) {
            $this->saveToBasket($appointment, 'Appointments');
        }
        $this->saveToBasket($model,'Doctora');
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
