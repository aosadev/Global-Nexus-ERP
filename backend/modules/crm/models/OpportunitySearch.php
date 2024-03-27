<?php

namespace app\modules\crm\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\crm\models\Opportunity;

/**
 * OpportunitySearch represents the model behind the search form of `app\modules\crm\models\Opportunity`.
 */
class OpportunitySearch extends Opportunity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id'], 'integer'],
            [['description', 'stage', 'created_at', 'estimated_close_date'], 'safe'],
            [['potential_value'], 'number'],
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
        $query = Opportunity::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'customer_id' => $this->customer_id,
            'potential_value' => $this->potential_value,
            'created_at' => $this->created_at,
            'estimated_close_date' => $this->estimated_close_date,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'stage', $this->stage]);

        return $dataProvider;
    }
}
