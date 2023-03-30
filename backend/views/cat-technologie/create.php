<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CatTechnologie $model */

$this->title = 'Create Cat Technologie';
$this->params['breadcrumbs'][] = ['label' => 'Cat Technologies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-technologie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
