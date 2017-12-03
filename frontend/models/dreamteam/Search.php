<?php

namespace frontend\models\dreamteam;

class Search extends \frontend\models\member\Serach
{
    public $ids;

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['ids'], 'safe'];

        return $rules;
    }

    protected function _prepareQuery(\yii\db\ActiveQuery $query)
    {
        if ($this->ids) {
            $query->andFilterWhere(['IN', 'id', $this->ids]);
        } else {
            $query->andWhere('1<>1');
        }

        $a = $query->createCommand()->rawSql;

        parent::_prepareQuery($query); // TODO: Change the autogenerated stub
    }
}