<?php

use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CatTechnologie $catTechnologie */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cat-technologie-form">

    <?php $form = ActiveForm::begin([
        'id' => 'catTechnologieForm',
        'action' => isset($pjaxAction) ? $pjaxAction : $_SERVER['REQUEST_URI'],
    ]); ?>

    <?= $form->field($catTechnologie, 'tec_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group mt-3 text-center">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs(
    isset($jsCode) ? $jsCode : '',
    View::POS_END
);
?>