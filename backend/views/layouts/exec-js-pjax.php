<?php

/**
 * This view allow execute javascript code with pjax helper 
 *
 * @property int $idPjax Component pjax id
 * @property string $javascriptCode Javascript code
 *
 * @property ProjectTechnologie[] $projectTechnologies
 */

use yii\web\View;
use yii\widgets\Pjax;
?>

<?php Pjax::begin([
    'id' => $idPjax,
    'options' => [
        'replace' => true,
        'push' => false,
    ],
]); ?>

<?php
$this->registerJs($javascriptCode, View::POS_READY);
?>

<?php Pjax::end() ?>