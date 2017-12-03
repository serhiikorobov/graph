<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\dreamteam\Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dream Team');
$this->params['breadcrumbs'][] = $this->title;

$groupOptions = new \common\models\member\source\Group();
$roleOptions = new \common\models\member\source\Role();

?>
<div class="dream-team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'create_at',
            'name',
            'email:email',
            [
                'attribute' => 'user_id',
                'filter' => $groupOptions->getOptions(false),
                'value' => function (\frontend\models\Member $member) {
                    return $member->getGroupName();
                }
            ],
            [
                'attribute' => 'role_id',
                'filter' => $roleOptions->getOptions(false),
                'value' => function (\frontend\models\Member $member) {
                    return $member->getRoleName();
                }
            ],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
