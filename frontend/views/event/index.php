<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\event\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'short_name',
            //'description:ntext',
            //'website',
            [
                'attribute' => 'tier'
            ],
            [
                'attribute' => 'location',
                'value' => function(\frontend\models\Event $event) {
                    return StringHelper::truncate($event->location, 50);
                }
            ],
            [
                'attribute' => 'date_start',
                'format' => ['date', 'php:' . \common\models\Event::DATETIME_DISPLAY_FORMAT],
                'filter' => false
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'timeZone' => 'Etc/Greenwich'
        ]
    ]); ?>
</div>
