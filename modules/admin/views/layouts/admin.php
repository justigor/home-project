<?php

use kartik\alert\AlertBlock;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags() ?>
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<?php echo AlertBlock::widget([
    'type' => AlertBlock::TYPE_GROWL,
    'useSessionFlash' => true,
]) ?>

<div class="wrap">
    <?php NavBar::begin([
        'brandLabel' => 'Home',
        'brandUrl' => Yii::$app->homeUrl,
    ]);

    echo Nav::widget([
        'items' => [
            ['label' => 'Dashboard', 'url' => ['/admin/dashboard/index']],
            ['label' => 'RBAC', 'url' => ['/admin/rbac/assignment'], 'active' => 'rbac' == Yii::$app->controller->module->id],
            ['label' => 'Users', 'url' => ['/admin/user/index'], 'active' => 'user' == Yii::$app->controller->id],
        ],
    ]);

    NavBar::end(); ?>

    <div class="container">
        <?php echo Breadcrumbs::widget([
            'homeLink' => ['label' => 'Dashboard', 'url' => '/admin'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="col-lg-3">
            <?php echo Nav::widget([
                'items' => array_merge([],
                    isset($this->params['sidebar']) ? $this->params['sidebar'] : []),
            ]) ?>
        </div>
        <div class="col-lg-9">
            <?php echo $content ?>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Penguins <?php echo date('Y') ?></p>
        <p class="pull-right"><?php echo Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
