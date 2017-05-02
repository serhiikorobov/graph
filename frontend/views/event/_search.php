<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\event\Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'short_name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'website') ?>

    <?= $form->field($model, 'date_start') ?>

    <?php // echo $form->field($model, 'date_end') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'venue_name') ?>

    <?php // echo $form->field($model, 'goals') ?>

    <?php // echo $form->field($model, 'audience') ?>

    <?php // echo $form->field($model, 'audience_size') ?>

    <?php // echo $form->field($model, 'products') ?>

    <?php // echo $form->field($model, 'experiences') ?>

    <?php // echo $form->field($model, 'nda') ?>

    <?php // echo $form->field($model, 'audience_persons') ?>

    <?php // echo $form->field($model, 'expectations') ?>

    <?php // echo $form->field($model, 'customers') ?>

    <?php // echo $form->field($model, 'partners') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'apm') ?>

    <?php // echo $form->field($model, 'atme') ?>

    <?php // echo $form->field($model, 'a_v') ?>

    <?php // echo $form->field($model, 'stage') ?>

    <?php // echo $form->field($model, 'logistics_date_start') ?>

    <?php // echo $form->field($model, 'logistics_date_end') ?>

    <?php // echo $form->field($model, 'tear_down_date_start') ?>

    <?php // echo $form->field($model, 'tear_down_date_end') ?>

    <?php // echo $form->field($model, 'logistics') ?>

    <?php // echo $form->field($model, 'arrival_date') ?>

    <?php // echo $form->field($model, 'departure_date') ?>

    <?php // echo $form->field($model, 'layout_stage') ?>

    <?php // echo $form->field($model, 'layout_demo_area') ?>

    <?php // echo $form->field($model, 'level_of_support') ?>

    <?php // echo $form->field($model, 'budget') ?>

    <?php // echo $form->field($model, 'cost_center') ?>

    <?php // echo $form->field($model, 'requester') ?>

    <?php // echo $form->field($model, 'submitter') ?>

    <?php // echo $form->field($model, 'group') ?>

    <?php // echo $form->field($model, 'event_type') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'objectives') ?>

    <?php // echo $form->field($model, 'sponsor') ?>

    <?php // echo $form->field($model, 'keynote') ?>

    <?php // echo $form->field($model, 'booth') ?>

    <?php // echo $form->field($model, 'sate_lite') ?>

    <?php // echo $form->field($model, 'meeting') ?>

    <?php // echo $form->field($model, 'nda_suite') ?>

    <?php // echo $form->field($model, 'sessions') ?>

    <?php // echo $form->field($model, 'demos') ?>

    <?php // echo $form->field($model, 'training') ?>

    <?php // echo $form->field($model, 'launch') ?>

    <?php // echo $form->field($model, 'pr') ?>

    <?php // echo $form->field($model, 'costs') ?>

    <?php // echo $form->field($model, 'shipping_costs') ?>

    <?php // echo $form->field($model, 'tier') ?>

    <?php // echo $form->field($model, 'event_quarter') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
