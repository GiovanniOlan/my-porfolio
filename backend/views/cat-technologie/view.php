<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\CatTechnologie $model */

$this->title = $model->tec_id;
$this->params['breadcrumbs'][] = ['label' => 'Cat Technologies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cat-technologie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'tec_id' => $model->tec_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tec_id' => $model->tec_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tec_id',
            'tec_name',
        ],
    ]) ?>

</div>
