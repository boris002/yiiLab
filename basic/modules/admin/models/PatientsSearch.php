<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Patients;

/**
 * PatientsSearch represents the model behind the search form of `app\modules\admin\models\Patients`.
 */
class PatientsSearch extends Patients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'medical_card_number'], 'integer'],
            [['name', 'date_of_birth', 'address', 'gender'], 'safe'],
            [['discount'], 'number'],
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
        $query = Patients::find();

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
            'medical_card_number' => $this->medical_card_number,
            'date_of_birth' => $this->date_of_birth,
            'discount' => $this->discount,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'gender', $this->gender]);

        return $dataProvider;
    }
}
