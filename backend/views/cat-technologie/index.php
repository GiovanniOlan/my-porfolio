<?php

use yii\web\View;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\grid\ActionColumn;
use common\models\CatTechnologie;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\CatTechnologieSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$iconView   = '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1.125em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M573 241C518 136 411 64 288 64S58 136 3 241a32 32 0 000 30c55 105 162 177 285 177s230-72 285-177a32 32 0 000-30zM288 400a144 144 0 11144-144 144 144 0 01-144 144zm0-240a95 95 0 00-25 4 48 48 0 01-67 67 96 96 0 1092-71z"/></svg>';
$iconEdit   = '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg>';
$iconDelete = '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"/></svg>';

$this->title = 'Technologies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-technologie-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Add Technologie', ['class' => 'btn btn-primary', 'id' => 'btnAdd']) ?>
    </p>

    <?php Pjax::begin([
        'id' => 'pjaxGridView',
        'options' => [
            'push' => false,
            'replace' => false,
        ],
    ]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['data-pjax' => false],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'tec_id',
            'tec_name',
            [
                'class' => ActionColumn::class,
                // 'template' => '{view} {update} {delete} {myButton}',
                'buttons' => [
                    'view' => function ($url, $model) use ($iconView) {
                        return Html::button($iconView, ['class' => 'btn btn-primary btnView', 'data-id' => $model->tec_id]);
                    },
                    'update' => function ($url, $model) use ($iconEdit) {
                        return Html::button($iconEdit, ['class' => 'btn btn-secondary btnEdit', 'data-id' => $model->tec_id]);
                    },
                    'delete' => function ($url, $model) use ($iconDelete) {
                        return Html::button($iconDelete, ['class' => 'btn btn-danger btnDelete', 'data-id' => $model->tec_id]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php $this->registerJs(
        <<<JS
        $('.btnEdit').click(function(){
            $.pjax.reload('#pjaxModal', {url: '/cat-technologie/update/' + this.dataset.id, push: false, replace: false});
        });
    JS,
        View::POS_END
    ); ?>

    <?php Pjax::end(); ?>

</div>

<?php Modal::begin([
    'title' => 'Add Technologie',
    'id' => 'modal',
    //'size' => MODAL::SIZE_EXTRA_LARGE,
    // 'clientOptions' => ['keyboard' => false],
    'toggleButton' => false,
]); ?>

<?php Pjax::begin(['id' => 'pjaxModal']); ?>


<?php Pjax::end() ?>



<?php Modal::end(); ?>

<?php
$this->registerJs(
    <<<JS
        $('#btnAdd').click(function(){
            $.pjax.reload('#pjaxModal', {url: '/cat-technologie/create', push: false, replace: false});
            $('#modal').modal('show');
        });

        $(document).on('submit', '#catTechnologieForm', function(event) {
            $.pjax.submit(event, '#pjaxModal');
            // alert('Lo Detuvo')
            return false; 
        })

        function updatedSuccess(name){
            showAlertSuccessConfirm(name + ' updated Correctly'); 
            $('#modal').modal('hide');
            $.pjax.reload('#pjaxGridView', {url:'/cat-technologie/index',push: false, replace: false});
        }


    JS,
    View::POS_END
);
?>