<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\entities\UsersEntity;

/**
 * UserSearch represents the model behind the search form of `app\models\entities\UsersEntity`.
 */
class UserSearch extends UsersEntity
{

    public function rules(): array
    {
        return [
            [['id'], 'integer'],
            [['nickname', 'created_at'], 'safe'],
            [['balance'], 'number'],
        ];
    }



    public function search(array $params): ActiveDataProvider
    {
        $query = UsersEntity::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'balance' => $this->balance,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'nickname', $this->nickname]);

        return $dataProvider;
    }
}
