<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Appointments;

/**
 * AppointmentsSearch represents the model behind the search form of `app\modules\admin\models\Appointments`.
 */
class AppointmentsSearch extends Appointments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_doctor', 'id_patient', 'id_diagnose'], 'safe'],
            [['visit_date', 'visit_purpose'], 'safe'],
            [['visit_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Appointments::find()->with(['doctor', 'patient','diagnose']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'visit_date' => $this->visit_date,
            'visit_price' => $this->visit_price,
        ]);

        $query->andFilterWhere(['like', 'visit_purpose', $this->visit_purpose]);
        $query->joinWith(['doctor' => function ($query) {
            $query->andFilterWhere(['like', 'Doctors.name', $this->id_doctor]);
        }]);
        $query->joinWith(['patient' => function ($query) {
            $query->andFilterWhere(['like', 'Patients.name', $this->id_patient]);
        }]);
        $query->joinWith(['diagnose' => function ($query) {
            $query->andFilterWhere(['like', 'Diagnoses.name', $this->id_diagnose]);
        }]);

        return $dataProvider;
    }
}
