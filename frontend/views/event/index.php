<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
            'description:ntext',
            'website',
            'date_start',
            // 'date_end',
            // 'location:ntext',
            // 'venue_name:ntext',
            // 'goals:ntext',
            // 'audience',
            // 'audience_size',
            // 'products:ntext',
            // 'experiences:ntext',
            // 'nda',
            // 'audience_persons:ntext',
            // 'expectations:ntext',
            // 'customers:ntext',
            // 'partners:ntext',
            // 'comments:ntext',
            // 'apm:ntext',
            // 'atme:ntext',
            // 'a_v',
            // 'stage',
            // 'logistics_date_start',
            // 'logistics_date_end',
            // 'tear_down_date_start',
            // 'tear_down_date_end',
            // 'logistics',
            // 'arrival_date',
            // 'departure_date',
            // 'layout_stage:ntext',
            // 'layout_demo_area:ntext',
            // 'level_of_support',
            // 'budget',
            // 'cost_center',
            // 'requester:ntext',
            // 'submitter',
            // 'group:ntext',
            // 'event_type',
            // 'number',
            // 'objectives',
            // 'sponsor',
            // 'keynote',
            // 'booth',
            // 'sate_lite',
            // 'meeting',
            // 'nda_suite',
            // 'sessions',
            // 'demos',
            // 'training',
            // 'launch',
            // 'pr',
            // 'costs',
            // 'shipping_costs',
            // 'tier',
            // 'event_quarter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
