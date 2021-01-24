<?php

namespace app\models;


use app\models\entities\UsersEntity;
use Yii;
use yii\base\Model;


class LoginForm extends Model
{

    public ?string $nickname = null;
    public ?int $rememberMe = null;
//    private ?User $user = null;

    public function rules(): array
    {
        return [
            ['nickname', 'required'],
            ['nickname', 'string', 'min' => 3, 'max' => 30],
        ];
    }


    public function login(): bool
    {
        if (!$this->validate()) {
            return false;
        }
        return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
    }


    public function getUser(): UsersEntity
    {
//        $this->user = User::findByUsername($this->nickname);

            $user = UsersEntity::find()->where(['nickname' => $this->nickname])->one();
            if(!$user){
                $user = new UsersEntity();
                $user->nickname = $this->nickname;
                $user->save() ?
                    Yii::$app->session->setFlash('success', 'Successful login')
                    :
                    Yii::$app->session->setFlash('error', 'Something was wrong');
            }


        return $user;
    }
}
