<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use \common\models\Event;

/* @var $this yii\web\View */
/* @var $model frontend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $generateDateWidget = function($attribute) use ($model, $form) {

        $options = [];
        $tooltip = $model->attributeTooltip();
        if (isset($tooltip[$attribute])) {
            $message = $tooltip[$attribute];
            if ($message != $model->getAttributeLabel($attribute)) {
                $options['title'] = $message;
                $options['data-toggle'] = 'tooltip';
                $options['data-placement'] = 'left';
            }
        }

        $isRequired = false;
        if ($model->isAttributeRequired($attribute)) {
            $options['aria-required'] = 'true';
            $isRequired = true;
        }

        $startDate = null;
        if ($model->$attribute) {
            if ($startDate = \DateTime::createFromFormat(Event::DATETIME_INTERNAL_FORMAT, $model->$attribute)) {
                $startDate->sub(new \DateInterval('P1D'));
            }
        }

        echo '<div class="form-group field-event-' . $attribute . ' ' . ($model->hasErrors($attribute) ? 'has-error' : '') . ($isRequired ? ' required' : '') . '">';

        echo Html::activeLabel($model, $attribute);

        $value = null;
        if ($model->hasErrors($attribute)) {
            //$value = new \DateTime();
            //$value = $value->format(Event::DATETIME_INTERNAL_FORMAT);
        } elseif ($model->$attribute) {
            $value = $model->$attribute;
        }

        echo DateTimePicker::widget([
            'name' => $model->formName() . '[' . $attribute . ']',
            'options' => $options,
            'convertFormat' => true,
            'value' => $value,
            'pluginOptions' => [
                'format' => Event::DATETIME_INTERNAL_FORMAT_JS,
                'startDate' => $startDate ? $startDate->format(Event::DATETIME_INTERNAL_FORMAT) : false,
                //'todayHighlight' => true,
                'autoclose'=>true
            ]
        ]);

        echo Html::error($model, $attribute, array('class' => 'help-block'));

        echo '</div>';
    };
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $generateDateWidget('date_start'); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
