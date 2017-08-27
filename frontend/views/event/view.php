<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Events'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'short_name',
            'description:ntext',
            'website',
            [
                'attribute' => 'date_start',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            [
                'attribute' => 'date_end',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            'location:ntext',
            'venue_name:ntext',
            'goals:ntext',
            'audience',
            'audience_size',
            'products:ntext',
            'experiences:ntext',
            'nda',
            'audience_persons:ntext',
            'expectations:ntext',
            'customers:ntext',
            'partners:ntext',
            'comments:ntext',
            'apm:ntext',
            'atme:ntext',
            'a_v',
            'stage',
            [
                'attribute' => 'logistics_date_start',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            [
                'attribute' => 'logistics_date_end',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            [
                'attribute' => 'tear_down_date_start',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            [
                'attribute' => 'tear_down_date_end',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            'logistics',
            [
                'attribute' => 'arrival_date',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            [
                'attribute' => 'departure_date',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
            ],
            'layout_stage:ntext',
            'layout_demo_area:ntext',
            'level_of_support',
            'budget',
            'cost_center',
            'requester:ntext',
            'submitter',
            'group:ntext',
            'event_type',
            'number',
            'objectives',
            'sponsor',
            'keynote',
            'booth',
            'sate_lite',
            'meeting',
            'nda_suite',
            'sessions',
            'demos',
            'training',
            'launch',
            'pr',
            'costs',
            'shipping_costs',
            'tier',
            'event_quarter',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'timeZone' => 'Etc/Greenwich'
        ]
    ]) ?>

</div>
