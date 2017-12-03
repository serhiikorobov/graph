<?php

namespace frontend\models\member\visibility;

use common\models\member\source\visibility\Watcher;
use frontend\models\member\Visibility;

class View extends \yii\base\Model
{
    public $watcher_group_id;
    public $visible_group_ids;

    private $disableVisibleGroupIds = null;

    public function rules()
    {
        return [
            [
                'watcher_group_id',
                'required'
            ],
            [
                'visible_group_ids',
                'each',
                'rule' => ['integer']
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'watcher_group_id' => \Yii::t('app', 'Who see'),
            'visible_group_ids' => \Yii::t('app', 'What see')
        ];
    }

    public function prepareVisibleGroupIds()
    {
        $visibleGroupIds = array_diff($this->visible_group_ids, $this->getDisableVisibleGroupIds());

        $this->visible_group_ids = $visibleGroupIds;
    }

    public function getDisableVisibleGroupIds()
    {
        if ($this->disableVisibleGroupIds === null) {
            $disableVisibleGroupIds = [];
            if ($this->watcher_group_id !== Watcher::ANONYMOUS) {
                $visibleQuery = Visibility::find()
                    ->where(['watcher_group_id' => null]);

                $visibleQuery->select(['visible_group_id']);
                $disableVisibleGroupIds = $visibleQuery->createCommand()->queryColumn();
            } else {
                $disableVisibleGroupIds = [];
            }

            $disableVisibleGroupIds[] = $this->watcher_group_id;

            $this->disableVisibleGroupIds = $disableVisibleGroupIds;
        }

        return $this->disableVisibleGroupIds;
    }
}