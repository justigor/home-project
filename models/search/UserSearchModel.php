<?php

namespace app\models\search;

use app\models\UserModel;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * Class UserSearchModel
 * @package app\models
 */
class UserSearchModel extends UserModel
{

    /**
     * @var string user role
     */
    public $role;

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge([
            [['role'], 'safe'],
        ], parent::rules());
    }

    /**
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = new ActiveQuery(self::className());

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'username',
                    'email',
                    'createdAt',
                ],
            ],
        ]);
        $query->select([
            'User.*',
            'AuthAssignment.item_name as role',
        ]);

        $query->join('JOIN', 'AuthAssignment', '"AuthAssignment"."user_id"="User"."id"');

        // load the search form data and validate
        if (!($this->load($params))) {
            return $dataProvider;
        }

        $query->andFilterWhere(['AuthAssignment.item_name' => $this->role]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}