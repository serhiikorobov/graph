<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\member\visibility\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$watcherSource = new \common\models\member\source\visibility\Watcher();
$viewerSource = new \common\models\member\source\visibility\Viewer();

$this->title = Yii::t('app', 'Member visibility');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="member-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['action' => ['save']]); ?>

    <?= $form->field($model, 'watcher_group_id')->dropDownList($watcherSource->getOptions()); ?>


    <?php
        $disableOptionIds = $model->getDisableVisibleGroupIds();
        $optionSettings = [];
        foreach ($disableOptionIds  as $disableId) {
            $optionSettings[$disableId] = [
                'disabled' => true,
                'class' => 'disabled-select-option'
            ];
        }
    ?>

    <?=
        $form->field($model, 'visible_group_ids')->dropDownList($viewerSource->getOptions(), [
            'multiple' => true,
            'size' => 10,
            'options' => $optionSettings
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(e) {
        jQuery('#view-watcher_group_id').on('change', function () {
            var id = jQuery(this).val();
            var url = '<?= Url::to(['']) ?>';
            url += (url.indexOf('?') > -1 ? '&' : '?') +  'watcher_group_id=' + id;
            window.location = url;
        });
    });
</script>

<style type="text/css">
    .disabled-select-option {
        background-color: green;
        color: white;
    }
</style>