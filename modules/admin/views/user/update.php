<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\Pjax;

/* @var $model \app\models\UserModel */

$this->title = 'Update User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['/admin/user']];
$this->params['breadcrumbs'][] = $this->title . ': ' . $model->username;
$this->render('partial/_sidebar');
?>

<?php $form = ActiveForm::begin([
    'id' => 'user-form',
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]) ?>

    <?php echo $form->field($model, 'username')->textInput() ?>

    <?php echo $form->field($model, 'email')->textInput() ?>

    <?php echo $form->field($model, 'newPassword')->passwordInput()->hint('If this field is left blank, the password will not be updated.') ?>

    <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

<?php $form->end(); ?>
