<?php

namespace frontend\models\event;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Event;

/**
 * Search represents the model behind the search form about `frontend\models\Event`.
 */
class Search extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'audience_size', 'number'], 'integer'],
            [['short_name', 'description', 'website', 'date_start', 'date_end', 'location', 'venue_name', 'goals', 'audience', 'products', 'experiences', 'nda', 'audience_persons', 'expectations', 'customers', 'partners', 'comments', 'apm', 'atme', 'a_v', 'stage', 'logistics_date_start', 'logistics_date_end', 'tear_down_date_start', 'tear_down_date_end', 'logistics', 'arrival_date', 'departure_date', 'layout_stage', 'layout_demo_area', 'level_of_support', 'requester', 'submitter', 'group', 'event_type', 'objectives', 'sponsor', 'keynote', 'booth', 'sate_lite', 'meeting', 'nda_suite', 'sessions', 'demos', 'training', 'launch', 'pr', 'tier', 'event_quarter'], 'safe'],
            [['budget', 'cost_center', 'costs', 'shipping_costs'], 'number'],
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
        $query = Event::find();

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
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'audience_size' => $this->audience_size,
            'logistics_date_start' => $this->logistics_date_start,
            'logistics_date_end' => $this->logistics_date_end,
            'tear_down_date_start' => $this->tear_down_date_start,
            'tear_down_date_end' => $this->tear_down_date_end,
            'arrival_date' => $this->arrival_date,
            'departure_date' => $this->departure_date,
            'budget' => $this->budget,
            'cost_center' => $this->cost_center,
            'number' => $this->number,
            'costs' => $this->costs,
            'shipping_costs' => $this->shipping_costs,
        ]);

        $query->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'venue_name', $this->venue_name])
            ->andFilterWhere(['like', 'goals', $this->goals])
            ->andFilterWhere(['like', 'audience', $this->audience])
            ->andFilterWhere(['like', 'products', $this->products])
            ->andFilterWhere(['like', 'experiences', $this->experiences])
            ->andFilterWhere(['like', 'nda', $this->nda])
            ->andFilterWhere(['like', 'audience_persons', $this->audience_persons])
            ->andFilterWhere(['like', 'expectations', $this->expectations])
            ->andFilterWhere(['like', 'customers', $this->customers])
            ->andFilterWhere(['like', 'partners', $this->partners])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'apm', $this->apm])
            ->andFilterWhere(['like', 'atme', $this->atme])
            ->andFilterWhere(['like', 'a_v', $this->a_v])
            ->andFilterWhere(['like', 'stage', $this->stage])
            ->andFilterWhere(['like', 'logistics', $this->logistics])
            ->andFilterWhere(['like', 'layout_stage', $this->layout_stage])
            ->andFilterWhere(['like', 'layout_demo_area', $this->layout_demo_area])
            ->andFilterWhere(['like', 'level_of_support', $this->level_of_support])
            ->andFilterWhere(['like', 'requester', $this->requester])
            ->andFilterWhere(['like', 'submitter', $this->submitter])
            ->andFilterWhere(['like', 'group', $this->group])
            ->andFilterWhere(['like', 'event_type', $this->event_type])
            ->andFilterWhere(['like', 'objectives', $this->objectives])
            ->andFilterWhere(['like', 'sponsor', $this->sponsor])
            ->andFilterWhere(['like', 'keynote', $this->keynote])
            ->andFilterWhere(['like', 'booth', $this->booth])
            ->andFilterWhere(['like', 'sate_lite', $this->sate_lite])
            ->andFilterWhere(['like', 'meeting', $this->meeting])
            ->andFilterWhere(['like', 'nda_suite', $this->nda_suite])
            ->andFilterWhere(['like', 'sessions', $this->sessions])
            ->andFilterWhere(['like', 'demos', $this->demos])
            ->andFilterWhere(['like', 'training', $this->training])
            ->andFilterWhere(['like', 'launch', $this->launch])
            ->andFilterWhere(['like', 'pr', $this->pr])
            ->andFilterWhere(['like', 'tier', $this->tier])
            ->andFilterWhere(['like', 'event_quarter', $this->event_quarter]);

        return $dataProvider;
    }
}
