<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Percorsi;

/**
 * PercorsiSearch represents the model behind the search form of `app\models\Percorsi`.
 */
class PercorsiSearch extends Percorsi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_percorso', 'durata'], 'integer'],
            [['nome_percorso', 'inizio'], 'safe'],
            [['costo'], 'number'],
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
        $query = Percorsi::find();

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
            'id_percorso' => $this->id_percorso,
            'durata' => $this->durata,
            'inizio' => $this->inizio,
            'costo' => $this->costo,
        ]);

        $query->andFilterWhere(['like', 'nome_percorso', $this->nome_percorso]);

        return $dataProvider;
    }
}
