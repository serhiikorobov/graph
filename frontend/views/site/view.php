<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Event */
/* @var $form yii\widgets\ActiveForm */

use \common\models\Event;

$yesNoSource = new \common\models\event\source\YesNo();
$audienceSource = new \common\models\event\source\Audience();
$typeServiceSource = new \common\models\event\source\TypeServices();
$logisticsSource = new \common\models\event\source\Logistics();
$levelOfSupport = new \common\models\event\source\LevelOfSupport();
$eventType = new \common\models\event\source\EventType();
$tier = new \common\models\event\source\Tier();
$objectivesSource = new \common\models\event\source\Objectives();

use kartik\datetime\DateTimePicker;

$addTooltip = function (\yii\widgets\ActiveField $field) {
    /*$field->inputOptions['title'] = 'korobov';
    $field->inputOptions['data-toggle'] = 'tooltip';
    $field->inputOptions['data-placement'] = 'left';*/

    $tooltip = $field->model->attributeTooltip();
    if (isset($tooltip[$field->attribute])) {
        $message = $tooltip[$field->attribute];

        $field->inputOptions['title'] = $message;
        $field->inputOptions['data-toggle'] = 'tooltip';
        $field->inputOptions['data-placement'] = 'left';

        /*
        $field->inputOptions['data-toggle'] = 'popover';
        $field->inputOptions['data-trigger'] = 'focus';
        $field->inputOptions['title'] = $field->model->getAttributeLabel($field->attribute);
        $field->inputOptions['data-content'] = $message;
        $field->inputOptions['data-placement'] = 'left';*/

    }

    return $field;
};

?>

<h1><?= Html::encode($model->short_name) . sprintf('(ID:%s)', $model->getPrimaryKey()) ?></h1>

<?php if ($model->getGlobalTier() == 0): ?>
    <?= $this->render('//product/_form', [
        'model' => $model,
    ]) ?>
<?php else: ?>
    <?= $this->render('//event/_form', [
        'model' => $model,
    ]) ?>
<?php endif; ?>


<style type="text/css">
    .form-group button {
        display: none;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        jQuery('input,select,textarea').prop('disabled', true);
    });
</script>