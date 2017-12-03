<?php

namespace frontend\models\member;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Member;

/**
 * Serach represents the model behind the search form about `frontend\models\Member`.
 */
class Serach extends Member
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'role_id'], 'integer'],
            [['create_at', 'name', 'email'], 'safe'],
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
        $query = Member::find();

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
            'create_at' => $this->create_at,
            'user_id' => $this->user_id,
            'role_id' => $this->role_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email]);

        $this->_prepareQuery($query);

        return $dataProvider;
    }

    protected function _prepareQuery(\yii\db\ActiveQuery $query)
    {

    }
}
