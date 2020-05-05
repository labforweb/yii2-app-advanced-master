<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PercorsiStudente;

/**
 * PercorsiStudenteSearch represents the model behind the search form of `app\models\PercorsiStudente`.
 */
class PercorsiStudenteSearch extends PercorsiStudente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'studenti_id', 'percorsi_id'], 'integer'],
            [['pagato'], 'string'],
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
        //$query = PercorsiStudente::find();
        
        $query = PercorsiStudente::find()->JoinWith('studenti', true)->JoinWith('percorsi', true);
        
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
            'studenti_id' => $this->studenti_id,
            'percorsi_id' => $this->percorsi_id,
        ]);

        $query->andFilterWhere(['like', 'pagato', $this->pagato]);

        return $dataProvider;
    }
}
