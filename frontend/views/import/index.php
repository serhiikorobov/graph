<?php
    /* @var $this yii\web\View */
    /* @var $model \frontend\models\import\Form */

    use yii\widgets\ActiveForm;
    use yii\helpers\Url;

    $this->title = 'My Yii Application';
?>

<div class="jumbotron">

</div>

<div class="import-index">

    <?php if ($model->additionalErrors): ?>
        <div class="messages">
            <?php foreach ($model->additionalErrors as $type => $typeErrors): ?>
                <?php foreach ($typeErrors as $index => $rowErrors): ?>
                    <div class="alert alert-danger" role="alert">
                        Строка # <?php echo $index + 1 ?> файла <?php echo $type ?>
                        <?php foreach ($rowErrors as $field => $fieldErrors): ?>
                            <?php echo implode('. ', $fieldErrors) ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($model->successfullyLoaded): ?>
        <div class="alert alert-success" role="alert">File(s) loaded</div>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(['action' => ['import/post'], 'id' => 'import-form', 'options' => ['enctype' => 'multipart/form-data']]) ?>
        <div class="form-group">
            <?php echo $form->field($model, 'internal')->fileInput(['multiple' => false]) ?>
        </div>

        <div class="form-group">
            <?php echo $form->field($model, 'external')->fileInput(['multiple' => false]) ?>
        </div>

        <input type="submit" name="validate" class="btn btn-default"  value="Validate"/>
        <input type="submit" class="btn btn-default" value="Import"/>
    <?php ActiveForm::end() ?>
</div>

<script>

    document.addEventListener("DOMContentLoaded", function(e) {
        $('#import-form').on('submit', function() {
            var files = $(this).find('input[type=file]');
            var exist = false;
            files.each(function(a, b) {
                if (b.value) {
                    exist = true;
                }
            });

            if (!exist) {
                e.preventDefault();
                alert('Select at least one file');
                return false;
            }
        });
    });
</script>