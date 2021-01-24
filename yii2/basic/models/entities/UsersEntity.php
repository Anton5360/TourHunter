<?php

namespace app\models\entities;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $nickname
 * @property float $balance
 * @property string $created_at
 */
class UsersEntity extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName(): string
    {
        return 'users';
    }


    public function rules(): array
    {
        return [
            [['nickname'], 'required'],
            [['balance'], 'number'],
            [['created_at'], 'safe'],
            [['nickname'], 'string', 'max' => 100],
            [['nickname'], 'unique'],
        ];
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'balance' => 'Balance',
            'created_at' => 'Created At',
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }


    public static function findIdentity($id): ?self
    {
        return self::findOne($id);
    }

    public static function findByUsername(string $nickname): ?self
    {
        return self::findOne(['nickname' => $nickname]);
    }



    public static function findIdentityByAccessToken($token, $type = null): void
    {

    }

    public function getAuthKey(): void
    {
    }


    public function validateAuthKey($authKey): bool
    {
        return false;
    }
}
