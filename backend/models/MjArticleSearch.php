<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MjArticle;

/**
 * MjArticleSearch represents the model behind the search form about `backend\models\MjArticle`.
 */
class MjArticleSearch extends MjArticle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'status'], 'integer'],
            [['time', 'article', 'author', 'issuer', 'title', 'resume'], 'safe'],
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
        $query = MjArticle::find();

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
            'aid' => $this->aid,
            'time' => $this->time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'article', $this->article])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'issuer', $this->issuer])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'resume', $this->resume]);

        return $dataProvider;
    }
}
