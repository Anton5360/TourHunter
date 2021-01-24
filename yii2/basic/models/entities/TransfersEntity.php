<?php

namespace app\models\entities;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "transfers".
 *
 * @property int $id
 * @property int $from_user_id
 * @property int $to_user_id
 * @property float $amount
 * @property string $created_at
 *
 * @property UsersEntity $fromUser
 * @property UsersEntity $toUser
 */
class TransfersEntity extends \yii\db\ActiveRecord
{
    const MINIMUM_BALANCE_VALUE = -1000;

    public static function tableName(): string
    {
        return '{{%transfers}}';
    }


    public function rules()
    {
        return [
            [['from_user_id', 'to_user_id', 'amount'], 'required'],
            [['from_user_id', 'to_user_id'], 'integer'],
            [['amount'], 'number'],
            [['created_at'], 'safe'],
            [
                ['from_user_id'],
                'exist',
                'targetClass' => UsersEntity::class,
                'targetAttribute' => ['from_user_id' => 'id']
            ],
            [
                ['to_user_id'],
                'exist',
                'targetClass' => UsersEntity::class,
                'targetAttribute' => ['to_user_id' => 'id']
            ],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_user_id' => 'From User ID',
            'to_user_id' => 'To User ID',
            'amount' => 'Amount',
            'created_at' => 'Created At',
        ];
    }


    public function getFromUser(): ActiveQuery
    {
        return $this->hasOne(UsersEntity::class, ['id' => 'from_user_id']);
    }


    public function getToUser(): ActiveQuery
    {
        return $this->hasOne(UsersEntity::class, ['id' => 'to_user_id']);
    }
}
