<?php

namespace app\modules\admin\controllers;

use app\models\search\UserSearchModel;
use app\models\UserModel;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Class UserController
 * @package app\modules\admin\controllers
 */
class UserController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearchModel();
        $dataProvider = $searchModel->search(\Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $load = $model->load(\Yii::$app->request->post());

        if (\Yii::$app->request->isAjax && !\Yii::$app->request->isPjax) {
            return $this->performAjaxValidation($model);
        }

        if ($load && $model->save()) {
            \Yii::$app->session->setFlash('success', 'saved');
            return $this->refresh();
        }

        return $this->render('update', ['model' => $model]);
    }

    /**
     * @param $id
     * @return UserModel
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if ($model = UserModel::findOne(['id' => $id])) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Perform ajax validation
     *
     * @param $model
     * @param $questionModels
     * @return mixed
     */
    protected function performAjaxValidation($model)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
}