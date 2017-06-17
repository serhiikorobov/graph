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
$submitter = new \common\models\event\source\Submitter();
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

<div class="event-form">
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

    <ul class="nav nav-tabs" id="myTabs">
        <li role="presentation" class="active"><a href="#basic_info"><?php echo Yii::t('app', 'Basic Info') ?></a></li>
        <li role="presentation"><a href="#about"><?php echo Yii::t('app', 'About') ?></a></li>
        <li role="presentation"><a href="#logistics"><?php echo Yii::t('app', 'Logistics') ?></a></li>
        <li role="presentation"><a href="#other"><?php echo Yii::t('app', 'Other') ?></a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="basic_info">
            <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

            <div class="form-group row">
                <div class="col-md-12">
                    <?= $form->field($model, 'tier')->dropDownList($tier->getOptions()) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?php echo $generateDateWidget('date_start'); ?>
                </div>

                <div class="col-md-6">
                    <?php echo $generateDateWidget('date_end'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $form->field($model, 'location')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'venue_name')->textarea(['rows' => 6]) ?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="about">
            <?= $addTooltip($form->field($model, 'goals'))->textarea(['rows' => 6]) ?>

            <div class="form-group row">
                <div class="col-md-2">
                    <?= $addTooltip($form->field($model, 'audience'))->dropDownList($audienceSource->getOptions()); ?>
                </div>
                <div class="col-md-2">
                    <?php echo $addTooltip($form->field($model, 'audience_size'))->textInput(['maxlength' => true]); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'products'))->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'experiences'))->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <?php echo $addTooltip($form->field($model, 'nda'))->dropDownList($yesNoSource->getOptions()) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'audience_persons'))->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'expectations'))->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'customers'))->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'partners'))->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'comments'))->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'apm')->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <?= $form->field($model, 'atme')->textarea(['rows' => 6]) ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="logistics">

            <div class="form-group row">
                <div class="col-md-2">
                    <?= $addTooltip($form->field($model, 'a_v'))->dropDownList($typeServiceSource->getOptions()) ?>
                </div>
                <div class="col-md-2">
                    <?= $addTooltip($form->field($model, 'stage'))->dropDownList($typeServiceSource->getOptions()) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?php echo $generateDateWidget('logistics_date_start'); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $generateDateWidget('logistics_date_end'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?php echo $generateDateWidget('tear_down_date_start'); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $generateDateWidget('tear_down_date_end'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">
                    <?= $addTooltip($form->field($model, 'logistics'))->dropDownList($logisticsSource->getOptions()); ?>
                </div>
                <div class="col-md-4">
                    <?php echo $generateDateWidget('arrival_date'); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $generateDateWidget('departure_date'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'layout_stage'))->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $addTooltip($form->field($model, 'layout_demo_area'))->textarea(['rows' => 6]) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <?= $addTooltip($form->field($model, 'level_of_support'))->dropDownList($levelOfSupport->getOptions()) ?>
                </div>
                <div class="col-md-4">
                    <?= $addTooltip($form->field($model, 'budget', [
                            'template' => "{label}\n<div class='input-group'><span class='input-group-addon'>$</span>{input}</div>\n{hint}\n{error}",
                        ]))->textInput([
                            'maxlength' => true,
                            //'placeholder' => '00.00'
                        ]) ?>
                </div>
                <div class="col-md-4">
                    <?= $addTooltip($form->field($model, 'cost_center'))->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="other">
            <?= $addTooltip($form->field($model, 'requester'))->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'submitter')->dropDownList($submitter->getOptions())  ?>

            <?= $form->field($model, 'group')->textarea(['rows' => 6]) ?>

            <div class="form-group row">
                <div class="col-md-3">
                    <?= $form->field($model, 'event_type')->dropDownList($eventType->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]); ?>
                </div>
                <div class="col-md-3">
                    <?= $addTooltip($form->field($model, 'objectives'))->dropDownList($objectivesSource->getOptions()); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'sponsor')->dropDownList($yesNoSource->getOptions()); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <?= $form->field($model, 'keynote')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'booth')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'sate_lite')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'meeting')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    <?= $form->field($model, 'nda_suite')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'sessions')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'demos')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'training')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $form->field($model, 'launch')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'pr')->dropDownList($yesNoSource->getOptions()) ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <?= $form->field($model, 'costs', [
                            'template' => "{label}\n<div class='input-group'><span class='input-group-addon'>$</span>{input}</div>\n{hint}\n{error}",
                        ])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'shipping_costs', [
                            'template' => "{label}\n<div class='input-group'><span class='input-group-addon'>$</span>{input}</div>\n{hint}\n{error}",
                        ])->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?= $form->field($model, 'event_quarter')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function(e) {
        $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $(function () {
            $('[data-toggle="popover"]').popover()
        });


        var errorControl = $('.has-error:first');
        var panel = errorControl.parents('.tab-pane:first');
        var panelId = panel.attr('id');
        $('a[href=\\#' + panelId + ']').trigger('click');
        setTimeout(function() {
            errorControl.find('input,select,textarea').focus();
        }, 10);
    });
</script>

<style type="text/css">
    select.form-control {
        -webkit-appearance: menulist;
    }
</style>
