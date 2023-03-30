<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CatTechnologie $model */

$this->title = 'Update Cat Technologie: ' . $model->tec_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Technologies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tec_id, 'url' => ['view', 'tec_id' => $model->tec_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-technologie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
