<?php

namespace backend;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MjStudent;

/**
 * models represents the model behind the search form about `backend\models\MjStudent`.
 */
class models extends MjStudent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['eid', 'type', 'status'], 'integer'],
            [['esno', 'ename', 'pwd', 'tel1', 'tel2', 'birth', 'rzrq'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = MjStudent::find();

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
            'eid' => $this->eid,
            'birth' => $this->birth,
            'type' => $this->type,
            'rzrq' => $this->rzrq,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'esno', $this->esno])
            ->andFilterWhere(['like', 'ename', $this->ename])
            ->andFilterWhere(['like', 'pwd', $this->pwd])
            ->andFilterWhere(['like', 'tel1', $this->tel1])
            ->andFilterWhere(['like', 'tel2', $this->tel2]);

        return $dataProvider;
    }
}
