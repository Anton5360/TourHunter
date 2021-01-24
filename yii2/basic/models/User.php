<?php
namespace app\models;

use app\models\entities\UsersEntity;
use yii\web\IdentityInterface;


class User extends UsersEntity implements IdentityInterface
{


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