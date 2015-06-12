<?php

use app\models\enums\UserRole;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $searchModel \app\models\search\UserSearchModel */
/* @var $dataProvider \yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$this->render('partial/_sidebar');
?>

<?php Pjax::begin(['enablePushState' => false, 'timeout' => 8000, 'id' => 'user-list-pjax']) ?>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'username',
        'email',
        [
            'attribute' => 'role',
            'label' => 'Role',
            'filter' => UserRole::listData(),
            'filterInputOptions' => ['prompt' => 'Select Role', 'class' => 'form-control'],
        ],
        [
            'attribute' => 'createdAt',
            'value' => function ($model) {
                return gmdate('Y-m-d H:i:s', $model->createdAt);
            },
            'filter' => false,
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'buttons' => [
                'delete' => function ($url, $model, $key) {
                    if ($model->id != Yii::$app->user->id) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title'        => Yii::t('yii', 'Delete'),
                            'aria-label'   => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                            'data-pjax'    => '0',
                        ]);
                    } else {
                        return '';
                    }
                },
            ],
        ],
    ],
]) ?>
<?php Pjax::end() ?>