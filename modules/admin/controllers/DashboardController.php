<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Class DashboardController
 * @package app\modules\admin\controllers
 */
class DashboardController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}