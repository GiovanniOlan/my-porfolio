<?php

namespace common\components\behavior;

use Yii;
use yii\base\ActionFilter;
use yii\web\MethodNotAllowedHttpException;

class PjaxFilter extends ActionFilter
{
    public function beforeAction($action)
    {
        if (!Yii::$app->request->isPjax) {
            throw new MethodNotAllowedHttpException('Method Not Allowed. This URL can only handle the following request methods: PJAX');
        }



        return parent::beforeAction($action);
    }
}
