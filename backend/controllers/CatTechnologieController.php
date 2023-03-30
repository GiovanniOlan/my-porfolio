<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\CatTechnologie;
use yii\web\NotFoundHttpException;
use backend\models\CatTechnologieSearch;
use common\components\behavior\PjaxFilter;

class CatTechnologieController extends Controller
{

    public function behaviors()
    {
        return [
            ...parent::behaviors(),
            // 'verbs' => [
            //     'class' => VerbFilter::class,
            //     'actions' => [
            //         'delete' => ['POST'],
            //     ],
            // ],
            'pjax' => [
                'class' => PjaxFilter::class,
                'only' => ['create', 'update']
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new CatTechnologieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $catTechnologie = new CatTechnologie();

        if ($this->request->isPost && $catTechnologie->load($this->request->post()) && $catTechnologie->save()) {
            return $this->renderAjax('/layouts/exec-js-pjax.php', [
                'idPjax'         => 'pjaxModal',
                'javascriptCode' => "showAlertSuccessConfirm('Technologie Add Correctly'); $('#modal').modal('hide'); $.pjax.reload('#pjaxGridView', {url:'/cat-technologie/index', push: false, replace: false});"
            ]);
        }

        return $this->renderAjax('_form', compact('catTechnologie'));
    }

    public function actionUpdate($id)
    {
        $catTechnologie = $this->findModelPjax($id, 'pjaxModal');

        if ($this->request->isPost && $catTechnologie->load($this->request->post()) && $catTechnologie->save()) {
            return $this->renderAjax('/layouts/exec-js-pjax.php', [
                'idPjax'         => 'pjaxModal',
                'javascriptCode' => "updatedSuccess();"
            ]);
        }

        $jsCode = "$('#modal').modal('show');";
        $pjaxAction = '/cat-technologie/update/' . $catTechnologie->tec_id;

        return $this->renderAjax('_form', compact('catTechnologie', 'jsCode', 'pjaxAction'));
    }

    // public function actionDelete($id)
    // {
    //     $this->findModel($id)->delete();

    //     return $this->redirect(['index']);
    // }

    protected function findModel($id)
    {
        if (($model = CatTechnologie::findOne(['tec_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelPjax($id, $pjaxName)
    {
        if (($model = CatTechnologie::findOne(['tec_id' => $id])) !== null) {
            return $model;
        }

        return $this->renderAjax('/layouts/exec-js-pjax', [
            'idPjax'         => $pjaxName,
            'javascriptCode' => "showAlertErrorConfirm('Technologie not found');"
        ]);

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
