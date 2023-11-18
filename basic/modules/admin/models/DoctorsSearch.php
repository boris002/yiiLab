<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Doctors;

/**
 * DoctorsSearch represents the model behind the search form of `app\modules\admin\models\Doctors`.
 */
class DoctorsSearch extends Doctors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_specialty', 'category'], 'safe'],
            [['name'], 'safe'],


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
        $query = Doctors::find()->with('specialty');

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
            'category' => $this->category,
        ]);
        $query->joinWith(['specialty' => function ($query) {
            $query->andFilterWhere(['like', 'specialty.name', $this->id_specialty]);
        }]);

        $query->andFilterWhere(['like', 'Doctors.name', $this->name]);

        return $dataProvider;
    }
}
